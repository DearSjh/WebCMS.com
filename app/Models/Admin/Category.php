<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/17
 * Time: 14:56
 */

namespace App\Models\Admin;

use App\Http\Resources\Admin\Category\CategoryResource;
use Illuminate\Database\Eloquent\Model;
use App\Scopes\LangScope;
use Predis\Response\Error;

class Category extends Model
{

    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope(new LangScope());

    }

    /**
     * @param $params
     * @throws \Exception
     */
    public static function checkInfo($params, $id = '')
    {
        if (empty($id)) {
            $name = self::where(['name' => $params['name']])->first();
            $dirName = self::where(['dir_name' => $params['dir_name']])->first();
        } else {
            $name = self::where('id', '!=', $id)->where(['name' => $params['name']])->first();
            $dirName = self::where('id', '!=', $id)->where(['dir_name' => $params['dir_name']])->first();
        }

        if (!empty($name)) {
            throw new \Exception('该栏目名称已添加,请勿多次添加');
        }
        if (!empty($dirName)) {
            throw new \Exception('该目录名称已添加,请勿多次添加');
        }

        if (!empty($params['parent_id'])) {
            $date = self::select(['id', 'parent_id', 'link'])->where(['id' => $params['parent_id']])->first();
            if (empty($date)) {
                throw new \Exception('所属栏目不存在，请先添加');
            }
            if (!empty($date->link)) {
                throw new \Exception('所属栏目是跳转链接，不能添加子栏目');
            }
        }

    }

    public function child()
    {
        return $this->hasMany(Category::class, 'parent_id', 'id');
    }

    public function childDetail()
    {
        return $this->belongsTo(Category::class, 'parent_id', 'id')->select('id', 'name');
    }

    public static function addCategories($params)
    {
        $self = new self();

        !empty($params['type']) && $self->type = $params['type'];
        !empty($params['parent_id']) && $self->parent_id = $params['parent_id'];
        !empty($params['name']) && $self->name = $params['name'];
        !empty($params['eng_name']) && $self->eng_name = $params['eng_name'];
        !empty($params['dir_name']) && $self->dir_name = $params['dir_name'];
        !empty($params['link']) && $self->link = $params['link'];
        !empty($params['picture']) && $self->picture = $params['picture'];
        !empty($params['seo_title']) && $self->seo_title = $params['seo_title'];
        !empty($params['keyword']) && $self->keyword = $params['keyword'];
        !empty($params['sort']) && $self->sort = $params['sort'];
        $self->state = $params['state'];

        return $self->save();
    }

    public static function updateCategory($params, $id)
    {
        $qb = self::where(['id' => $id])->first();

        if (empty($qb)) {
            throw new \Exception('所属栏目不存在，请先添加');
        }
        !empty($params['type']) && $qb->type = $params['type'];
        !empty($params['parent_id']) && $qb->parent_id = $params['parent_id'];
        !empty($params['name']) && $qb->name = $params['name'];
        !empty($params['eng_name']) && $qb->eng_name = $params['eng_name'];
        !empty($params['dir_name']) && $qb->dir_name = $params['dir_name'];
        !empty($params['link']) && $qb->link = $params['link'];
        !empty($params['picture']) && $qb->picture = $params['picture'];
        !empty($params['seo_title']) && $qb->seo_title = $params['seo_title'];
        !empty($params['keyword']) && $qb->keyword = $params['keyword'];
        !empty($params['sort']) && $qb->sort = $params['sort'];
        $qb->state = $params['state'];

        return $qb->update();
    }


    public static function CategoriesList($params, $parPage = PER_PAGE, $page = FIRST_PAGE)
    {
        $qb = self::with('child.child.child')->select(['id', 'type', 'name', 'parent_id', 'dir_name', 'link', 'sort', 'state', 'created_at'])->where('parent_id', 0);

        !empty($params['type']) && !empty($params['type']) && $qb->where('type', $params['type']);
        !empty($params['name']) && !empty($params['name']) && $qb->where('name', $params['name']);
        !empty($params['begin_time']) && $qb->where('created_at', '>=', $params['begin_time']);
        !empty($params['end_time']) && $qb->where('created_at', '<=', $params['end_time']);

        return $qb->paginate($parPage, ['*'], 'page', $page);
    }

    /**
     * Description:详情
     * Author: DJJ
     * @param $params
     * @return mixed
     */
    public static function detail($id)
    {

        return self::with('childDetail')->select('*')->where(['id' => $id])->first();
    }

    public static function del($ids)
    {
        $ret = Category::whereIn('id', $ids)->orWhereIn('parent_id', $ids)->delete();
        if (!$ret) {
            throw new \Exception('删除失败');
        }
        return $ret;
    }

    public static function open($state, $id)
    {
        $qb = Category::where(['id' => $id])->first();
        if (empty($qb)) {
            throw new \Exception('栏目不存在');
        }
        $qb->state = $state;
        return $qb->update();
    }


    public static function categoryValue($params)
    {
        $qb = self::with('child.child.child')->select(['id', 'name', 'parent_id']);

        if (!empty($params['parent_id'])) {
            $qb->where('parent_id', $params['parent_id']);
        } else {
            $qb->where('parent_id', 0);

        }
        !empty($params['name']) && !empty($params['name']) && $qb->where('name', 'like', '%' . $params['name'] . '%');

        return $qb->get();
    }

    public static function categoryId($id)
    {
        $categoryId = [];
        $data = self::with('child.child.child')
            ->select(['id', 'parent_id'])
            ->where('id', $id)
            ->get();

        if (!empty($data)) {
            foreach ($data as $item) {
                $categoryId[] = $item['id'];
                if (count($item['child']) > 0) {
                    foreach ($item['child'] as $value) {
                        $categoryId[] = $value['id'];
                        if (count($value['child']) > 0) {
                            foreach ($value['child'] as $reust) {
                                $categoryId[] = $reust['id'];
                            }
                        }
                    }
                }
            }
        }

        return $categoryId;
    }
}
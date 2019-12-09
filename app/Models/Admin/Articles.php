<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/17
 * Time: 14:56
 */

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use App\Service\Utils;
use App\Scopes\LangScope;

class Articles extends Model
{

    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope(new LangScope());

    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id')->select(['id', 'name', 'type']);;
    }

    public static function detection($string)
    {
        $find = BannedWord::getValue();
        str_replace($find, '1', $string, $count);

        if ($count > 0) {

            $regular = implode('|', array_map('preg_quote', $find));
            $res_banned = Utils::checkWords("/$regular/i", $string);

            if (!empty($res_banned)) {
                throw new \Exception('文章详细内容中含有: ' . implode('，', $res_banned) . ' ... 等等违禁词。');
            }

        }


    }

    public static function addArticles($params)
    {
        $self = new self();

        if (!empty($params['category_id'])) {
            $category = Category::where(['id' => $params['category_id']])->first();
            if (empty($category)) {
                throw new \Exception('所属栏目不存在');
            }
            $self->category_id = $params['category_id'];
        }
        if (!empty($params['content'])) {
            Articles::detection($params['content']);
        }

        !empty($params['title']) && $self->title = $params['title'];
        !empty($params['main_pic']) && $self->main_pic = $params['main_pic'];
        !empty($params['group_pic']) && $self->group_pic = implode(',', $params['group_pic']);
        !empty($params['link']) && $self->link = $params['link'];
        !empty($params['keyword']) && $self->keyword = $params['keyword'];
        !empty($params['abstract']) && $self->abstract = $params['abstract'];
        !empty($params['sort']) && $self->sort = $params['sort'];
        !empty($params['visits']) && $self->visits = $params['visits'];
        !empty($params['content']) && $self->content = $params['content'];
        $self->top = $params['top'];
        $self->recommended = $params['recommended'];
        $self->rolling = $params['rolling'];
        $self->state = $params['state'];

        return $self->save();
    }

    /**
     * Description: 更新文章
     * Author: DJJ
     * @param $params
     * @return mixed
     */
    public static function updateArticles($params, $id)
    {

        $self = Articles::where(['id' => $id])->first();
        if (empty($self)) {
            throw new \Exception('文章不存在');
        }

        if (!empty($params['category_id'])) {
            $category = Category::where(['id' => $params['category_id']])->first();
            if (empty($category)) {
                throw new \Exception('所属栏目不存在');
            }
            $self->category_id = $params['category_id'];
        }
        if (!empty($params['content'])) {
            Articles::detection($params['content']);
        }

        if (is_array($params['group_pic'])) {
            $self->group_pic = implode(',', $params['group_pic']);
        }
        !empty($params['title']) && $self->title = $params['title'];
        !empty($params['main_pic']) && $self->main_pic = $params['main_pic'];
        !empty($params['link']) && $self->link = $params['link'];
        !empty($params['keyword']) && $self->keyword = $params['keyword'];
        !empty($params['abstract']) && $self->abstract = $params['abstract'];
        !empty($params['sort']) && $self->sort = $params['sort'];
        !empty($params['visits']) && $self->visits = $params['visits'];
        !empty($params['content']) && $self->content = $params['content'];

        $self->top = $params['top'];
        $self->recommended = $params['recommended'];
        $self->rolling = $params['rolling'];
        $self->state = $params['state'];

        return $self->update();
    }


    public static function articlesList($params, $parPage = PER_PAGE, $page = FIRST_PAGE)
    {

        $qb = self::with('category')->select(['id', 'title', 'category_id', 'visits', 'state', 'updated_at']);

        if (!empty($params['category_id'])) {
            $categoryIds = Category::categoryId($params['category_id']);
            $qb->whereIn('category_id', $categoryIds);
        }
        !empty($params['title']) && !empty($params['title']) && $qb->where('title', $params['title']);
        !empty($params['begin_time']) && $qb->where('created_at', '>=', $params['begin_time']);
        !empty($params['end_time']) && $qb->where('created_at', '<=', $params['end_time']);
        $qb->orderBy('id', 'desc');

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
        $result = Articles::where(['id' => $id])->first();
        if ($result->group_pic) {
            $result->group_pic = explode(',', $result->group_pic);
        }

        return $result;

    }

    public static function del($ids)
    {
        $ret = Articles::whereIn('id', $ids)->delete();
        if (!$ret) {
            throw new \Exception('删除失败');
        }
        return $ret;
    }

    public static function open($state, $id)
    {
        $qb = Articles::where(['id' => $id])->first();
        if (empty($qb)) {
            throw new \Exception('文章不存在');
        }
        $qb->state = $state;
        return $qb->update();
    }

    public static function singleDetail($id)
    {
        $result = Articles::where('id', $id)->first();
        if (!empty($result->content)) {
            $result['content'] = Utils::readFile('..' . $result->content);
        }
        return $result;

    }
}
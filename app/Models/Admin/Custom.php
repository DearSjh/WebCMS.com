<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/17
 * Time: 14:56
 */

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use App\Scopes\LangScope;

class Custom extends Model
{

    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope(new LangScope());

    }

    public static function checkInfo($params)
    {
        $result = self::where(['name' => $params['name']])->first();
        if (!empty($result)) {
            throw new \Exception('该标识名称已添加,请勿多次添加');
        }
    }

    public static function checkUpdateInfo($params, $id)
    {
        $result = self::where('id', '!=', $id)->where(['name' => $params['name']])->first();
        if (!empty($result)) {
            throw new \Exception('该标识名称已添加,请勿多次添加');
        }
    }

    public static function addCustom($params)
    {
        $self = new self();

        !empty($params['name']) && $self->name = $params['name'];
        !empty($params['picture']) && $self->picture = $params['picture'];
        !empty($params['link']) && $self->link = $params['link'];
        !empty($params['content']) && $self->content = $params['content'];
        !empty($params['group_pic']) && $self->group_pic = implode(',', $params['group_pic']);
        $self->state = $params['state'];

        return $self->save();
    }

    /**
     * Description: 更新
     * @param $params
     * @return $id
     */
    public static function updateCustom($params, $id)
    {

        $self = Custom::where(['id' => $id])->first();
        if (empty($self)) {
            throw new \Exception('自定义数据不存在');
        }
        if (is_array($params['group_pic'])) {
            $self->group_pic = implode(',', $params['group_pic']);
        }
        $self->name = ($params['name'] ?? '');
        $self->picture = ($params['picture'] ?? '');
        $self->link = ($params['link'] ?? '');
        $self->content = ($params['content'] ?? '');
        $self->state = $params['state'];

        return $self->update();
    }


    public static function customList($params, $parPage = PER_PAGE, $page = FIRST_PAGE)
    {

        $qb = self::select(['id', 'name', 'picture', 'link', 'state', 'updated_at']);

        !empty($params['name']) && !empty($params['name']) && $qb->where('name', $params['name']);
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
        $result = self::select('*')->where(['id' => $id])->first();
        
        if (!empty($result->group_pic)) {
            $result->group_pic = explode(',', $result->group_pic);
        } else {
            $result->group_pic = [];
        }
        return $result;

    }

    public static function del($ids)
    {
        $ret = self::whereIn('id', $ids)->delete();
        if (!$ret) {
            throw new \Exception('删除失败');
        }
        return $ret;
    }

    public static function open($state, $id)
    {
        $qb = self::where(['id' => $id])->first();
        if (empty($qb)) {
            throw new \Exception('自定义数据不存在');
        }
        $qb->state = $state;
        return $qb->update();
    }

}
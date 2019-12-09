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

class Banner extends Model
{

    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope(new LangScope());

    }

    public static function bannerList($params, $parPage = PER_PAGE, $page = FIRST_PAGE)
    {
        $qb = self::select(['id', 'title', 'picture', 'link', 'state', 'created_at']);

        !empty($params['id']) && !empty($params['id']) && $qb->where('id', $params['id']);
        !empty($params['title']) && !empty($params['title']) && $qb->where('title', $params['title']);
        !empty($params['begin_time']) && $qb->where('created_at', '>=', $params['begin_time']);
        !empty($params['end_time']) && $qb->where('created_at', '<=', $params['end_time']);

        $qb->orderBy('id', 'desc');

        return $qb->paginate($parPage, ['*'], 'page', $page);
    }

    public static function addBanner($params)
    {
        $self = new self();

        !empty($params['picture']) && $self->picture = $params['picture'];
        !empty($params['title']) && $self->title = $params['title'];
        !empty($params['link']) && $self->link = $params['link'];
        !empty($params['sort']) && $self->sort = $params['sort'];
        $self->state = $params['state'];

        return $self->save();
    }

    /**
     * Description:详情
     * Author: DJJ
     * @param $params
     * @return mixed
     */
    public static function detail($id)
    {
        return self::select('*')->where(['id' => $id])->first();
    }

    /**
     * Description: 更新幻灯片
     * Author: DJJ
     * @param $params
     * @return mixed
     */
    public static function updateBanner($params, $id)
    {
        $qb = self::where(['id' => $id])->first();

        if (empty($qb)) {
            throw new \Exception('幻灯片不存在，请先添加');
        }

        !empty($params['picture']) && $qb->picture = $params['picture'];
        !empty($params['title']) && $qb->title = $params['title'];
        !empty($params['link']) && $qb->link = $params['link'];
        !empty($params['sort']) && $qb->sort = $params['sort'];
        $qb->state = $params['state'];

        return $qb->update();
    }

    public static function del($ids)
    {
        $ret = Banner::whereIn('id', $ids)->delete();
        if (!$ret) {
            throw new \Exception('删除失败');
        }
        return $ret;
    }

    public static function open($state, $id)
    {
        $qb = Banner::where(['id' => $id])->first();
        if (empty($qb)) {
            throw new \Exception('幻灯片不存在');
        }
        $qb->state = $state;
        return $qb->update();
    }

}
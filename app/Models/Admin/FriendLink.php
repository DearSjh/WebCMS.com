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

class FriendLink extends Model
{
    protected $table = 'friend_links';

    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope(new LangScope());

    }

    public static function friendLinkList($params, $parPage = PER_PAGE, $page = FIRST_PAGE)
    {
        $qb = self::select(['id','name','picture','link','state', 'created_at']);

        !empty($params['name']) && !empty($params['name']) && $qb->where('name', $params['name']);
        !empty($params['state']) && !empty($params['state']) && $qb->where('state', $params['state']);
        !empty($params['begin_time']) && $qb->where('created_at', '>=', $params['begin_time']);
        !empty($params['end_time']) && $qb->where('created_at', '<=', $params['end_time']);
        $qb->orderBy('id', 'desc');

        return $qb->paginate($parPage, ['*'], 'page', $page);
    }

    public static function addFriendLink($params)
    {
        $self = new self();

        !empty($params['name']) && $self->name = $params['name'];
        !empty($params['note']) && $self->note = $params['note'];
        !empty($params['link']) && $self->link = $params['link'];
        !empty($params['picture']) && $self->picture = $params['picture'];
        !empty($params['sort']) && $self->sort = $params['sort'];
        $self->state = $params['state'];
        return $self->save();
    }

    public static function updateFriendLink($params, $id)
    {

        $qb = self::where(['id' => $id])->first();

        if (empty($qb)) {
            throw new \Exception('链接不存在，请先添加');
        }

        !empty($params['name']) && $qb->name = $params['name'];
        !empty($params['note']) && $qb->note = $params['note'];
        !empty($params['link']) && $qb->link = $params['link'];
        !empty($params['picture']) && $qb->picture = $params['picture'];
        !empty($params['sort']) && $qb->sort = $params['sort'];
        $qb->state = $params['state'];

        return $qb->update();
    }

    public static function detail($id)
    {
        return self::select('*')->where(['id' => $id])->first();

    }

    public static function del($ids)
    {
        $ret = FriendLink::whereIn('id', $ids)->delete();
        return $ret;

    }

    public static function open($state, $id)
    {
        $qb = FriendLink::where(['id' => $id])->first();
        if (empty($qb)) {
            throw new \Exception('链接不存在');
        }
        $qb->state = $state;
        return $qb->update();
    }
}
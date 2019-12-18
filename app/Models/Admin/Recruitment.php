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

class Recruitment extends Model
{

    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope(new LangScope());

    }

    public static function addRecruitment($params)
    {
        $self = new self();
        !empty($params['name']) && $self->name = $params['name'];
        !empty($params['place']) && $self->place = $params['place'];
        !empty($params['nature']) && $self->nature = $params['nature'];
        !empty($params['number']) && $self->number = $params['number'];
        !empty($params['gender']) && $self->gender = $params['gender'];
        !empty($params['age']) && $self->age = $params['age'];
        !empty($params['wages']) && $self->wages = $params['wages'];
        !empty($params['effective']) && $self->effective = $params['effective'];
        !empty($params['experience']) && $self->experience = $params['experience'];
        !empty($params['degree']) && $self->degree = $params['degree'];
        !empty($params['language']) && $self->language = $params['language'];
        !empty($params['description']) && $self->description = $params['description'];
        !empty($params['requirements']) && $self->requirements = $params['requirements'];
        !empty($params['sort']) && $self->sort = $params['sort'];
        $self->state = $params['state'];

        return $self->save();
    }

    /**
     * Description: 更新招聘信息
     * Author: DJJ
     * @param $params
     * @return mixed
     */
    public static function updateRecruitment($params, $id)
    {

        $self = Recruitment::where(['id' => $id])->first();
        if (empty($self)) {
            throw new \Exception('招聘信息不存在，请先添加');
        }

        $self->name = ($params['name'] ?? '');
        $self->place = ($params['place'] ?? '');
        $self->nature = ($params['nature'] ?? '');
        $self->number = ($params['number'] ?? '');
        $self->gender = ($params['gender'] ?? '');
        $self->age = (empty($params['age']) ? '无' : $params['age']);
        $self->wages = ($params['wages'] ?? '');
        $self->effective = ($params['effective'] ?? '');
        $self->experience = ($params['experience'] ?? '');
        $self->degree = ($params['degree'] ?? '');
        $self->language = ($params['language'] ?? '');
        $self->description = ($params['description'] ?? '');
        $self->requirements = ($params['requirements'] ?? '');
        $self->sort = ($params['sort'] ?? 1);
        $self->state = $params['state'];

        return $self->update();

    }

    public static function recruitmentList($params, $parPage = PER_PAGE, $page = FIRST_PAGE)
    {

        $qb = self::select(['id', 'name', 'place', 'nature', 'number', 'effective', 'state', 'created_at']);

        !empty($params['name']) && !empty($params['name']) && $qb->where('name', $params['name']);
        !empty($params['begin_time']) && $qb->where('created_at', '>=', $params['begin_time']);
        !empty($params['end_time']) && $qb->where('created_at', '<=', $params['end_time']);

        $qb->orderBy('id', 'desc');

        return $qb->paginate($parPage, ['*'], 'page', $page);
    }

    public static function detail($id)
    {
        return self::select('*')->where(['id' => $id])->first();

    }

    public static function del($ids)
    {
        $ret = self::whereIn('id', $ids)->delete();
        return $ret;

    }

    public static function open($state, $id)
    {
        $qb = self::where(['id' => $id])->first();
        if (empty($qb)) {
            throw new \Exception('招聘信息不存在');
        }
        $qb->state = $state;
        return $qb->update();
    }
}
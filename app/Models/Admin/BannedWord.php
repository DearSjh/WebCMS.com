<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/17
 * Time: 14:56
 */

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class  BannedWord extends Model
{
    protected $table = 'banned_words';

    public static function bannedWordList($params, $parPage = PER_PAGE, $page = FIRST_PAGE)
    {

        $qb = self::select(['id', 'word', 'created_at']);

        !empty($params['word']) && !empty($params['word']) && $qb->where('word', $params['word']);
        !empty($params['end_time']) && $qb->where('created_at', '<=', $params['end_time']);
        $qb->orderBy('id', 'desc');

        return $qb->paginate($parPage, ['*'], 'page', $page);
    }

    public static function checkUpdateInfo($params, $id = '')
    {

        if (empty($id)) {
            $result = self::where(['word' => $params['word']])->first();
        } else {
            $result = self::where('id', '<>', $id)->where(['word' => $params['word']])->first();
        }

        if (!empty($result)) {
            throw new \Exception('该违禁词已添加,请勿多次添加');
        }
    }

    public static function addBannedWord($params)
    {
        $self = new self();

        !empty($params['word']) && $self->word = $params['word'];

        return $self->save();
    }

    public static function updateBannedWord($params, $id)
    {
        $qb = self::where(['id' => $id])->first();

        if (empty($qb)) {
            throw new \Exception('该违禁词不存在，请先添加');
        }

        !empty($params['word']) && $qb->word = $params['word'];

        return $qb->update();
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

    public static function del($ids)
    {
        $ret = BannedWord::whereIn('id', $ids)->delete();
        if (!$ret) {
            throw new \Exception('删除失败');
        }
        return $ret;
    }

    public static function getValue()
    {
        $item = [];
        $bannedKey = 'banned_words';

        $regular = Cache::get($bannedKey);
        if ($regular) {
            return $regular;
        }

        $date = BannedWord::all('word');
        if (!empty($date)) {
            foreach ($date->toArray() as $value) {
                $item[] = $value['word'];
            }
        }

        Cache::add($bannedKey, $item, 8400);

        return $item;
    }

}
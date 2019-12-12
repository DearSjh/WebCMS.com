<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/17
 * Time: 14:56
 */

namespace App\Models\Admin;

use App\Models\Article;
use Illuminate\Database\Eloquent\Model;

class KeywordRanking extends Model
{
    protected $table = 'keyword_rankings';

    public static function keywordRankingList($params, $parPage = PER_PAGE, $page = FIRST_PAGE)
    {
        $qb = self::select(['id', 'keyword', 'latest_ranking', 'deduction', 'created_at']);

        !empty($params['id']) && !empty($params['id']) && $qb->where('id', $params['id']);
        !empty($params['keyword']) && !empty($params['keyword']) && $qb->where('keyword', $params['keyword']);
        !empty($params['begin_time']) && $qb->where('created_at', '>=', $params['begin_time']);
        !empty($params['end_time']) && $qb->where('created_at', '<=', $params['end_time']);

        $qb->orderBy('id', 'desc');

        return $qb->paginate($parPage, ['*'], 'page', $page);
    }
}

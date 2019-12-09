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

class ArticleSeo extends Model
{
    protected $table = 'article_seos';



    public static function updateArticleSeo($params, $articleId)
    {

        $qb = self::where(['article_id' => $articleId])->first();

        if (empty($qb)) {
            $qb = new self();
        }
        $Article = Article::where(['id' => $articleId])->first();

        if (empty($Article)) {
            throw new \Exception('文章不存在，请先添加文章');
        }

        !empty($params['article_id']) && $qb->article_id = $articleId;
        !empty($params['seo_tag']) && $qb->seo_tag = $params['seo_tag'];
        !empty($params['seo_title']) && $qb->seo_title = $params['seo_title'];
        !empty($params['seo_key']) && $qb->seo_key = $params['seo_key'];
        !empty($params['seo_desc']) && $qb->seo_desc = $params['seo_desc'];

        return $qb->save();
    }

    public static function detail($articleId)
    {
        return self::select('*')->where(['article_id' => $articleId])->first();

    }
}
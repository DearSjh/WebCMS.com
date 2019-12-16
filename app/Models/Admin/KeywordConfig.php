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

class KeywordConfig extends Model
{
    protected $table = 'keyword_configs';

    public static function updateConfig($params)
    {

        $qb = KeywordConfig::select('*')->first();

        if (empty($qb)) {
            $qb = new self();
        }

        $qb->main = ($params['main'] ?? '');
        $qb->region = ($params['region'] ?? '');
        $qb->prefix = ($params['prefix'] ?? '');
        $qb->suffix = ($params['suffix'] ?? '');
        if ($qb->save()) {
            Keyword::addKeyword($params);
        };
        return $qb;
    }
}

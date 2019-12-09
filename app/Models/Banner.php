<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2019/11/6
 * Time: 18:24
 */

namespace App\Models;


use App\Scopes\LangScope;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{

    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope(new LangScope());

    }
}
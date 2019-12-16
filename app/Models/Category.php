<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2019/11/6
 * Time: 17:07
 */

namespace App\Models;


use App\Scopes\LangScope;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope(new LangScope());

    }

    public static function getCatIdByPath($rPath)
    {
        return Category::select(['id'])->where('dir_name', $rPath)->first();
    }

    public static function getSubCatByPath($path)
    {
        return Category::select(['name', 'dir_name'])->whereIn('dir_name', $path)->get();
    }

    public static function getCatById($catId)
    {
        return Category::select(['type', 'name', 'eng_name', 'dir_name', 'picture', 'link'])->where('id', $catId)->first();
    }

    public function child()
    {
        return $this->hasMany(Category::class, 'parent_id', 'id')
            ->select(['id', 'parent_id', 'name', 'picture', 'link', 'dir_name']);
    }

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id', 'id');
    }

    public static function lists()
    {
        return Category::select(['id', 'parent_id', 'name', 'picture', 'link', 'dir_name'])
            ->with('child.child.child')
            ->where('state', 1)
            ->where('parent_id', 0)
            ->orderBy('sort', 'ASC')
            ->get();
    }


    public static function subCategory($parentId)
    {
        return Category::select(['id', 'parent_id', 'name', 'picture', 'link', 'dir_name'])
            ->with('child.child')
            ->where('state', 1)
            ->where('parent_id', $parentId)
            ->orderBy('sort', 'ASC')
            ->get();
    }


}
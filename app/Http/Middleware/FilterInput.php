<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/11/16
 * Time: 13:37
 */

namespace App\Http\Middleware;

use Closure;

class FilterInput
{
    public function handle($request, Closure $next)
    {

        $data = $request->all();
        foreach ($data as $key => $item) {
            if(!is_array($item)){
                $request[$key] = trim($item);
            }
        }

        return $next($request);
    }
}
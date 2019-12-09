<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/17
 * Time: 14:56
 */

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class Keyword extends Model
{
    public static function addKeyword($params)
    {
        $assembly = self::assembly($params);
        try {
            $qb = Keyword::where('id', '>', 0)->delete();
            DB::transaction(function () use ($assembly) {
                if (is_array($assembly) && !empty($assembly)) {
                    $count = count($assembly);
                    for ($i = 0; $i < $count; $i++) {
                        $qb = new self();
                        $qb->keyword = $assembly[$i];
                        $qb->save();
                    }
                }
            });
            return $qb;
        } catch (\Exception $e) {
            Log::error("添加关键词失败,{$e->getMessage()}");
            preg_match("|entry([^^]*?)for|u", $e, $matches);
            $str = substr($matches[1], 0, strpos($matches[1], '-'));
            throw new \Exception("添加关键词失败： {$str} ");
        }
    }

    public static function assembly($params)
    {

        $main = explode(',', $params['main']);
        $region = explode(',', $params['region']);
        $prefix = explode(',', $params['prefix']);
        $suffix = explode(',', $params['suffix']);

        $regMain = [];

        foreach ($region as $reg) {
            foreach ($main as $item) {
                array_push($regMain, $reg . $item);
            }
        }
        foreach ($region as $reg) {
            foreach ($main as $item) {
                foreach ($suffix as $suf) {
                    array_push($regMain, $reg . $item . $suf);

                }
            }
        }
        foreach ($region as $reg) {
            foreach ($prefix as $pre) {
                foreach ($main as $item) {
                    array_push($regMain, $reg . $item . $pre);
                }
            }
        }
        foreach ($region as $reg) {
            foreach ($prefix as $pre) {
                foreach ($main as $item) {
                    foreach ($suffix as $suf) {
                        array_push($regMain, $reg . $pre . $item . $suf);
                    }
                }
            }
        }
        foreach ($prefix as $pre) {
            foreach ($main as $item) {
                foreach ($suffix as $suf) {
                    array_push($regMain, $pre . $item . $suf);
                }
            }
        }
        return $regMain;
    }


}
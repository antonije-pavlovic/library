<?php
/**
 * Created by PhpStorm.
 * User: antonije
 * Date: 3/5/19
 * Time: 6:50 AM
 */

namespace App\models;


use Illuminate\Support\Facades\DB;

class Error
{
    public static function insertError($text){
        DB::table('error_log')
            ->insert([
                "text" => $text,
                "date" => date('Y-m-d'),
                "time" => date('H:i:s')
            ]);
    }

    public function getErrors(){
        return DB::table('error_log')
            ->get();
    }

}
<?php
/**
 * Created by PhpStorm.
 * User: antonije
 * Date: 2/23/19
 * Time: 7:26 PM
 */

namespace App\models;


use Illuminate\Support\Facades\DB;

class Menu
{
    function getLinks() {
        return DB::table('menu')
            ->get();
    }
}
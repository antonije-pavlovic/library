<?php
/**
 * Created by PhpStorm.
 * User: antonije
 * Date: 3/10/19
 * Time: 4:59 PM
 */

namespace App\models;


use Illuminate\Support\Facades\DB;

class Author
{
    function getAuthors(){
        return DB::table('author')
            ->get();
    }
}
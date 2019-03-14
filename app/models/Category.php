<?php
/**
 * Created by PhpStorm.
 * User: antonije
 * Date: 2/23/19
 * Time: 7:26 PM
 */

namespace App\models;


use Illuminate\Support\Facades\DB;

class Category
{
    function getCategories(){
        return DB::table('category')
            ->get();
    }

    function insertCategory($name){
        return DB::table('category')
            ->insert([
                "name" => $name
            ]);
    }

    function deleteCategory($id){
        return DB::table('category')
            ->where('id','=',$id)
            ->delete();
    }

}
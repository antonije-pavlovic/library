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

    function insertAuthor($name){
        return DB::table('author')
            ->insert([
                "name"=>$name
            ]);
    }

    function deleteAuthor($id){
        return DB::table('author')
            ->where('id','=',$id)
            ->delete();
    }
    function getAuthor($id){
        return DB::table('author')
            ->where('id','=',$id)
            ->first();
    }
    function update($id,$name){
        return DB::table('author')
            ->where('id','=',$id)
            ->update([
                "name"=> $name
            ]);

    }
}
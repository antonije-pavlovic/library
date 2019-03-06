<?php
/**
 * Created by PhpStorm.
 * User: antonije
 * Date: 3/2/19
 * Time: 5:06 PM
 */

namespace App\models;


use Illuminate\Support\Facades\DB;

class Cart
{
    function getBooks(){
        return DB::table('cart as c')
        ->join('book as b','c.book_id','=','b.id')
        ->where('buy','=',0)
        ->select('*','b.id as bookID')
        ->get();
    }

    function addToCart($uid,$pid){
        return DB::table('cart')
            ->insert([
                "user_id" => $uid,
                "book_id" => $pid,
                "buy" => 0
            ]);
    }

    function remove($bookID,$userID){
        return DB::table('cart')
            ->where([
                ['book_id', '=',$bookID],
                ['user_id','=',$userID]
            ])
            ->delete();
    }

    function buy($userID){
        return DB::table('cart')
            ->where('user_id','=',$userID)
            ->update([
                "buy" => 1
            ]);
    }

}
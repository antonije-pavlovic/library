<?php
/**
 * Created by PhpStorm.
 * User: antonije
 * Date: 2/23/19
 * Time: 11:00 AM
 */

namespace App\models;


use Illuminate\Support\Facades\DB;

class Book
{
    function getBook($id){
       return DB::table('book as b')
           ->join('category as c','b.cat_id','=','c.id')
           ->join('author as a','b.author_id','=','a.id')
           ->where('b.id','=',$id)
           ->select('*','b.id as bookID','c.name as catName','a.name as authorName')
           ->get();
    }

    function getNewBooks(){
        return DB::table('book')
            ->orderBy('id','desc')
            ->offset(0)
            ->limit(9)
            ->select('*','book.id as bookID')
            ->get();
    }

    function search ($text){
        return DB::table('book as b')
            ->join('author as a','b.author_id','=','a.id')
            ->where('name','like','%'.$text.'%')
            ->select('*','b.id as bookID','a.id as authorID')
            ->get();
    }

    function paginationSearch($authorID,$from,$perPage){
        return DB::table('book as b')
            ->join('author as a','b.author_id','=','a.id')
            ->where('b.author_id','=',$authorID)
            ->offset($from)
            ->limit($perPage)
            ->select('*','b.id as bookID','a.id as authorID')
            ->get();
    }

    function categoryFilter($catID){
        return DB::table('book as b')
            ->join('category as c','b.cat_id','=','c.id')
            ->where('c.id','=',$catID)
            ->get();
    }

    function paginatinCategory($catID,$from,$perPage){
        return DB::table('book as b')
            ->join('category as c','b.cat_id','=','c.id')
            ->where('b.cat_id','=',$catID)
            ->offset($from)
            ->limit($perPage)
            ->select('*','b.id as bookID','c.id as catID')
            ->get();
    }
}
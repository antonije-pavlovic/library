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
           ->select('*','b.id as bookID','c.name as catName','a.name as authorName','c.id as catID','a.id as authorID')
           ->get();
    }

    function getBooks(){
        return DB::table('book as b')
            ->join('author as a','b.author_id','=','a.id')
            ->join('category as c','b.cat_id','=','c.id')
            ->select('*','a.name as authorName','c.name as categoryName','b.id as bookID')
            ->get();
    }

    function insertBook($title,$pages,$year,$isbn,$picture,$author,$category,$description,$price){
        return DB::table('book')
            ->insert([
                "title" => $title,
                "pages" => $pages,
                "Year_of_issue" => $year,
                "isbn" => $isbn,
                "description" => $description,
                "picture" => $picture,
                "price" => $price,
                "author_id" => $author,
                "cat_id" => $category
            ]);
    }

    function updateBook($title,$pages,$year,$isbn,$picture,$author,$category,$description,$price,$id){
        return DB::table('book')
            ->where('id' ,'=',$id)
            ->update([
                "title" =>  $title,
                "pages" => $pages,
                "Year_of_issue" => $year,
                "isbn" => $isbn,
                "description" => $description,
                "picture" => $picture,
                "price" => $price,
                "author_id" => $author,
                "cat_id" => $category
            ]);
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
            ->select('*','b.id as bookID')
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
<?php

namespace App\Http\Controllers;

use App\Mail;
use App\models\Activity;
use App\models\Book;
use App\models\Category;
use App\models\Error;
use App\models\Menu;
use Illuminate\Http\Request;
use test\Mockery\MagicParams;

class FrontController extends Controller
{
    private $b;
    private $m;
    private $c;
    private $mail;

    public function __construct() {
        $this->b = new Book();
        $this->m = new Menu();
        $this->c = new Category();
        $this->mail = new Mail();
    }

    function renderHome() {
        $res = $this->b->getNewBooks();
        $links = $this->m->getLinks();
        $cat = $this->c->getCategories();
        if(!session()->has('links'))
            session()->push('links',$links);
        if(!session()->has('categories'))
            session()->push('categories',$cat);
        return view('pages.home',['books' => $res]);
    }

    function author(){
        return view('pages.author');
    }

    function contact(){
        return view('pages.contact');
    }

    function support(Request $request){
        $email = $request->input('email');
        $username= $request->input('username');
        $text = $request->input('text');
        $subject = $request->input('subject');
        $userID = $request->input('userID');

        try{
            $res = $this->mail->support($email,$username,$subject,$text);
            if($res) {
                Activity::insertActivity($userID,'User was contact support');
                return response()->json(['code'=>$res]);
            }
            else
                return response()->json(['code'=>$res]);
        }catch (\Exception $e) {
            Error::insertError($e);
        }
    }

    function search(Request $request) {
        $text = strtolower($request->input('text'));
        $res = $this->b->search($text);
        return response()->json(["data"=>$res]);
    }

    function paginationSearch(Request $req) {
        $page = $req->input('page');
        $authorID = $req->input('authorID');
        $perPage = $req->input('numPerPage');

        $offset = ($page - 1) * $perPage;

        $res = $this->b->paginationSearch($authorID,$offset,$perPage);
        return response()->json($res);

    }

    function categoryFilter(Request $req) {
        $catID = $req->input('catID');
        $res = $this->b->categoryFilter($catID);
        if($res)
            return response()->json($res);
    }

    function paginatinCategory(Request $req) {
        $page = $req->input('page');
        $catID = $req->input('catID');
        $perPage = $req->input('numPerPage');
        $offset = ($page - 1) * $perPage;
        $res = $this->b->paginatinCategory($catID,$offset,$perPage);
        return response()->json($res);
    }
}

<?php

namespace App\Http\Controllers;

use App\Mail;
use App\models\Activity;
use App\models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    private $c;
    private $mail;
    private $activity;
    function __construct()
    {
        $this->c = new Cart();
        $this->mail = new Mail();
        $this->activity = new Activity();
    }

    function renderCart(){
        $res = $this->c->getBooks();
        if(count($res))
            return view('pages.cart',["books" => $res]);
        else
            return view('pages.cart' ,["notice" => 'You did not yet buy anything']);
    }

    function addToCart(Request $req){
        $uid = $req->input('uid');
        $pid = $req->input('pid');

        $res = $this->c->addToCart($uid,$pid);
        if($res)
            return response()->json($res);
        else
            return response()->json(false);
    }

    function remove(Request $req){
        $bookID = $req->input('bookID');
        $userID = $req->input('userID');
        $res = $this->c->remove($bookID,$userID);
        if($res)
            return response()->json($res);
        else
            return response()->json(['status' => 409]);
    }

    function buy(Request $req){
        $userID = $req->input('userID');
        $res = $this->c->buy($userID);
        if($res == 1){
            $code = $this->mail->confirmationMail($userID);
            if($code == 200){
                $this->activity->insertActivity($userID,'user has made purchase');
                return response()->json($code);
            }

        }


    }
}

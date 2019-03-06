<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegistrationRequest;
use App\Mail;
use App\models\Activity;
use App\models\Error;
use App\models\User;
use http\Env\Response;
use Illuminate\Http\Request;

class AuthController extends Controller
{

    function renderLogin() {
        return view('pages.login');
    }

    function renderRegister() {
        return view('pages.register');
    }

    function login(LoginRequest $req) {
        $username = $req->input('username');
        $password = $req->input('password');
        $u = new User();
        $res = $u->login($username,$password);
        if($res) {
            session()->push('user',$res);
            Activity::insertActivity($res->id,'user logged in');
            return response()->json(['code'=> 200]);
        }else {
            Error::insertError('Login failed - Unprocessable Entity');
            return response()->json(['code'=>422]);
        }

    }

    function logout(Request $req) {
        $id = $req->session()->get('user')[0]->id;
        $req->session()->forget('user');
        $req->session()->flush();
        Activity::insertActivity($id,'user logged out');
        return redirect('/login');
    }

    function register(RegistrationRequest $req) {
        $name = $req->input('name');
        $username = $req->input('username');
        $password = $req->input('password');
        $email = $req->input('email');
        $token = md5(time() . $password);
        $u = new User();
        try{
            $res = $u->register($name,$username,$password,$email,$token);
            if($res){
                Activity::insertActivity($res,'the user has registered');
                $mail = new Mail();
                $code = $mail->register($token,$email);
                return response()->json(['code'=> $code]);
            }else {
                Error::insertError('Register failed');
                return response()->json(['code'=> 250]);
            }

        }catch (\Exception $e) {
            Error::insertError($e);
            return response()->json($e);
        }
    }

    function verification($token) {
        $u = new User();
        $res = $u->activateUser($token);
        if($res)
            return redirect('/');
    }
}

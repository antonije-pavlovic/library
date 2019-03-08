<?php
/**
 * Created by PhpStorm.
 * User: antonije
 * Date: 2/24/19
 * Time: 1:24 PM
 */

namespace App\models;


use App\Http\Middleware\Authenticate;
use Illuminate\Support\Facades\DB;


class User
{
    function login($username,$password){
        return DB::table('user')
            ->where([
                'username' => $username,
                'password' => $password
            ])
            ->first();
    }
    function register($name,$username,$password,$email,$token) {
        return DB::table('user')
            ->insertGetId([
                "name" => $name,
                "username" => $username,
                "password" => $password,
                "email" => $email,
                "active" => 0,
                "token" => $token,
                "role_id" => 1
            ]);
    }
    function activateUser($token){
        return DB::table('user')
            ->where('token',$token)
            ->update([
                "active" => 1
            ]);
    }

    function getUser($id){
        return DB::table('user')
            ->where('id','=',$id)
            ->first();
    }
    //$name,$username,$password,$email,$active,$token,$role

    function insert($name,$username,$password,$email,$active,$token,$role) {
        return DB::table('user')
            ->insert([
                "name" => $name,
                "username" => $username,
                "password" => $password,
                "email" => $email,
                "active" => $active,
                "token" => $token,
                "role_id" => $role
            ]);
    }

    function getAllUsers(){
        return DB::table('user')
            ->get();
    }

    function delete($id){
        return DB::table('user')
            ->where('id','=',$id)
            ->delete();
    }

}
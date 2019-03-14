<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    function renderAdmin(){
        return view('pages/admin/main');
    }
    function unauthorized() {
        return view('pages/admin/unauthorized');
    }
}

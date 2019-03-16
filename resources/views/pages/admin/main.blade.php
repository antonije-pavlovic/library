@extends('layouts.admin')
@section('content')
    {{session('message')}}
    <div class="content justify-content-center">
        <div class="row">
            <div class="col-lg-5"></div>
            <h3 class="col-lg-4 sidebar-heading mt-5">Welcome admin, {{session()->get('user')[0]->name}} </h3>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4"></div>
        <h5 class="col-lg-4 sidebar-heading mt-5">Here you can manage users,book,authors and categories </h5>
    </div>
@endsection
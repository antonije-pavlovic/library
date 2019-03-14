@extends('layouts.main')
@section('content')
    <div class="container py-5">
        <div class="row">
            <div class="col-md-12">
                <h2 class="text-center text-white mb-4"></h2>
                <div class="row">
                    <div class="col-md-6 mx-auto">
                        <div class="card rounded-0">
                            <div class="card-header">
                                <h3 class="mb-0">Login <p class="unregistered" style="color: red">  </p></h3>
                            </div>
                            <div class="card-body">
                                <form class="form" role="form"  id="formLogin">
                                    <div class="form-group">
                                        <label for="uname1">Username</label>
                                        <input type="text" class="form-control form-control-lg rounded-0 username" name="uname1">
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" class="form-control form-control-lg rounded-0 password" >
                                    </div>
                                    <div>
                                        <label class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input">
                                            <span class="custom-control-indicator"></span>                                                                              </label>
                                    </div>
                                    <button type="button" class="btn btn-success btn-lg float-right login">Login</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
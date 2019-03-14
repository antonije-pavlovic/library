@extends('layouts.admin')
@section('content')
        <div class="container">
            <form class="form-horizontal mt-5" role="form" id="form">
                <h2>Register new user</h2>
                <div class="form-group">
                    <label for="firstName" class="col-sm-3 control-label"> Name</label>
                    <div class="col-sm-9">
                        <input type="text" id="name" placeholder="First Name" class="form-control" autofocus>
                    </div>
                </div>
                <div class="form-group">
                    <label for="lastName" class="col-sm-3 control-label">Username</label>
                    <div class="col-sm-9">
                        <input type="text" id="username" placeholder="Last Name" class="form-control" autofocus>
                    </div>
                </div>
                <div class="form-group">
                    <label for="email" class="col-sm-3 control-label">Email </label>
                    <div class="col-sm-9">
                        <input type="email" id="email" placeholder="Email" class="form-control" name= "email">
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="col-sm-3 control-label">Password</label>
                    <div class="col-sm-9">
                        <input type="password" id="password" placeholder="Password" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="col-sm-3 control-label">Active</label>
                    <div class="col-sm-9">
                        <select class="form-control input-sm" id="active">
                            <option>Active or not</option>
                            <option value="0">0 - (non-active)</option>
                            <option value="1">1 - (active)</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="col-sm-3 control-label">Role</label>
                    <div class="col-sm-9">
                        <select class="form-control input-sm" id="role">
                            <option>Choose a role</option>
                            <option value="1">1 - (user)</option>
                            <option value="2">2 - (admin)</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-9 mt-5">
                        <button type="button" class="btn btn-primary btn-block registerNewUser">Register</button>
                </div>
                </div>
            </form> <!-- /form -->
            <div class="row">
                <div class="col-lg-6 mx-auto addUserErrors">

                </div>
            </div>
        </div> <!-- ./container -->
        <div class="modal fade" id="addUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">New user added</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        You have successfully added a new user
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

@endsection
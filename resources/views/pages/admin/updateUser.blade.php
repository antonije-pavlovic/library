@extends('layouts.admin')
@section('content')
    <div class="container">
        <form class="form-horizontal mt-5" role="form" id="form">
            <h2>Update user</h2>
            <div class="form-group">
                <label for="firstName" class="col-sm-3 control-label"> Name</label>
                <div class="col-sm-9">
                    <input type="text" id="name" placeholder="First Name" class="form-control" value="{{$user->name}}">
                </div>
            </div>
            <div class="form-group">
                <label for="lastName" class="col-sm-3 control-label">Username</label>
                <div class="col-sm-9">
                    <input type="text" id="username" placeholder="Last Name" class="form-control"  value="{{$user->username}}">
                </div>
            </div>
            <div class="form-group">
                <label for="email" class="col-sm-3 control-label">Email </label>
                <div class="col-sm-9">
                    <input type="email" id="email" placeholder="Email" class="form-control" name= "email" value="{{$user->email}}">
                </div>
            </div>
            <div class="form-group">
                <label for="password" class="col-sm-3 control-label">Active</label>
                <div class="col-sm-9">
                    <select class="form-control input-sm" id="active" >
                         @for($i = 0 ; $i < 2 ; $i++)
                             @if($i == $user->active)
                                <option value="{{$i}}" selected>{{$i}}</option>
                                @continue
                            @endif
                                <option value="{{$i}}">{{$i}}</option>

                         @endfor
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="password" class="col-sm-3 control-label">Role</label>
                <div class="col-sm-9">
                    <select class="form-control input-sm" id="role" >
                        @for($i = 1 ; $i < 3 ; $i++)
                            @if($i == $user->role_id)
                                <option value="{{$i}}" selected>{{$i}}</option>
                                @continue
                            @endif
                            <option value="{{$i}}">{{$i}}</option>

                        @endfor
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-9 mt-5">
                    <button type="button" class="btn btn-primary btn-block updateUser" data-uid="{{$user->id}}">Update</button>
                </div>
            </div>
        </form> <!-- /form -->
    </div>
    <div class="modal fade" id="updateSuccesfull" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update user</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    You have successfully made changes
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@extends('layouts.main')
@section('content')
    <div class="container py-5">
        <div class="row">
            <div class="col-md-12">
                <h2 class="text-center text-white mb-4">Bootstrap 4 Login Form</h2>
                <div class="row">
                    <div class="col-md-6 mx-auto">
                        <div class="card rounded-0">
                            <div class="card-header">
                                <h3 class="mb-0">Register</h3>
                            </div>
                            <div class="card-body">
                                <form class="form" role="form">
                                    <div class="form-group">
                                        <label for="uname1">Name</label>
                                        <input type="text" class="form-control form-control-lg rounded-0 name"/>
                                    </div>
                                    <div class="form-group">
                                        <label for="uname1">Username</label>
                                        <input type="text" class="form-control form-control-lg rounded-0 username">

                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" class="form-control form-control-lg rounded-0 password">
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" class="form-control form-control-lg rounded-0 email">
                                    </div>
                                    <button type="button" class="btn btn-success btn-lg float-right register">Register</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 mx-auto registerErrors">

                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Please check your mail and click on link so you can verify account
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
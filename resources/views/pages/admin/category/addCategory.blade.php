@extends('layouts.admin')
@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-5">
                <h4 class="mt-4">Enter a new category</h4>
                <form>
                    <div class="form-group">
                        <input type="text" class="form-control category mt-3 categoryName"  placeholder="Enter name">
                    </div>
                    <div class="form-group">
                        <button type="button" class="btn btn-primary addCategory"> Submit </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
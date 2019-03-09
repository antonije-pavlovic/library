@extends('layouts.admin')
@section('content')
    <div class="container mt-5">
        <div class="table-wrapper-scroll-y my-custom-scrollbar">
        <table class="table mt-3">
            <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Username</th>
                <th scope="col">Delete</th>
                <th scope="col">Edit</th>
                <th scope="col">Activity</th>
            </tr>
            </thead>
            <tbody>
            @php ($counter =0)
            @foreach($users as $user)
                <tr>
                    <td scope="row">{{++$counter}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->username}}</td>
                    <td> <button type="button" class="btn btn-danger deleteUser" data-uid="{{$user->id}}"> Delete</button> </td>
                    <td> <a href="/updateForm/{{$user->id}}" class="btn btn-primary">Update</a> </td>
                    <td> <a href="/userActivity/{{$user->id}}" class="btn btn-success" >Activity</a> </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        </div>
    </div>
@endsection
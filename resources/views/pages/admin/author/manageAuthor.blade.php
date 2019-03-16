@extends('layouts.admin')
@section('content')
    <div class="container mt-5">
        <div class="table-wrapper-scroll-y my-custom-scrollbar">
            <table class="table mt-3">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Delete</th>
                    <th scope="col">Update</th>
                </tr>
                </thead>
                <tbody>
                @php ($counter = 0)
                @foreach($authors as $author)
                    <tr>
                        <td scope="row">{{++$counter}}</td>
                        <td>{{$author->name}}</td>
                        <td> <button type="button" class="btn btn-danger deleteAuthor" data-pid="{{$author->id}}"> Delete</button> </td>
                        <td> <a href="/updateAuthorForm/{{$author->id}}" class="btn btn-primary"> Update </a> </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
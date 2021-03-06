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
                @foreach($category as $cat)
                    <tr>
                        <td scope="row">{{++$counter}}</td>
                        <td>{{$cat->name}}</td>
                        <td> <button type="button" class="btn btn-danger deleteCategory" data-pid="{{$cat->id}}"> Delete</button> </td>
                        <td> <a href="/updateCategoryForm/{{$cat->id}}" class="btn btn-primary">Update</a> </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
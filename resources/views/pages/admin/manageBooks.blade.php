@extends('layouts.admin')
@section('content')
    <div class="container mt-5">
        <div class="table-wrapper-scroll-y my-custom-scrollbar">
            <table class="table mt-3">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Picture</th>
                    <th scope="col">Title</th>
                    <th scope="col">Year of issue</th>
                    <th scope="col">ISBN</th>
                    <th scope="col">Author</th>
                    <th scope="col">Category</th>
                    <th scope="col">Delete</th>
                    <th scope="col">Update</th>
                </tr>
                </thead>
                <tbody>
                @php ($counter =0)
                @foreach($books as $book)
                    <tr>
                        <td scope="row">{{++$counter}}</td>
                        <td> <img class="img-fluid" src="{{$book->picture}}" width="100px"> </td>
                        <td>{{$book->title}}</td>
                        <td>{{$book->Year_of_issue}}</td>
                        <td>{{$book->isbn}}</td>
                        <td>{{$book->authorName}}</td>
                        <td>{{$book->categoryName}}</td>
                        <td> <button type="button" class="btn btn-danger deleteBook" data-pid="{{$book->bookID}}"> Delete</button> </td>
                        <td> <a href="/updateBookForm/{{$book->id}}" class="btn btn-primary">Update</a> </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
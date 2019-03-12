@extends('layouts.admin')
@section('content')
    <div class="container">
        <h4 class="mt-4">Enter a new book</h4>
        <form class="mt-3" action="/uploadBook" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="exampleFormControlInput1">Title</label>
                <input type="text" class="form-control" name="title" placeholder="Enter title">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Number of pages</label>
                <input type="text" class="form-control" name="pages" placeholder="Enter number of pages">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Year of issue</label>
                <input type="text" class="form-control" name="year" placeholder="Enter year">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">ISBN</label>
                <input type="text" class="form-control" name="isbn" placeholder="Enter isbn">
            </div>
            <div class="form-group">
                <label for="description">Enter Description</label>
                <textarea class="form-control" name="description" rows="3"></textarea>
            </div>
            <div class="form-group">
                <label for="exampleFormControlFile1">Upload picture</label>
                <input type="file" class="form-control-file" name="picture">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Price</label>
                <input type="text" class="form-control" name="price" placeholder="$$$">
            </div>
            <div class="form-group">
                <label for="author">Choose author</label>
                <select class="form-control" name="author">
                    <option value="0">Choose author</option>
                    @foreach($authors as $author)
                        <option value="{{$author->id}}"> {{$author->name}} </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="category">Choose category</label>
                <select class="form-control" name="category">
                    <option value="0">Choose category</option>
                    @foreach($categories as $cat)
                        <option value="{{$cat->id}}"> {{$cat->name}} </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary"> Submit </button>
            </div>
        </form>
    </div>
@endsection
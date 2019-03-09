@extends('layouts.admin')
@section('content')
    <div class="container">
        <h4 class="mt-4">Enter a new book</h4>
        <form class="mt-3" action="/">
            <div class="form-group">
                <label for="exampleFormControlInput1">Title</label>
                <input type="text" class="form-control" id="title" placeholder="Enter title">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Number of pages</label>
                <input type="text" class="form-control" id="pages" placeholder="Enter number of pages">
            </div>

            <div class="form-group">
                <label for="exampleFormControlInput1">Year of issue</label>
                <input type="text" class="form-control" id="year" placeholder="Enter year">
            </div>

            <div class="form-group">
                <label for="exampleFormControlInput1">ISBN</label>
                <input type="text" class="form-control" id="isbn" placeholder="Enter isbn">
            </div>

            <div class="form-group">
                <label for="exampleFormControlTextarea1">Enter Description</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>

            <div class="form-group">
                <label for="exampleFormControlFile1">Upload picture</label>
                <input type="file" class="form-control-file" id="picture">
            </div>

            <div class="form-group">
                <label for="exampleFormControlInput1">Price</label>
                <input type="text" class="form-control" id="price" placeholder="$$$">
            </div>

            <div class="form-group">
                <label for="exampleFormControlSelect1">Choose author</label>
                <select class="form-control" id="exampleFormControlSelect1">
                    <option>1</option>
                </select>
            </div>

            <div class="form-group">
                <label for="exampleFormControlSelect1">Choose category</label>
                <select class="form-control" id="exampleFormControlSelect1">
                    <option>1</option>
                </select>
            </div>

        </form>
    </div>
@endsection
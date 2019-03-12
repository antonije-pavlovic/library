@extends('layouts.admin')
@section('content')
    <div class="container">
        <form class="form-horizontal mt-5" action="/updateBook/{{$book[0]->bookID}}" method="post" enctype="multipart/form-data">
            @csrf
            <h2>Update user</h2>
            <div class="form-group">
                <label for="firstName" class="col-sm-3 control-label"> Title</label>
                <div class="col-sm-9">
                    <input type="text" name="title" class="form-control" value="{{$book[0]->title}}">
                </div>
            </div>
            <div class="form-group">
                <label for="lastName" class="col-sm-3 control-label">Pages</label>
                <div class="col-sm-9">
                    <input type="text" name="pages" class="form-control"  value="{{$book[0]->pages}}">
                </div>
            </div>
            <div class="form-group">
                <label for="email" class="col-sm-3 control-label">Year of issue </label>
                <div class="col-sm-9">
                    <input type="text" name="year" class="form-control" value="{{$book[0]->Year_of_issue}}">
                </div>
            </div>
            <div class="form-group">
                <label for="email" class="col-sm-3 control-label">ISBN</label>
                <div class="col-sm-9">
                    <input type="text" name="isbn" class="form-control" value="{{$book[0]->isbn}}">
                </div>
            </div>

            <div class="form-group">
                <label for="email" class="col-sm-3 control-label">Price</label>
                <div class="col-sm-9">
                    <input type="text" name="price" class="form-control" value="{{$book[0]->price}}">
                </div>
            </div>

            <div class="form-group">
                <label for="exampleFormControlTextarea1">Description</label>
                <textarea class="form-control" name="description" rows="3">{{$book[0]->description}}</textarea>
            </div>

            <div class="form-group">
                <label for="exampleFormControlTextarea1">Picture</label>
                <img class="img-fluid" name="bla" src="{{$book[0]->picture}}" width="200px">
                <input type="hidden" value="{{$book[0]->picture}}" name="oldPicture">
            </div>

            <div class="form-group">
                <label for="exampleFormControlFile1">Upload new picture</label>
                <input type="file" class="form-control-file" name="newPicture" >
            </div>

            <div class="form-group">
                <label for="password" class="col-sm-3 control-label">Author</label>
                <div class="col-sm-9">
                    <select class="form-control input-sm" name="author" >
                        @foreach($authors as $author)
                            @if($book[0]->authorID == $author->id )
                                <option value="{{$author->id}}" selected> {{$author->name}} </option>
                                @continue
                            @endif
                            <option value="{{$author->id}}"> {{$author->name}} </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="password" class="col-sm-3 control-label">Category</label>
                <div class="col-sm-9">
                    <select class="form-control input-sm" name="category" >
                        @foreach($categories as $cat)
                            @if($book[0]->catID == $cat->id )
                                <option value="{{$cat->id}}" selected> {{$cat->name}} </option>
                                @continue
                            @endif
                            <option value="{{$cat->id}}"> {{$cat->name}} </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-9 mt-5">
                    <button type="submit" class="btn btn-primary btn-block">Update</button>
                </div>
            </div>

        </form> <!-- /form -->
    </div>
@endsection()
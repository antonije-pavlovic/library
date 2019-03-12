@extends('layouts.main')

@section('bg_image')
    <div class="container-fluid">
        <img src="{{asset('/')}}images/library.jpg" class="img-fluid">
    </div>
@endsection

@section('content')
    <div class="row justify-content-center mt-5">
        <h3>New Materials</h3>

    </div>
    <div class="row mt-5 ml-5">
        <div class="col-lg-4">
            <div class="row">
                <form class="card ">
                    <div class="card-body row align-items-center">
                        <div class="col-auto">
                            <button class="btn btn-success searchBtn" type="button">Search</button>
                        </div>
                        <!--end of col-->
                        <div class="col">
                            <input class="form-control form-control-borderless searchTxt" type="search" placeholder="Search by author">
                        </div>
                        <!--end of col-->
                        <div class="col-auto">
                        </div>
                        <!--end of col-->
                    </div>
                </form>
            </div>
        </div>
        <div class="col-lg-8">
           <div class="row productContainer">
               @foreach($books as $book)
                   <div class="card col-lg-3 m-2  bg-light ">
                       <img src="{{$book->picture}}" class="card-img-top pt-2" alt="...">
                       <div class="card-body">
                           <h5 class="card-title">{{$book->title}}</h5>
                           <p class="card-text">{{$book->description}}</p> ...
                       </div>
                       <div class="card-footer mb-2">
                           <a href="/moreInfo/{{$book->bookID}}" class="text-muted">More info</a>
                       </div>
                   </div>
               @endforeach
           </div>
            <div class="row justify-content-center">
                <nav class="paginationContainer">

                </nav>
            </div>
        </div>

    </div>
    <div class="modal fade"  tabindex="-1"  id="emptySearch" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Notice</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Please insert the name of author or search by category in menu
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


@endsection
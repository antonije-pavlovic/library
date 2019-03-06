@extends('layouts.main')
@section('content')

    <div class="row justify-content-center mt-5">

        <div class="col-lg-6 mt-5">
            <img src="{{$book[0]->picture}}"/>
        </div>
        <div class="col-lg-6 mt-5">
            <h2 class="mb-5">{{$book[0]->title}}</h2>
            <table class="table ">
                <tbody>
                <tr>
                    <td>Author</td>
                    <td align="center"> {{$book[0]->authorName}}</td>
                </tr>
                <tr>
                    <td>Number of pages</td>
                    <td align="center">{{$book[0]->pages}}</td>
                </tr>
                <tr>
                    <td >Year of issue</td>
                    <td align="center">{{$book[0]->Year_of_issue}}</td>
                </tr>
                <tr>
                    <td >Category</td>
                    <td align="center">{{$book[0]->catName}}</td>
                </tr>
                <tr>
                    <td >ISBN:</td>
                    <td align="center">{{$book[0]->isbn}}</td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        <p>
                            {{$book[0]->description}}
                        </p>
                    </td>
                </tr>
                </tbody>
            </table>
            @if(session()->has('user'))
                <button class="btn btn-outline-success my-3 my-sm-0 addToCart" data-uid="{{session()->get('user')[0]->id}}" data-pid="{{$book[0]->bookID}}">Add to cart</button>
            @endif
        </div>
    </div>
@endsection
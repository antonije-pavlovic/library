@extends('layouts.admin')
@section('content')

    <div class="container mt-3">
        <h5>Errors occured in app </h5>
        <div class="table-wrapper-scroll-y my-custom-scrollbar">
        <table class="table mt-3">
            <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Text</th>
                <th scope="col">Date</th>
                <th scope="col">Time</th>
            </tr>
            </thead>
            <tbody>
            @php ($counter =0)
            @foreach($errors as $err)
                <tr>
                    <th scope="row">{{++$counter}}</th>
                    <td>{{$err->text}}</td>
                    <td>{{$err->date}}</td>
                    <td>{{$err->time}}</td>
                </tr>
            @endforeach

            </tbody>
        </table>
        </div>
        <span>Get export in <a href="/errorCSV">CSV</a></span>
    </div>
@endsection
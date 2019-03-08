@extends('layouts.admin')
@section('content')
    <div class="container mt-5">
        <h5>All activities in app <span>Get export in <a href="/activityCSV">CSV</a></span></h5>
        <div class="table-wrapper-scroll-y my-custom-scrollbar">
        <table class="table mt-3">
            <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">User</th>
                <th scope="col">Activity</th>
                <th scope="col">Date</th>
                <th scope="col">Time</th>
            </tr>
            </thead>
            <tbody>
            @php ($counter =0)
            @foreach($data as $activity)
                <tr>
                    <th scope="row">{{++$counter}}</th>
                    <td>{{$activity->user_id}}</td>
                    <td>{{$activity->activity}}</td>
                    <td>{{$activity->date}}</td>
                    <td>{{$activity->time}}</td>
                </tr>
            @endforeach

            </tbody>
        </table>
        </div>
    </div>
@endsection
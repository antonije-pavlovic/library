@extends('layouts.admin')
@section('content')
    <div class="container mt-5">

        <h5>Search by date</h5>
        <div class="row">
            <div class="col-lg-5">
                <div class="form-group">
                    <label > From: </label>
                    <input type="date" name="bday" max="3000-12-31"
                           min="1000-01-01" class="form-control from">
                </div>
            </div>
            <div class="col-lg-5">
                <div class="form-group">
                    <label > To: </label>
                    <input type="date" name="bday" min="1000-01-01"
                           max="3000-12-31" class="form-control to">
                </div>
            </div>
            <div class="col-lg-2">
                <div class="form-group">
                    <button class="btn btn-outline-secondary mt-4 activityDate" type="button" id="button-addon1"> Submit </button>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-5 activityContainer">
        <h5>All activities in app </h5>
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
        <span class="mt-3">Get export in <a href="/activityCSV">CSV (all data from database)</a></span>
    </div>

@endsection
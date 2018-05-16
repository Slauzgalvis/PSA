@extends('layouts.app')
@section('content')
<div>


<table style="text-align: center; width:100%; border-style: solid; background-color:white">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Applied for</th>
                <th>Date applied</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        @foreach ($applications as $application)
    <tr style=" border-style: solid; border-width: 0.5px">
        <td>{{$application->id}}</td>
        <td><a href="/home/workad/{{$application->user->id}}/profile/{{$application->user->id}}" class=""> {{$application->user->name}}</a></td>
        <td><a href="/home/workad/{{$application->workAd->id}}" class=""> {{$application->workad->name}}</a></td>
        <td>{{$application->created_at}}</td>
        <td> @if($application->confirmed == 1) Accepted @else Tests Sent @endif </td>

        <td>
            <form style="display:inline" action="/decline/{{$application->id}}" method="post"> {{csrf_field()}}
            <input type="hidden" name="application" value="{{$application->id}}">
            <button type="submit" class="btn btn-danger">Decline</button>
            </form>
            <a href="/home/applicants/assign/{{$application->user->id}}" class="btn btn-primary">Tests</a>
             <a href="/home/applicants/assignTask/{{$application->user->id}}" class="btn btn-primary">Tasks</a>
            <a href="/sendMessage/chat/{{$application->user->id}}" class="btn btn-success">Message</a>
        </td>
        </td>
    </tr>
        @endforeach
        </table>


@endsection
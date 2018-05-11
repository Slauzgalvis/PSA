@extends('layouts.app')
@section('content')
<div>


<table style="text-align: center; width:100%; border-style: solid; background-color:white">
            <tr>
                <th>ID</th>
                <th>Created_by</th>
                 <th>Test Name</th>
                <th>Assigned</th>
                <th>Actions</th>
            </tr>
        @foreach ($results as $result)
    <tr style=" border-style: solid; border-width: 0.5px">
               <td>{{$result->id}}</td>
               <td><a href="/home/company/{{$result->test->user->id}}">{{$result->test->user->name}}</a></td>
               <td>{{$result->test->test_name}}</td>
               <td>{{$result->created_at}}</td>

               <td><a href="/home/mytests/{{$result->id}}" class="btn btn-primary">Do</a></td>
    </tr>
        @endforeach
        </table>


@endsection
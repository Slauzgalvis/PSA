@extends('layouts.app')
@section('content')
<div>

@if(count($tests)>0)
TESTS
<table style="text-align: center; width:100%; border-style: solid; background-color:white">
            <tr>
                <th>ID</th>
                <th>Created_by</th>
                 <th>Test Name</th>
                <th>Assigned</th>
                <th>Actions</th>
            </tr>
        @foreach ($tests as $test)
    <tr style=" border-style: solid; border-width: 0.5px">
               <td>{{$test->id}}</td>
               <td><a href="/home/company/{{$test->test->user->id}}">{{$test->test->user->name}}</a></td>
               <td>{{$test->test->test_name}}</td>
               <td>{{$test->created_at}}</td>

               <td><a href="/home/mytests/{{$test->id}}" class="btn btn-primary">Do</a></td>
    </tr>
        @endforeach
        </table>
@endif
@if(count($tasks)>0)
TASKS
        <table style="text-align: center; width:100%; border-style: solid; background-color:white">
            <tr>
                <th>ID</th>
                <th>Created_by</th>
                 <th>Task Name</th>
                <th>Assigned</th>
                <th>Actions</th>
            </tr>
        @foreach ($tasks as $task)
    <tr style=" border-style: solid; border-width: 0.5px">
               <td>{{$task->id}}</td>
               <td><a href="/home/company/{{$task->task->user->id}}">{{$task->task->user->name}}</a></td>
               <td>{{$task->task->test_name}}</td>
               <td>{{$task->created_at}}</td>

               <td><a href="/home/mytests/task/{{$task->id}}" class="btn btn-primary">Upload</a></td>
    </tr>
        @endforeach
        </table>
@endif

@endsection
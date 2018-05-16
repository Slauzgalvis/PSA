@extends('layouts.app')
@section('content')
<div>


<table style="text-align: center; width:100%; border-style: solid; background-color:white">
            <tr>
                <th>ID</th>
                <th>Created_by</th>
                 <th>Task Name</th>
                <th>Assigned</th>
                <th>Actions</th>
            </tr>
        @foreach ($results as $result)
    <tr style=" border-style: solid; border-width: 0.5px">
               <td>{{$taskfile->id}}</td>
               <td><a href="/home/company/{{$taskfile->task->user->id}}">{{$taskfile->task->user->name}}</a></td>
               <td>{{$taskfile->task->task_name}}</td>
               <td>{{$taskfile->created_at}}</td>
               <td><a href="/home/mytasks/{{$result->id}}" class="btn btn-primary">Upload file</a></td>
    </tr>
        @endforeach
        </table>


@endsection
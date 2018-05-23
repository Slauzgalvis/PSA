@extends('layouts.app')

@section('content')

<div class="container">
    <strong>TASK DESCRIPTION : </strong>
    <p> {{$task_files->task->test_name}} </p>
    <small> completed at {{$task_files->updated_at}} </small> <br>
    <strong>TASK FILE : </strong>
    {{$task_files->avatar}}<br>
    <a href="/home/results/tasks/download/{{$task_files->id}}" class="btn btn-success" style="margin-top:10px; width: 20%;"> Download </a><br>


    
    <a href="/home" class="btn btn-primary" style="margin-top:10px; width: 20%;"> Back </a>
    </div>
@endsection
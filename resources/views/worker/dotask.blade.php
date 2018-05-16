@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">

</div>

<div class="container">
    

<form name="do_task" id="do_task" method="post" enctype="multipart/form-data">
  <input name="_token" type="hidden" value="{{ csrf_token() }}">
  <input name="taskid" type="hidden" value="{{$task_files->id}}">

    TASK DESCRIPTION :<br>
    <p>{{$task_files->task->test_name}}</p>
        <input type="file" id="file" name="file"><br>
   
   <input type="submit" class="submit btn btn-success" id="submit" value="Save" style="margin-top:10px; width: 20%"/><br>
   <a href="/home/mytests/" class="btn btn-primary" style="margin-top:10px; width: 20%;"> Back </a>
</form>

@endsection
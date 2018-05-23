@extends('layouts.app')

@section('content')

<div class="container" style="text-align: center;background-color: white;">
    <div class="row justify-content-center" style="text-align: center;">
 @if ($errors->any())
            @foreach ($errors->all() as $error)
                <p style="color:red">{{ $error }}</p>
            @endforeach
@endif           
</div>

<div class="container">
    

<form name="do_task" id="do_task" method="post" enctype="multipart/form-data">
  <input name="_token" type="hidden" value="{{ csrf_token() }}">
  <input name="taskid" type="hidden" value="{{$task_files->id}}">

    <strong>TASK DESCRIPTION : </strong><br>
    <p><i>{{$task_files->task->test_name}}</i></p>
        <input style="padding-left:10%;" type="file" id="file" name="file" accept=".pdf,.txt,.zip,.rar,.doc,.docx"><br>
   
   <input type="submit" class="submit btn btn-success" id="submit" value="Save" style="margin-top:10px; width: 20%"/><br>
   <a href="/home/mytests/" class="btn btn-primary" style="margin-top:10px; width: 20%;"> Back </a>
</form>

@endsection
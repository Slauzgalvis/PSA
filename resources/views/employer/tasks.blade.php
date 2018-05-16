@extends('layouts.app')
@section('content')
<div class="container">
    <a class="btn btn-success" href="/home/create/test">Create Test</a>
        @if($tasks->count())
            <table style="text-align: center; width:100%; border-style: solid; background-color:white">
            <tr>
                <th>Task Name</th>
               <th>Created</th>
               <th>Actions</th>
            </tr>
        @foreach ($tasks as $task)
    <tr style=" border-style: solid; border-width: 0.5px">
        <td> {{$task->test_name}}</td>
        <td> {{$task->created_at}}</td>
         <td> 
             <a onclick="return confirm_alert(this);" href="/home/tasks/delete/{{$task->id}}" class="btn btn-danger"> Delete</a>
             <a class="btn btn-warning" href="/home/tasks/{{$task->id}}">Edit</a> 
         </td>
    </tr>
        @endforeach
        </table>
        @else
        <p> No tests </p>
        @endif

<a href="/home/" class="btn btn-primary" style="margin-top:10px; width: 20%;"> Back </a>
<script type="text/javascript">
     function confirm_alert(node) {
    return confirm("Do you want to delete this task?");
  }
</script>
@endsection

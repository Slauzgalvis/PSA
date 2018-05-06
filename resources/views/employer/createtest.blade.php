@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">

</div>

<div class="container">
    
     <form action="" method="post" enctype="multipart/form-data"> {{csrf_field()}}
    <div class="row" style="background-color:#F5F3EE;border-radius:5px">

        <div class="col-md-12" style="margin-top:5px">
                <h1 style="text-align:center;font-weight: bold;">Add Question</h1>
            </div>
             @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif           
 

<form name="add_test" id="add_test">

  <p id="">Question</p>

        <input type="text" name="testname" class="form-control" placeholder="Enter Test name" required>
        Type:<select name="type" class="type" id="q1"><option id="0" value="0">Test</option><option id="1" value="1">Task</option></select>
        <input type="submit" class="addansw" id="submit" value="Create"/>
      


</form>

@endsection
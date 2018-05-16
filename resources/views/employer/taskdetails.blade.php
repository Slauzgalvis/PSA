@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row" style="background-color:#eaedf2;border-radius:5px">
                 <form action="" method="post" enctype="multipart/form-data"> {{csrf_field()}}
                   <input class="edit" type="hidden" name="id" value={{$task->id}}><br>
                  <label> Enter description for task </label><br>
                  <textarea name="taskname" style="width: 300px"> {{$task->test_name}} </textarea>



                 <button type="submit" value="add" class="btn btn-success" style="width:30%;margin-bottom:5px;">Save</button></div>
            </form>

              
          <a href="/home" class="btn btn-primary" style="margin-top:10px; width: 20%;"> Back </a>
      </div>
    </div>
@endsection
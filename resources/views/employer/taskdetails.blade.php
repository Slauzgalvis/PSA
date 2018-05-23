@extends('layouts.app')

@section('content')

<div class="container" style="text-align: center; background-color: white">
  
                 <form action="" method="post" enctype="multipart/form-data"> {{csrf_field()}}
                   <input class="edit" type="hidden" name="id" value={{$task->id}}><br>
                  <label> Enter description for task </label><br>
                  <textarea name="taskname" style="width: 300px"> {{$task->test_name}} </textarea><br>



                 <button type="submit" value="add" class="btn btn-success" style="width:30%;margin-bottom:5px;">Save</button>
            </form>

              
          <a href="/home" class="btn btn-primary" style="margin-top:10px; width: 20%;"> Back </a>
        </div><br>
      </div>
    </div>
@endsection
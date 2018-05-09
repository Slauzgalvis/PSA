@extends('layouts.app')
@section('content')


Assigning tests for user: <a href="/home/workad/{{$user->id}}/profile/{{$user->id}}" class=""> {{$user->name}}</a>
 <form action="" method="post" enctype="multipart/form-data"> {{csrf_field()}}
     <input type="hidden" name="uid" value="{{$user->id}}">
<div style="text-align: center" class="technologies">Assigned tests
 <select id='select2' name='tests[]' multiple style='float:left;width:100%;' required>
        @foreach ($tests as $test)
        <option value='{{$test->id}}'>{{$test->test_name}}</option>
        @endforeach
    </select>
</div>
 <button type="submit" value="add" class="btn btn-success" style="width:30%;margin-bottom:5px;">Assign</button></div>
            </form>
@endsection
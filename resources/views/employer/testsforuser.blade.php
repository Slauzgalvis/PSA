@extends('layouts.app')
@section('content')

<div class="container" style="text-align: center;">
<strong>Assigning tests for user: <a href="/home/workad/{{$user->id}}/profile/{{$user->id}}" class=""> {{$user->name}}</a></strong>
 <form action="" method="post" enctype="multipart/form-data"> {{csrf_field()}}
     <input type="hidden" name="uid" value="{{$user->id}}">
<div style="text-align: center" class="technologies">Assigned tests
 <select id='select2' name='tests[]' multiple style='float:left;width:100%;' required>
        @foreach ($tests as $test)
        <option value='{{$test->id}}'>{{$test->test_name}}</option>
        @endforeach
    </select>
</div>
<div style="text-align: center;">
 <button type="submit" value="add" class="btn btn-success" style="width:30%;margin-bottom:5px;">Assign</button><br>
 <a href="/home/applicants" class="btn btn-primary" style="margin-top:10px; width: 20%;"> Back </a>
</div>
            </form>
        </div>
@endsection
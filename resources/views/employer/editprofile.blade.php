@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

<h2> Edit workad </h2> <br>
<form action="" method="post">
    {{csrf_field()}}
     <input class="edit" type="hidden" name="id" value={{$user->id}}><br>
     Name :<input class="edit" type="text" name="name" value={{$user->name}}><br>
     City : <input class="edit" type="text" name="email"  value={{$user->email}}>
     <button type="submit" value="add" class="btn btn-warning float-right">edit</button>
</form>
<a href="{{ URL::previous() }}" class="btn btn-primary"> Back </a>
   

    </div>
</div>
@endsection
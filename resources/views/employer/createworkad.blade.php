@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

<h2> create workad </h2>
<form action="" method="post">
    {{csrf_field()}}
     Name : <input class="edit" type="text" name="name">
     About : <textarea class="edit" type="text" name="about"> </textarea>
     City : <input class="edit" type="text" name="city">
     Technologies : <input class="edit" type="text" name="technologies">

     <button class="float-right btn btn-success" type="submit" value="add" name="btn">add</button>
</form>
   <a class="btn btn-primary" href="{{ URL::previous() }}"> Back </a>

    </div>
</div>
@endsection

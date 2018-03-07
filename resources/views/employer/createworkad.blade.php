@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

<h2> create workad </h2>
<form action="" method="post">
    {{csrf_field()}}
     Name : <input type="text" name="name"><br>
     About : <input type="text" name="about"><br>
     City : <input type="text" name="city"><br>
     Technologies : <input type="text" name="technologies"><br>

     <button type="submit" value="add" name="btn">add</button>
</form>
   <a href="{{ URL::previous() }}"> Back </a>

    </div>
</div>
@endsection

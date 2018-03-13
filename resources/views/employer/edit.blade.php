@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

<h2> Edit workad </h2> <br>
<form action="" method="POST">
    {{csrf_field()}}
     <input class="edit" type="hidden" name="id" value={{$workAd->id}}><br>
     Name :<input class="edit" type="text" name="name" value={{$workAd->name}}><br>
     About :<textarea class="edit" type="text" name="about"> {{$workAd->about}}</textarea>
     City : <input class="edit" type="text" name="city"  value={{$workAd->city}}>
     Technologies :<input class="edit" type="text" name="technologies"  value={{$workAd->technologies}}>
     <button type="submit" value="add" class="btn btn-warning float-right">edit</button>
</form>
 <a href="{{ URL::previous() }}" class="btn btn-primary"> Back </a>
<br>
   

    </div>
</div>
@endsection
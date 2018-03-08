@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

<h2> edit workad </h2>
<form action="" method="post">
    {{csrf_field()}}
     <input type="hidden" name="id" value={{$workAd->id}}><br>
     Name : <input type="text" name="name" value={{$workAd->name}}><br>
     About : <input type="text" name="about"  value={{$workAd->about}}><br>
     City : <input type="text" name="city"  value={{$workAd->city}}><br>
     Technologies : <input type="text" name="technologies"  value={{$workAd->technologies}}><br>

     <button type="submit" value="add" name="btn">add</button>
</form>
   <a href="{{ URL::previous() }}"> Back </a>

    </div>
</div>
@endsection
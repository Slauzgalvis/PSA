@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">

</div>

<div class="container">
    
     <form action="" method="post" enctype="multipart/form-data"> {{csrf_field()}}
    <div class="row" style="background-color:#F5F3EE;border-radius:5px">
        <div class="col-md-12" style="margin-top:5px">
                <h1 style="text-align:center;font-weight: bold;">Create Work Ad</h1>
            </div>
                <div class="col-md-12" style="margin-top:5px">

                
                Name : <input class="edit" type="text" name="name">
                About : <textarea class="edit" type="text" name="about"> </textarea>
                City : <input class="edit" type="text" name="city">
                Technologies : <input class="edit" type="text" name="technologies">
                </div>
                  
                
                <div class="col-md-12" style="margin-top:5px;text-align: center">   
                <button type="submit" value="add" class="btn btn-success" style="width:30%;margin-bottom:5px;">Create</button></div>
            </form>
 
         </div>
         <div style="text-align:center;">
            
          <a href="/home" class="btn btn-primary" style="margin-top:10px; width: 20%;"> Back </a> 
      </div>
@endsection

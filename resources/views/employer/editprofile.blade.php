@extends('layouts.app')

@section('content')

  
<div class="container">
     <h1 style="text-align:center">Edit Company Profile</h1>
     <form action="" method="post" enctype="multipart/form-data"> {{csrf_field()}}
    <div class="row" style="background-color:#eaedf2;border-radius:5px">
               
    			<div class="col-md-8">

    				Company Name :<input class="edit" type="text" name="name" value={{$user->name}}>
    				Email : <input class="edit" type="email" name="email"  value={{$user->email}}>
    				Web-page: <input class="edit" type="text" name="webpage"  value={{$user->webpage}}>
    				Phone: <input class="edit" type="text" name="phone"  value={{$user->phone}}>
    				About: <textarea class="edit" name="about"></textarea>
    			</div>
                  
                <div class="col-md-3" style="margin:10px;text-align: center">
                    <img src="/uploads/avatars/{{ $user->avatar }}" style="width:200px; height:150px; margin-right:25px;">
                    <input style="text-align:center" type="file" name="avatar" value="avatar">
                </div>        

 
         </div>
         <div style="text-align:center">
 			<button type="submit" value="add" class="btn btn-warning float-right">Save</button>
         	</form>
          <a href="/home" class="btn btn-primary" style="margin-top:10px; width: 20%;"> Back </a> 
      </div>




@endsection
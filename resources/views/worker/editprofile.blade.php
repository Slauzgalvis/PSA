@extends('layouts.app')

@section('content')

  
<div class="container">
    
     <form action="" method="post" enctype="multipart/form-data"> {{csrf_field()}}
    <div class="row" style="background-color:#F5F3EE;border-radius:5px">
        <div class="col-md-12" style="margin-top:5px">
                <h1 style="text-align:center;font-weight: bold;">Edit Worker Profile</h1>
            </div>
            @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    			<div class="col-md-9" style="margin-top:5px">

    				First name* :<input class="edit" type="text" name="firstname" value="{{$user->firstname}}" required>
                    Last name* :<input class="edit" type="text" name="lastname" value="{{$user->lastname}}" required>
                    Qualification :<input class="edit" type="text" name="qualification" value={{$user->qualification}}>
                    Expierience :<input class="edit" type="text" name="expierience" value={{$user->expierience}}>

                    GitHub :<input class="edit" type="text" name="github" value={{$user->GitHub}}>
    				Phone: <input class="edit" type="number" name="phone"  value={{$user->phone}}>
    				About: <textarea class="edit" name="about" style="resize:none" maxlength="600">{{$user->about}}</textarea>
    			</div>
                  
                <div class="col-md-3" style="text-align: center;margin-top:30px;position: relative;" >
                    <img src="/uploads/avatars/{{ $user->avatar }}" style="width:100%; height:250px;" id="image">
                    <input style="visibility:hidden;position:absolute" type="file" id="avatar" name="avatar" value="avatar" accept="image/*">

                    <span class="btn" style="margin-top:10px;background-color:#7D1935;color:white" id="avatarspan" >Upload Image</span>
                    
                </div>
                  
                <div class="col-md-12" style="margin-top:5px;text-align: center">   
                <button type="submit" value="add" class="btn btn-success" style="width:30%;margin-bottom:5px;">Save</button></div>
            </form>
 
         </div>
         <div style="text-align:center;">
            <a href="/home/delete/profile/{{$user->id}}" class="btn btn-primary" style="margin-top:10px; width: 20%;"> Delete Profile </a> 
          <a href="/home" class="btn btn-primary" style="margin-top:10px; width: 20%;"> Back </a> 
      </div>

<script>

$( "body" ).on('click','#avatarspan', function() {
    $('#avatar').click();
});
$("body").on('change','#avatar',function () {
   if (this.files && this.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#image').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        }  
});
</script>


@endsection
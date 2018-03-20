@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

</div>

<div class="container">
    
     <form action="" method="post" enctype="multipart/form-data"> {{csrf_field()}}
    <div class="row" style="background-color:#F5F3EE;border-radius:5px">
        <div class="col-md-12" style="margin-top:5px">
                <h1 style="text-align:center;font-weight: bold;">Edit Work Ad</h1>
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
                <div class="col-md-12" style="margin-top:5px">

                    <input class="edit" type="hidden" name="id" value={{$workAd->id}}><br>
                 Name* :<input class="edit" type="text" name="name" value={{$workAd->name}} required><br>
                 City : <select style="margin-bottom: 25px" name="city">
                 @foreach ($cities as $city)
        <option value='{{$city}}'>{{$city}}</option>
        @endforeach
</select> <br>
                 About: <textarea class="edit" name="about" style="resize:none" maxlength="600">{{$workAd->about}}</textarea>
                       
                
<div style="text-align: center" class="technologies">Technologies
    <select id='select1' name='technologies[]' multiple style='float:left;width:100%;'>
        @foreach ($technologies as $technology)
        <option value='{{$technology}}'>{{$technology}}</option>
        @endforeach
    </select>
</div>
</div>


                
                <div class="col-md-12" style="margin-top:5px;text-align: center">   
                <button type="submit" value="add" class="btn btn-success" style="width:30%;margin-bottom:5px;">Save</button></div>
            </form>
 
         </div>
         <div style="text-align:center;">
            
          <a href="/home" class="btn btn-primary" style="margin-top:10px; width: 20%;"> Back </a> 
      </div>
<script>
    
@foreach ($selectedTechnologies as $technology)
      $('#select1').find('option[value="'+ "{{ $technology }}" +'"]').attr('Selected', 'Selected')    
@endforeach

</script>
@endsection
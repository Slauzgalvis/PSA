@extends('layouts.app')

@section('content')

<div class="container">
     <h1 style="text-align:center">Company: {{$company->name}}</h1>
    <div class="row" style="background-color:#eaedf2;border-radius:5px">
               
                
                <div class="col-md-3" style="margin:10px">
                    <img src="/uploads/avatars/{{ $company->avatar }}" style="width:200px; height:150px; margin-right:25px;">
                </div>

               <div class="col-md-7" style="margin:10px">
                
                <label>Email:</label>
                <a href="mailto:{{$company->email}}">{{$company->email}} </a><br>
                <label>Web-page:</label>
                <a href="https:{{$company->webpage}}">{{$company->webpage}}</a><br>
                <label>Phone:</label>
                 <a href="tel:{{$company->phone}}">{{$company->phone}}</a><br>
                <p>About:{{ $company->about }}</p>
            </div>

 
         </div>
         <div style="text-align:center">
          <a href="/home" class="btn btn-primary" style="margin-top:10px; width: 20%;"> Back </a>
          <a class="btn btn-warning" style="margin-top:10px; width: 20%;" href="{{ route('editProfile') }}">Edit</a>
      </div>
      

@endsection
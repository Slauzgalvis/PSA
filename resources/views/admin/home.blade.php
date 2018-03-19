@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            
        </div>
<div class="col-md-8">
        @foreach ($users as $user)
    
         
          
                 {{$user->name}} {{ $user->email }}

              
                    <a href="/home/delete/profile/{{$user->id}}" class="btn btn-primary" style="margin-top:10px; width: 20%;"> Delete Profile </a> <br>

           @endforeach
           {{ $users->links() }}
       </div>



    </div>


</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

         @foreach ($users as $user)
         @if($user->role == "worker")
         {{ $user->email }} 
         <p class="float-right">{{$user->role}}
          <a href="/home/delete/profile/{{$user->id}}" class="btn btn-primary" 
            style=""> Delete Profile</a>
            <a href="/home/delete/profile/{{$user->id}}" class="btn btn-primary" 
                style=""> Edit</a> </p>

                <br>
                <br>    
                @endif
                @endforeach

                @foreach ($users as $user)
                @if($user->role == "employer")
                {{ $user->email }} 
                <p class="float-right">{{$user->role}}
                  <a href="/home/delete/profile/{{$user->id}}" class="btn btn-primary" 
                    style=""> Delete Profile</a>
                    <a href="/home/edit/profile/employer" class="btn btn-primary" 
                        style="" name="user_id" value="{{$user}}"> Edit</a> </p>



                        <br>


                        @foreach($ads as $ad)
                        @if($user->id == $ad->user_id)
                        work ads:<br>

                        {{$ad->id}} 
                        {{ $ad->name }} 
                        <br>
                        @endif
                        @endforeach


                        <br>    
                        @endif
                        @endforeach

                    </div>



                    {{ $users->links() }}


                </div>


            </div>
            @endsection

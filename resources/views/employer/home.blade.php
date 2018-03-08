@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in as employer
                      <a href="/home/create/workad">Create New </a>
                </div>
            </div>
        </div>
       @if (count($ads) > 0)
  @foreach ($ads as $ad)
    
         <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{$ad->name}}</div>
                 <a href="/home/workad/{{$ad->id}}"> {{$ad->name}} </a>

                <div class="card-body">

                     {{ $ad }}
                    
                  
                  <a href="/home/edit/workad/{{$ad->id}}">edit</a>
                  <a href="/home/delete/workad/{{$ad->id}}">delete</a>

                </div>
            </div>
        </div>
           @endforeach
           @endif

    </div>
</div>
@endsection


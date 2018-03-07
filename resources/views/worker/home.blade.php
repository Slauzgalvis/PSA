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

                    You are logged in as worker
                </div>
            </div>
        </div>
        @foreach ($ads as $ad)
    
         <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{$ad->name}}</div>
                 <a href="/home/workad/{{$ad->id}}"> {{$ad->name}} </a>

                <div class="card-body">

                     {{ $ad }}
                     <a href="/home/company/{{$ad->user_id}}"> {{$ad->name}} </a>
                  

                </div>
            </div>
        </div>
           @endforeach
    </div>
</div>
@endsection

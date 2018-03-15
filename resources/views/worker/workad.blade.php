@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
    
         <div class="col-md-8">
            <div class="card">
                <div class="card-header company">{{$workAd->name}}</div>

                <div class="card-body">
                    Company: <a href="/home/company/{{$user->id}}">{{$user->name}}</a>
                    <br><br>
                     {{ $workAd->about }}
                     <br><br>
                     City: {{$workAd->city}}
                     <br><br>
                     Technologies:  {{$workAd->technologies}}
                     <br><br>
                     
                  

                </div>
            </div>
            <a href="{{ URL::previous() }}" class="btn btn-primary"> Back </a>
        </div>
    </div>
</div>


@endsection
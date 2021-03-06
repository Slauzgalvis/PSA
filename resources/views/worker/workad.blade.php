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
                @if(Auth::user()->role == 'employer')
            <p style="font-weight: bold; font-size: 20px">Applicants:<p>
            @foreach($applications as $application)
            @if($workAd->id == $application->workAd->id)
            <li><a href="/home/workad/{{$workAd->id}}/profile/{{$application->id}}" class=""> {{$application->user->name}}</a></li>
           
            @endif
            @endforeach
            @endif
                <?php $check = 0 ?>
            @foreach($applications as $application)
            @if($application->worker_id == Auth::user()->id and $application->ad_id == $workAd->id and Auth::user()->role == 'worker')
                <center><a href="/home/workad/{{ $workAd->id }}/cancel" class="btn btn-danger">Cancel Application </a></center>
                <?php $check = 1 ?>
            @endif
            @endforeach

            @if(($applications->isEmpty() or $check==0) and Auth::user()->role == 'worker')
            
            <center><a href="/home/workad/{{ $workAd->id }}/apply/{{ Auth::user()->id }}" class="btn btn-success"> Apply </a></center>
            @endif

            </div>


            
        </div>
        <a href="{{ route('home') }}" class="btn btn-primary"> Back </a>
        
    </div>
</div>
</div>


@endsection
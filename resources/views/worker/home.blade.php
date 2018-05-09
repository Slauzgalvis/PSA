@extends('layouts.app')

@section('content')

<div class="container">

    
<br>

<div class="row justify-content-center" style="">

<div class="col-md-10" style="margin-bottom: 5px">
<div class="card">
<div class="card-header" style="text-align: center; font-weight: bold">Work Ad Applications</div>
<div class="card-body">
@if (session('status'))
<div class="alert alert-success">
{{ session('status') }}
</div>
@endif
@foreach ($applications as $application)
Applied for <a href="/home/workad/{{$application->workAd->id}}">{{$application->workAd->name}}</a>
in company: <a href="/home/company/{{$application->workAd->user_id}}"> {{$application->workAd->user->name}} </a> 
<a href="/home/workad/{{ $application->ad_id }}/cancel" class="btn btn-danger float-right">Cancel Application </a> <br><br>
@endforeach

</div></div></div>
<a href="/home/mytests/" class="btn btn-danger float-right">Tests </a> <br><br>
<div class="col-md-10" style="">
    <!-- Search bar --><br>
    <div class="row" style="text-align: center;">
    <div class="col-md-12">
    <form action="" method="get" enctype="multipart/form-data"> {{csrf_field()}}
    <input type="text" name="search" value="{{ $keyword }}" placeholder="Start typing to search" style="width:40%;">
    <button type="submit" class="btn btn-success" style="width:15%;">Search</button>
    </form></div></div> <br>
     <!-- Search bar -->

        @foreach ($ads as $ad)
    
            <div class="card" style="margin-bottom: 5px">
                <div class="card-header"></div>
                <div class="company">{{$ad->name}} </div>

                <div class="card-body">
                    <p class="max-lines">{{ $ad->about }}</p>
                     
                    <br>
                    <div style="text-align: right">
                        <a href="/home/workad/{{$ad->id}}" class="btn btn-info">view</a>
                        <a href="/home/company/{{$ad->user_id}}" class="btn btn-info"> about company </a>
                    </div>
                     
                </div>
            </div>

           @endforeach
          <div class="col-md-10" style="text-align:center" >
            {{ $ads->links() }}
</div>

       </div>

    </div>

</div>



@endsection

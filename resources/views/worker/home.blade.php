@extends('layouts.app')

@section('content')

<div class="container">

    <!-- Search bar -->
    <div class="row" style="text-align: center;">
    <div class="col-md-12">
    <form action="" method="get" enctype="multipart/form-data"> {{csrf_field()}}
    <input type="text" name="search" value="{{ $keyword }}" placeholder="Start typing to search" style="width:40%;">
    <button type="submit" class="btn btn-success" style="width:15%;">Search</button>
    </form></div></div>
     <!-- Search bar -->
<br>

<div class="row justify-content-center" style="">

<div class="col-md-10" style="margin-bottom: 5px">
<div class="card">
<div class="card-header" style="text-align: center">Worker Window</div>
<div class="card-body">
@if (session('status'))
<div class="alert alert-success">
{{ session('status') }}
</div>
@endif
All Work Ads
</div></div></div>

<div class="col-md-10" style="">
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

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Worker Window</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    All Work Ads
                </div>
            </div>
        </div>
<div class="col-md-8">
        @foreach ($ads as $ad)
    
         
            <div class="card">
                <div class="card-header"></div>
                <div class="company">
                 {{$ad->name}}
             </div>

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
           {{ $ads->links() }}
       </div>


    </div>

</div>
@endsection

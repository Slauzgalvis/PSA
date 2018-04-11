@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center" style="">

<div class="col-md-10" style="margin-bottom: 5px">
<div class="card">
<div class="card-header" style="text-align: center">Admin Window</div>
<div class="card-body">
<a class="nav-link" href="{{ route('adminAds') }}">Work Adds</a></li>
<a class="nav-link" href="{{ route('adminCompanies') }}">Companies</a></li>
<a class="nav-link" href="{{ route('adminWorkers') }}">Workers</a></li>
@if (session('status'))
<div class="alert alert-success">
{{ session('status') }}
</div>
@endif
</div></div></div>
 
@endsection

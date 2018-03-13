@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
    
         <div class="col-md-8">
            <div class="card">
                <div class="card-header">Company: {{$company->name}}</div>

                <div class="card-body">
                About company:
                <br><br><br>
                Email: {{$company->email}}
                <br><br><br>
         </div>
           <a class="btn btn-warning float-right" href="{{ route('editProfile') }}">Edit Profile </a>
            </div>
            <a href="/home" class="btn btn-primary"> Back </a>

        </div>
    </div>
</div>
@endsection
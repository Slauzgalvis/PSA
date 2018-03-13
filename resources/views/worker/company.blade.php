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
                Companies ads:
                <ul>
                 @foreach ($ads as $ad)
                 <li><a class="company" href="/home/workad/{{$ad->id}}"> {{$ad->name}} </a>  </li>

                 @endforeach
             </ul>
         </div>
            </div>
            <a href="/home" class="btn btn-primary"> Back </a>

        </div>
    </div>
</div>
@endsection
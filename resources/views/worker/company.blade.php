@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
    
         <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{$company->name}}</div>

                <div class="card-body">

                     {{ $company->name }}
                </div>
                Companies ads:
                <ul>
                 @foreach ($ads as $ad)
                 <li> {{$ad}} </li>

                 @endforeach
             </ul>
            </div>
        </div>
    </div>
</div>
@endsection
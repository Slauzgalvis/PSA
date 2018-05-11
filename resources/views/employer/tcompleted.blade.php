@extends('layouts.app')
@section('content')
<div class="container">
       
            <table style="text-align: center; width:100%; border-style: solid; background-color:white">
            <tr>
               <th>Test</th>
               <th>Assigned</th>
               <th>Completed</th>
               <th>Applicant</th>
               <th>%</th>
               <th>Actions</th>
            </tr>
        @foreach ($results as $result)
    <tr style=" border-style: solid; border-width: 0.5px">
        <td> {{$result->test->id}}</td>
        <td> {{$result->created_at}}</td>
        <td> {{$result->updated_at}}</td>
        <td> {{$result->user->name}}</td>
        <td> @if($result->result >0 || $result->max >0) {{(abs($result->result)/$result->max)*100}} % 
                @else
                 0 %
               @endif
               </td>

         <td> 
             
             <a class="btn btn-primary" href="/home/results/{{$result->id}}">Details</a> 
         </td>
    </tr>
        @endforeach
        </table>

<a href="/home/" class="btn btn-primary" style="margin-top:10px; width: 20%;"> Back </a>

@endsection

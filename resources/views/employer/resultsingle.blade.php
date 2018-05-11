@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center" style="text-align: center">

 <table style="text-align: center; width:100%; border-style: solid; background-color:white">
            <tr>
               <th>User</th>
               <th>Test</th>
               <th>Completed</th>
               <th>Score</th>
               <th>Max</th>
               <th>%</th>
            </tr>
            <tr>
               <td>{{$result->user->name}}</a></td>
               <td><a href="/home/tests/{{$result->test->id}}">{{$result->test->test_name}}</a></td>
               <td>{{$result->updated_at}}</td>
               <td>{{$result->result}}</td>
               <td>{{$result->max}}</td>

              <td> @if($result->result >0 || $result->max >0) {{(abs($result->result)/$result->max)*100}} % 
              	@else
                 0 %
           	   @endif
           	   </td>


            </tr>
        </table>

<div class="container">
    
 <table rules=rows style="text-align: center; width:100%; border-style: solid; background-color:white;">
            <tr>
                <th>Type</th>
                <th>Question</th>
                <th>Answers</th>
                <th>Points</th>
            </tr>
@foreach($questions as $question)
<tr>
	<td> @if($question->type==0) Open @else Choise @endif</td>
    <td><strong>{{$question->question}}</strong></td>
    <td>@if($question->type == 0){{$result->answers[$question->id]}} @else
      @for ($i = 0; $i < count($question->answers); $i++)
      <p class="@if($question->correct[$i] !=0 )col2 @else col0 @endif">{{$question->answers[$i]}}</i><br></p>  
      @endfor
     @endif </td>
     <td>@if($question->type == 0)- @else
      @for ($i = 0; $i < count($question->answers); $i++)
      <p class="col{{$array[$question->id][$i]+1}}">{{$array[$question->id][$i]}}<br></p>  
      @endfor
     @endif </td>
<tr>
@endforeach
</table>
   <a href="/home/results/" class="btn btn-primary" style="margin-top:10px; width: 40%;"> Back </a>

@endsection
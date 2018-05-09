@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">

</div>

<div class="container">
    

<form name="do_test" id="do_test" method="post">
  <input name="_token" type="hidden" value="{{ csrf_token() }}">
  <input name="testid" type="hidden" value="{{$result->id}}">
  <input name="q" type="hidden" value="1">

     @foreach($questions as $question)
    <p><strong>{{$question->question}}</strong></p>
      @if($question->type == 0)
      <input type="text" name="answers[]" class="form-control" placeholder="Enter Answer" required>
      @else
       @for ($i = 0; $i < count($question->answers); $i++)
      <p> {{$question->answers[$i]}} <input type="checkbox" name="answers[]" id="radioButton" value="{{$question->id . $i+1}}"></p> 
      @endfor
      @endif

     @endforeach

   
   <input type="submit" class="submit btn btn-success" id="submit" value="Save" style="margin-top:10px; width: 20%"/><br>
   <a href="/home/tests/{{$question->test->id}}" class="btn btn-primary" style="margin-top:10px; width: 20%;"> Back </a>
</form>

@endsection
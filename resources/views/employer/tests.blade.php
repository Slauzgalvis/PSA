@extends('layouts.app')
@section('content')
<div class="container">
    <a class="btn btn-success" href="/home/create/test">Create Test</a>
        @if($tests->count())
            <table style="text-align: center; width:100%; border-style: solid; background-color:white">
            <tr>
                <th>Test Name</th>
               <th>Created</th>
               <th>Actions</th>
            </tr>
        @foreach ($tests as $test)
    <tr style=" border-style: solid; border-width: 0.5px">
        <td> {{$test->test_name}}</td>
        <td> {{$test->created_at}}</td>
         <td> 
             <a onclick="return confirm_alert(this);" href="/home/tests/delete/{{$test->id}}" class="btn btn-danger"> Delete</a>
             <a class="btn btn-primary" href="/home/tests/{{$test->id}}">Details</a> 
         </td>
    </tr>
        @endforeach
        </table>
        @else
        <p> No tests </p>
        @endif

<a href="/home/" class="btn btn-primary" style="margin-top:10px; width: 20%;"> Back </a>
<script type="text/javascript">
     function confirm_alert(node) {
    return confirm("Do you want to delete this test?");
  }
</script>
@endsection

@extends('layouts.app')
@section('content')
<div class="container">
        <form action="" method="post" enctype="multipart/form-data"> {{csrf_field()}}
       <input class="edit" type="hidden" name="id" value={{$test->id}}><br>
                 Name* :<input class="edit" type="text" name="name" value={{$test->test_name}} required><br>
                 <button type="submit" value="add" class="btn btn-success" style="width:30%;margin-bottom:5px;">Save</button>
             </form>
        @if($questions->count())
            <table style="text-align: center; width:100%; border-style: solid; background-color:white">
            <tr>
               <th>Question</th>
                <th>Type</th>
               <th>Action</th>
            </tr>
        @foreach ($questions as $question)
    <tr style=" border-style: solid; border-width: 0.5px">
         <td>{{$question->question}} </td>
         @if($question->type==0)
         <td>Open</td>
         @else
         <td>Choise</td>
         @endif
         <td> Edit , 
            <a onclick="return confirm_alert(this);" href="/home/tests/edit/delete/{{$question->id}}" class="btn btn-danger"> Delete</a> Details</td>
    </tr>
        @endforeach
        </table>
        @else
        <p> No questions </p>
        @endif

<a href="/home/tests" class="btn btn-primary" style="margin-top:10px; width: 20%;"> Back </a>
<script type="text/javascript">
     function confirm_alert(node) {
    return confirm("Do you want to delete this question?");
  }
</script>
@endsection

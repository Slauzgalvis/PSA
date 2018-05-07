@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
     <form action="" method="post" enctype="multipart/form-data"> {{csrf_field()}}
       <input class="edit" type="hidden" name="id" value={{$test->id}}><br>
                 Name* :<input class="edit" type="text" name="name" value={{$test->test_name}} required><br>
                 <button type="submit" value="add" class="btn btn-success" style="width:30%;margin-bottom:5px;">Edit name and Save</button>
             </form>
    <p> Type: <strong> @if($test->type==0) Test @else Task @endif </strong></p>
    <p> Questions : </p>
     <table rules=rows style="text-align: center; width:100%; border-style: solid; background-color:white;">
            <tr>
                <th>Type</th>
                <th>Question</th>
                <th>Answers</th>
                <th>Correct answer #</th>
                <th>Actions</th>
            </tr>
    @foreach($test->questions as $question)
        <tr>
        <td> @if($question->type==0) Open @else Choise @endif</td>
        <td> {{$question->question}}</td>
        <td> @if($question->answers) @foreach($question->answers as $answer)
            {{$answer}}<br>
            @endforeach</td>
            @endif
        <td> @if($question->correct) @foreach($question->correct as $correct)
            {{$correct}}<br>
            @endforeach</td>
            @endif
            <td>
            <a href="/home/tests/question/{{$question->id}}" class="btn btn-warning" style="margin-bottom:2px"> Edit </a> <br>
            <a onclick="return confirm_alert(this);" href="/home/tests/edit/delete/{{$question->id}}" class="btn btn-danger"> Delete</a>
             </td> 
        
    </tr>
    @endforeach
    </table>
    </div>
    </div>

 
<a class="btn btn-success" href="/home/tests/{{$question->test->id}}/add">Add Question</a>
<a href="/home/tests" class="btn btn-primary" style="margin-top:10px; width: 20%;"> Back </a>
<script type="text/javascript">
     function confirm_alert(node) {
    return confirm("Do you want to delete this question?");
  }
</script>
@endsection

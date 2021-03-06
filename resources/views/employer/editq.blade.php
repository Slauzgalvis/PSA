@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">

</div>

<div class="container">
    
     <form action="" method="post" enctype="multipart/form-data"> {{csrf_field()}}
    <div class="row" style="background-color:#F5F3EE;border-radius:5px">
        <div class="col-md-12" style="margin-top:5px">
                <h1 style="text-align:center;font-weight: bold;">Add Question</h1>
                <h3> For test {{$question->test->test_name}} </h3>
            </div>
             @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif           
 

<form name="add_test" id="add_test">
  <input name="_token" type="hidden" value="{{ csrf_token() }}">
  <input name="testid" type="hidden" value="{{$question->test->id}}">
  <input name="q" type="hidden" value="1">
  <p id="">Question</p>
  <table class="table table-bordered" id="add_Q">
    <tr>
      <td>
        <input type="text" name="question" class="form-control" required value ="{{$question->question}}">
        Type:<select name="qtype" class="type" id="q1">
          
          <option id="0" value="0" @if($question->type == 0) selected @endif>Open</option>
          <option id="1" value="1" @if($question->type != 0) selected @endif>Choice</option></select>
        <input type="button" class="addansw" id="addansw" value="Add answer" @if(count($question->answers)==5 || $question->type ==0) disabled @endif/>
        <button class="rmv" name="removeQ" id="rmwans">Remove Last</button>   
    </tr>

     @for ($i = 0; $i < count($question->answers); $i++)
        <tr id="row'{{$i}}'" class="added"><td><input required type="text" name="answer[]" class="form-control q_list" value="{{$question->answers[$i]}}">
      Correct <input type="checkbox" name="iscorrect[]" value="{{$i+1}}" @if($question->correct[$i]!=0) checked @endif></td></tr>
    @endfor



  </table>
   
   <input type="submit" class="submit btn btn-success" id="submit" value="Save" style="margin-top:10px; width: 20%"/><br>
   <a href="/home/tests/{{$question->test->id}}" class="btn btn-primary" style="margin-top:10px; width: 20%;"> Back </a>
</form>



<script type="text/javascript">
$(document).ready(function(){
  var Qnow = {{count($question->answers)}}

  $(document).on('click','.rmv',function(e){
    e.preventDefault();
    
    $("#row"+Qnow+"").remove();
    if(Qnow==1){
    $(this).prop('disabled',true);
    }
    Qnow--;  
    $('#addansw').prop('disabled',false);
  })
  
  $(document).on('change','.type',function(){
    if($(this).find(":selected").attr('id') != 0){

        $(this).next().prop('disabled',false);
      
      $('.added').show();
    }
    else{
       Qnow = 0;
       $('.added').remove();
       $('#addansw').prop('disabled',true);
       $('#rmwans').prop('disabled',true);
    }
  })

    $(document).on('click','.addansw',function(){
      $('#rmwans').prop('disabled',false);
      Qnow++;
      $(this).parent().parent().parent().append('<tr id="row'+Qnow+'" class="added"><td><input required type="text" name="answer[]" class="form-control q_list" placeholder="Answer #'+Qnow+'">Correct <input type="checkbox" name="iscorrect[]" value="'+Qnow+'"></td></tr>');
      if(Qnow==5){
         $(this).prop('disabled',true);
       }

    });

});

</script>
@endsection

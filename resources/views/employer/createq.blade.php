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
                <h3> For test {{$test->test_name}} </h3>
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
  <input name="testid" type="hidden" value="{{$test->id}}">
  <input name="q" type="hidden" value="1">
  <div>
  <p id="">Question</p>
  @if(count($errmsg)>0)
  @foreach($errmsg as $err)
  <p style="color:red;"> ERROR : {{$err}} </p>
  @endforeach
  @endif
</div>
  <table class="table table-bordered" id="add_Q">
    <tr>
      <td>
        <input type="text" name="question" class="form-control" placeholder="Enter Question" required>
        Type:<select name="qtype" class="type" id="q1"><option id="0" value="0">Open</option><option id="1" value="1">Choice</option></select>
        <input type="button" class="addansw" id="addansw" value="Add answer" disabled/>
        <button class="rmv" name="removeQ" id="rmwans">Remove Last</button>
      
    </tr>

  </table>
   
   <input type="submit" class="submit" id="submit" value="Add question"/>
   <a href="/home/tests/{{$test->id}}" class="btn btn-primary" style="margin-top:10px; width: 20%;"> Finish </a>
</form>



<script type="text/javascript">
$(document).ready(function(){
  var Qnow = 0;

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

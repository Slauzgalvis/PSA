@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Employer Window</div>

        <div class="card-body">
          @if (session('status'))
          <div class="alert alert-success">
            {{ session('status') }}
          </div>
          @endif
          <a class="btn btn-success" href="/home/create/workad">Create Ad</a>
        </div>
      </div>
    </div>
    @if($ads->count())
    @foreach ($ads as $ad)
    
    <div class="col-md-8">
      <div class="card">
        <div class="card-header"></div>
        <div class="company">  {{$ad->name}} </div>

        <div class="card-body">

         <p class="max-lines"> {{ $ad->about }} </p>
         
         <br>
         <div style="text-align: right">
          <a href="/home/workad/{{$ad->id}}" class="btn btn-info">view</a>
          <a href="/home/edit/workad/{{$ad->id}}" class="btn btn-warning">edit</a>
          <a onclick="return confirm_alert(this);" href="/home/delete/workad/{{$ad->id}}"  class="btn btn-danger">delete</a>  
        </div>
        
        <br>
        

      </div>
    </div>
  </div>
  @endforeach
  @endif

</div>
</div>

<script type="text/javascript">
  function confirm_alert(node) {
    return confirm("Do you want to delete this work ad?");
  }
</script>
@endsection


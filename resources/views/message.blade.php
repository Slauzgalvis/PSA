@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
<div class="col-md-2" style="background-color:white; text-align: center">
	<br>
@foreach($users as $user)
<a href="/sendMessage/chat/{{ $user->id }}" id="{{$user->id}}">{{$user->name}}</a><br><br>
@endforeach
</div>
		<div class="col-md-8">
			<div class="card">
				<div class="card-header company"></div>

				<div class="card-body">

					<h1 id="username">{{$user1->name}}</h1> <br>
<nav class="chat" >
	<ul id="chatbox">
					@foreach($chats as $chat)
					
					@if($user1->id == $chat->to)
					<li><p style="background-color:powderblue; margin-bottom: -20px;">{{$chat->created_at}} :{{$chat->message}}</p></li><br>
					@elseif($user1->id == $chat->from)
					<li><p style="background-color:salmon; margin-bottom: -20px;">{{$chat->created_at}} :{{$chat->message}}</p></li><br>
					@endif

					@endforeach
				</ul>
				</nav>
					<form action="{{route('message')}}" method="post"> {{csrf_field()}}
            <input type="hidden" name="from" value="{{Auth::user()->id}}">
            <input type="hidden" name="to" value="{{$user1->id}}">
            Message:
            <input type="text" name="msg"  />
            <button type="submit" >Send</button>
            </form>
					


				</div> 
			</div>
			<a href="{{ route('home') }}" class="btn btn-primary"> Back </a>

		</div>
	</div>
</div>
<script>

</script>

@endsection
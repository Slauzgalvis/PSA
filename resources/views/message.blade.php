@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">

		<div class="col-md-8">
			<div class="card">
				<div class="card-header company"></div>

				<div class="card-body">

					@foreach($users as $user)
					<h1>{{$user->name}}</h1> <br>
					@foreach($chats as $chat)

					@if($user->id == $chat->to)
					<p style="background-color:powderblue; margin-bottom: -20px;">{{$chat->created_at}} :{{$chat->message}}</p><br>
					@elseif($user->id == $chat->from)
					<p style="background-color:salmon; margin-bottom: -20px;">{{$chat->created_at}} :{{$chat->message}}</p><br>
					@endif

					@endforeach
					<form action="{{route('message')}}" method="post"> {{csrf_field()}}
            <input type="hidden" name="from" value="{{Auth::user()->id}}">
            <input type="hidden" name="to" value="{{$user->id}}">
            Message:
            <input type="text" name="msg"  />
            <button type="submit" >Send</button>
            </form>
					@endforeach


				</div> 
			</div>
			<a href="{{ route('home') }}" class="btn btn-primary"> Back </a>

		</div>
	</div>
</div>


@endsection
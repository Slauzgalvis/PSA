@extends('layouts.app')

@section('content')
<!--
					
				</ul>
				</nav>
					<form action="{{route('message')}}" method="post"> {{csrf_field()}}
            
            Message:
            <input type="text" id="messagefield" name="msg"  />
            <button id="sendmsg" type="submit" >Send</button>
            </form>
					


				</div> 
			</div>
			<a href="{{ route('home') }}" class="btn btn-primary"> Back </a>

		</div>
	</div>
</div>-->
<div class="row justify-content-center" >
<div class="col-md-9" style="padding-right: 0">
<div class="panel panel-primary" style="border:0px">
                <div class="panel-heading top-bar">
                    <div class="col-md-8 col-xs-8">
                        <h3 class="panel-title"><span class="glyphicon glyphicon-comment" style="margin-right:6px;"></span>Chat with {{$user1->name}}</h3>
                    </div>
                </div>


                <div class="panel-body msg_container_base" style="height:400px;max-height: 400px;">
                	@foreach($chats as $chat)
					
					@if($user1->id == $chat->to)
					<div class="row msg_container base_sent" >
                        <div class="col-md-10 col-xs-10" >
                            <div class="messages msg_sent" style="padding-bottom: 0">
                                <p>{{$chat->message}}<br><small>{{$chat->created_at}}</small></p>

                            </div>
                        </div>
                    </div>
					@elseif($user1->id == $chat->from)
					<div class="row msg_container base_receive">
                        <div class="col-md-10 col-xs-10">
                            <div class="messages msg_receive">
                                 <p>{{$chat->message}}<br><small>{{$chat->created_at}}</small></p>
                            </div>
                        </div>
                    </div>
					@endif
					@endforeach             
				 <chat_log></chat_log>
                </div>

                <!--CHAT USER BOX-->
                <div class="panel-footer">
                    <div class="input-group" id="myForm">
                        <input id="btn-input" type="text" class="form-control input-sm chat_input" placeholder="Write your message here...">
                        
                        <span class="input-group-btn">
                        <button class="btn btn-primary btn-sm" id="submit" type="submit">Send</button>
                        </span>
                    </form>
                    </div>
                </div>
            </div>
        </div>
<div class="col-md-2" style="padding-left: 0">
	 <div class="panel-heading top-bar">
                    <div class="col-md-8 col-xs-8">
                        <h3 class="panel-title"><span class="glyphicon glyphicon-comment" style="margin-right:6px;"></span>Users</h3>
                    </div>
                </div>
                 <div class="panel-body msg_container_base" style="height:400px;max-height: 400px; border-left:1px solid #666">
                 	@if($users)
                 	@foreach($users as $user)
						<p style="border-bottom:1px solid #666;text-align: center;font-size:22px;"><a  href="/sendMessage/chat/{{ $user->id }}" id="{{$user->id}}">{{$user->name}}</a></p>
					@endforeach
					@endif
                 </div>

</div>
</div>
<script>
$(document).ready(function(){
	autoReloadMsg();
	$(".msg_container_base").stop().animate({ scrollTop: $(".msg_container_base")[0].scrollHeight}, 1);
	setInterval(function(){
		autoReloadMsg() 
	}, 1000);


$("#submit").click(function() {
	var input = $("#btn-input").val();
	$.ajax({
		url: "{{route('message')}}", //this is your uri
		type: 'POST', //this is your method
		data: 
		{
			"_token": "{{ csrf_token() }}",
			"msg": input,
			"to": "{{$user1->id}}"
		},
		success: function(response){
			clearInput();
			response.forEach(function(element)
			{
			console.log(element);
			if(element.from == {{$user1->id}})
			{
			$('chat_log').append('<div class="row msg_container base_receive"><div class="col-md-10 col-xs-10"><div class="messages msg_receive"><p>'+element.message+'<br><small>'+element.created_at+'</small></p></div></div></div>');
			}
			else{
			$('chat_log').append('<div class="row msg_container base_sent"><div class="col-md-10 col-xs-10"><div class="messages msg_sent"><p>'+element.message+'<br><small>'+element.created_at+'</small></p></div></div></div>');
			}
			$(".msg_container_base").stop().animate({ scrollTop: $(".msg_container_base")[0].scrollHeight}, 1000);});
		}	
	});            
});

function clearInput() {
    $("#myForm :input").each(function() {
        $(this).val(''); //hide form values
    });
}

$("#myForm").submit(function() {
    return false;
});

function autoReloadMsg(){
	console.log('whay');
	$.ajax({ url: "{{ route('updateMsg') }}",
		data: {
		"_token": "{{ csrf_token() }}",
		"from": "{{$user1->id}}"
		},
		type: 'POST',
		success: function(response) {
			response.forEach(function(element)
			{
			if(element.from == {{$user1->id}})
			{
			$('chat_log').append('<div class="row msg_container base_receive"><div class="col-md-10 col-xs-10"><div class="messages msg_receive"><p>'+element.message+'<br><small>'+element.created_at+'</small></p></div></div></div>');
			}
			else
			{
			$('chat_log').append('<div class="row msg_container base_sent"><div class="col-md-10 col-xs-10"><div class="messages msg_sent"><p>'+element.message+'<br><small>'+element.created_at+'</small></p></div></div></div>');
			}
			$(".msg_container_base").stop().animate({ scrollTop: $(".msg_container_base")[0].scrollHeight}, 1000);});
		}	
	});            
};

});
</script>

@endsection
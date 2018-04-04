@extends('layouts.app')
@section('content')
<div class="container">

        @if($updates->count())
            <table style="text-align: center; width:100%; border-style: solid; background-color:white">
            <tr>
                <th>Notification</th>
                <th>Actions</th>
               
            </tr>
        @foreach ($updates as $update)
    <tr style=" border-style: solid; border-width: 0.5px">
        <td> User  
            <a href="/home/workad/{{$update->workAd->id}}/profile/{{$update->user->id}}" class=""> {{$update->user->name}}</a>
            applied for your work ad 
            <a href="/home/workad/{{$update->workAd->id}}" class=""> {{$update->workad->name}}</a>
            at {{$update->created_at}}</td>
        <td>
            <form style="display:inline" action="/confirm/{{$update->id}}" method="post"> {{csrf_field()}}
            <input type="hidden" name="msg"  value="Application for {{$update->workad->name}} was accepted">
            <input type="hidden" name="from" value="{{Auth::user()->id}}">
            <input type="hidden" name="application" value="{{$update->id}}">
            <input type="hidden" name="to" value="{{$update->user->id}}">
            <button type="submit" class="btn btn-success">Accept</button>
            </form>
            <form style="display:inline" action="/decline/{{$update->id}}" method="post"> {{csrf_field()}}
            <input type="hidden" name="application" value="{{$update->id}}">
            <button type="submit" class="btn btn-danger">Decline</button>
            </form>
        </td>
    </tr>
        @endforeach
        </table>
        @else
        <p> No new notifications </p>
        @endif


</script>
@endsection

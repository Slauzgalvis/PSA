@extends('layouts.app')
@section('content')
<div class="container">
<!-- Search bar -->
    <div class="row" style="text-align: center;">
    <div class="col-md-12">
    <form action="" method="get" enctype="multipart/form-data"> {{csrf_field()}}
    <input type="text" name="search" value="{{ $keyword }}" placeholder="Start typing to search" style="width:40%;">
    <button type="submit" class="btn btn-success" style="width:15%;">Search</button>
    </form></div></div>
<!-- Search bar -->

    <div class="row justify-content-center">
<a class="nav-link" href="{{ route('adminAds') }}">Work Adds</a></li>
<a class="nav-link" href="{{ route('adminCompanies') }}">Companies</a></li>
<a class="nav-link" href="{{ route('adminWorkers') }}">Workers</a></li>
        <div class="col-md-12">
        @if($ads->count())
            <table style="text-align: center; width:100%; border-style: solid; background-color:white">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>About</th>
                <th>Created_at</th>
                <th>Company</th>
                <th>User Id</th>
                <th>Actions</th>
            </tr>
        @foreach ($ads as $ad)
    <tr style=" border-style: solid; border-width: 0.5px">
        <td>{{$ad->id}}</td>
        <td>{{$ad->name}}</td>
        <td style="display:block; max-width: 100px;overflow: hidden;white-space: nowrap;text-overflow: ellipsis;">{{$ad->about}}</td>
        <td>{{$ad->created_at}}</td>
        <td><a href="/home/company/{{$ad->user->id}}">{{$ad->user->name}}</a></td>
        <td>{{$ad->user->id}}</td>
        <td>
            <a href="/home/workad/{{$ad->id}}" class="btn btn-primary">Details</a>
            <a href="/home/edit/workad/{{$ad->id}}" class="btn btn-warning"> Edit Ad</a>
            <a onclick="return confirm_alert(this);" href="/home/delete/workad/{{$ad->id}}" class="btn btn-danger"> Delete</a>
        </td>
    </tr>
        @endforeach
        </table>
        {{ $ads->links() }}
        @else

        @endif

</div>
</div>
</div>

<script type="text/javascript">
     function confirm_alert(node) {
    return confirm("Do you want to delete this work ad?");
  }
</script>
@endsection

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
        @if($accounts->count())
            <table style="text-align: center; width:100%; border-style: solid; background-color:white">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>About</th>
                <th>Created_at</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        @foreach ($accounts as $account)
    <tr style=" border-style: solid; border-width: 0.5px">
        <td>{{$account->id}}</td>
        <td>{{$account->name}}</td>
        <td style="display:block; max-width: 100px;overflow: hidden;white-space: nowrap;text-overflow: ellipsis;">{{$account->about}}</td>
        <td>{{$account->created_at}}</td>
        <td>{{$account->email}}</td>
        <td>
            <a href="/home/workers/{{$account->id}}" class="btn btn-primary">Details</a>
            <a href="/home/edit/profile/{{$account->id}}" class="btn btn-warning">Edit</a>
            <a onclick="return confirm_alert(this);" href="/home/delete/profile/{{$account->id}}" class="btn btn-danger"> Delete</a>
        </td>
    </tr>
        @endforeach
        </table>
        {{ $accounts->links() }}
        @else

        @endif

</div>
</div>
</div>

<script type="text/javascript">
     function confirm_alert(node) {
    return confirm("Do you want to delete this worker?");
  }
</script>
@endsection

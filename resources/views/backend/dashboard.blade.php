@extends('master')

@section('content')
<h2>Dashboard</h2>

<h4>You are logged in as {{Auth::user()->email}}</h4>

@if (Auth::id() == 1)
    <div class="dropdown show m-3">
      <a class="btn btn-dark dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Read Notifications
      </a>

      <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
        @foreach (Auth::user()->unReadNotifications as $unotification)
        @php
            $unotification->markAsRead()
        @endphp
          <a class="dropdown-item" href="">{{$unotification->data['full_name']}}, just registered.</a>
        @endforeach
      </div>
    </div>


    <div class="dropdown show m-3">
      <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Unread Notifications
      </a>

      <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
          @foreach (Auth::user()->readNotifications as $rnotification)
          <a class="dropdown-item" href="">{{$rnotification->data['full_name']}}, just registered.</a>
        @endforeach
      </div>
    </div>
@endif

<p>
    <img src="{{Auth::user()->photo}}" alt="" class="img-thumbnail" width="250">
    <br><br>
    <a href="{{route('categories')}}" class="btn btn-lg btn-block btn-primary">Categories</a>
    <hr>
    <a href="{{route('posts.index')}}" class="btn btn-lg btn-block btn-primary">Posts</a>

</p>
@endsection
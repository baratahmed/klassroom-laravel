@extends('layouts.master')

@section('lcontent')

<form class="form-signin" action="{{route('process-register')}}" method="POST" enctype="multipart/form-data">
  @csrf

  @if ($errors->any())
      <div class="alert alert-danger">
        @if ($errors->count() == 1)
            {{$errors->first()}}
        @else
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        @endif
      </div>
  @endif


  <div class="text-center mb-4">
    <h1 class="h3 mb-3 font-weight-normal">Register an account</h1>
  </div>


  <label for="full_name">Full Name</label>
  <div class="form-label-group">
    <input type="text" id="full_name" name="full_name" class="form-control" value="{{old('full_name')}}" placeholder="Full Name" required autofocus>
  </div>

  <label for="email">Email</label>
  <div class="form-label-group">
    <input type="email" id="email" name="email" class="form-control" value="{{old('email')}}" placeholder="Email address" required autofocus>
  </div>

  <label for="phone_number">Phone Number</label>
  <div class="form-label-group">
    <input type="text" id="phone_number" name="phone_number" class="form-control" value="{{old('phone_number')}}" placeholder="Phone Number" required>
  </div>

  <label for="password">Password</label>
  <div class="form-label-group">
    <input type="password" id="password" name="password" class="form-control" value="{{old('password')}}" placeholder="Password" required>
  </div>

  <label for="password_confirmation">Confirm Password</label>
  <div class="form-label-group">
    <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" value="{{old('confirm_password')}}" placeholder="Enter Password Again" required>
  </div>

  <div class="form-label-group">
    <input type="file" id="photo" name="photo" class="form-control" required>
  </div>

  {{-- <div class="checkbox my-3">
    <label>
      <input type="checkbox" value="remember-me"> Remember me
    </label>
  </div> --}}
  <button class="btn btn-lg btn-primary btn-block my-3" type="submit">Sign Up</button>
  <a class="btn btn-lg btn-secondary btn-block my-3" href="{{route('login')}}">Login</a>
</form>


@endsection

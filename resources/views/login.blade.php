@extends('layouts.master')

@section('lcontent')
<form class="form-signin" action="{{route('process-login')}}" method="POST">
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
      <h1 class="h3 mb-3 font-weight-normal">Login</h1>
    </div>

    <label for="email">Email</label>
    <div class="form-label-group">
      <input type="email" id="email" name="email" class="form-control" value="{{old('email')}}" placeholder="Email address" required autofocus>
    </div>

    <label for="password">Password</label>
    <div class="form-label-group">
      <input type="password" id="password" name="password" class="form-control" value="{{old('password')}}" placeholder="Password" required>
    </div>

    <div class="checkbox my-3">
      <label>
        <input type="checkbox" value="remember-me"> Remember me
      </label>
    </div>

    <button class="btn btn-lg btn-primary btn-block my-3" type="submit">Login</button>
  </form>

@endsection

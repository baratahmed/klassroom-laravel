@extends('master')

@section('content')
<form class="form-signin" action="{{route('category.store')}}" method="POST">
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
      <h1 class="h3 mb-3 font-weight-normal">Create Category</h1>
    </div>

    <div class="form-label-group my-3">
      <label for="name">Category Name</label>
      <input type="text" id="name" name="name" class="form-control" value="{{old('name')}}" placeholder="Enter Category Name" required autofocus>
    </div>

    <div class="form-label-group my-3">
      <label for="status">Status</label>
      <select name="status" class="form-control">
          <option value="1">Active</option>
          <option value="0">Inactive</option>
      </select>
    </div>
    
    <button class="btn btn-primary btn-block my-3" type="submit">Create Category</button>
  </form>

  <hr>
  <a href="{{route('categories')}}" class="btn btn-primary btn-block my-3">Back to Category List</a>


@endsection
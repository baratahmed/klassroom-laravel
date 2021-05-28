@extends('master')

@section('content')
<form class="form-signin" action="{{route('posts.store')}}" method="POST" enctype="multipart/form-data">
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
      <h1 class="h3 mb-3 font-weight-normal">Create Post</h1>
    </div>

    <div class="form-label-group my-3">
      <label for="name">Post Title</label>
      <input type="text" id="title" name="title" class="form-control" value="{{old('title')}}" placeholder="Enter Post Title" required autofocus>
    </div>

    <div class="form-label-group my-3">
      <label for="name">Content</label>
      <textarea name="content" id="content" class="form-control"></textarea>
    </div>

    <div class="form-label-group my-3">
      <label for="status">Category</label>
      <select name="category_id" class="form-control">
        <option value="">Select  a Category</option>
          @foreach ($categories as $category)
            <option value="{{$category->id}}">{{$category->name}}</option>
          @endforeach
      </select>
    </div>

    <div class="form-label-group my-3">
      <label for="status">Status</label>
      <select name="status" class="form-control">
          <option value="1">Active</option>
          <option value="0">Inactive</option>
      </select>
    </div>
    
    <button class="btn btn-primary btn-block my-3" type="submit">Create Post</button>
  </form>

  <hr>
  <a href="{{route('posts.index')}}" class="btn btn-primary btn-block my-3">Back to Post List</a>

@endsection
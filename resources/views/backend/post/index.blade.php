@extends('master')

@section('content')
<h4 class="text-center text-success">All Post List</h4>

<a href="{{route('posts.create')}}" class="btn btn-success mb-5">Add Post</a>

<div class="well">
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Category</th>
                <th>Author</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
           @foreach ($posts as $post)
           <tr>
                <td>{{$post->id}}</td>
                <td>{{$post->title}}</td>
                <td>{{$post->category->name}}</td>
                <td>{{$post->user->full_name}}</td>
                <td>{{$post->status == 1 ? 'Active':'Inactive'}}</td>
                <td>
                    <a href="{{route('posts.show',$post->id)}}" class="btn btn-info">Details</a>
                </td>
            </tr>
           @endforeach
        </tbody>
    </table>
    <div>
        {!!$posts->links()!!}
    </div>
</div>
@endsection
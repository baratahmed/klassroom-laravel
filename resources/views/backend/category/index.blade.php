@extends('master')

@section('content')
<h4 class="text-center text-success">All Categories</h4>

<a href="{{route('category.create')}}" class="btn btn-success mb-5">Add Category</a>

<div class="well">
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Category</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
           @foreach ($categories as $category)
           <tr>
                <td>{{$category->id}}</td>
                <td>{{$category->name}}</td>
                <td>{{$category->status == 1 ? 'Active':'Inactive'}}</td>
                <td>
                    <a href="{{route('category.show',$category->id)}}" class="btn btn-info">Details</a>
                </td>
            </tr>
           @endforeach
        </tbody>
    </table>
    <div>
        {!!$categories->links()!!}
    </div>
</div>
@endsection
@extends('master')

@section('content')
<div class="well">
    <table class="table table-bordered table-hover">
        <tbody>
            <tr>
                <th>Category Name :</th>     
                <td>{{$category->name}}</td>
            </tr>
            <tr>
                <th>Category ID :</th>     
                <td>{{$category->id}}</td>
            </tr>
            <tr>
                <th>Category Slug :</th>     
                <td>{{$category->slug}}</td>
            </tr>
            <tr>
                <th>Created At :</th>     
                <td>{{$category->created_at->diffForHumans()}}</td>
            </tr>

        </tbody>
    </table>
    <a href="{{route('category.edit',$category->id)}}" class="btn btn-success btn-block">Edit</a>
    <hr>
    <form action="{{route('category.delete',$category->id)}}" method="POST" onsubmit="return confirm('Are you sure?');">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-block btn-danger">Delete</button>
    </form>
    <hr>
    <a href="{{route('categories')}}" class="btn btn-primary btn-block">Back to Categoty List</a>

</div>
@endsection
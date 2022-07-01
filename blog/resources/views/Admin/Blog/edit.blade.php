@extends('admin_layout.master')
@section('content')
@include('admin_inc.error')
    <h1 class="m-3">Add Blog</h1>
    <div class="container">
        <form action="{{route('AdminBlogs.update',$blog->id)}}" method="POST" enctype="multipart/form-data">
            @method('PUT')
        @csrf
        <div class="m-3">
            <label for="">Blog Title</label>
          <input type="text" class="form-control" name="title" value="{{$blog->title}}">
        </div>
        <div class="m-3">
            <label for="">Blog Description</label>
            <input type="text" class="form-control" name="desc"value="{{$blog->description}}">
          </div>
          <div class="m-3">
            <label for="">Blog Tag</label>
            <input type="text" class="form-control" name="tag" value="{{$blog->tag}}">
          </div>
          <div class="mb-3">
            <label for="formFile" class="form-label">Blog Image</label>
            <input class="form-control" type="file" name="image">
          </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection

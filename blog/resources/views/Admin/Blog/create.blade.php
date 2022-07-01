@extends('admin_layout.master')
@section('content')
@include('admin_inc.error')
    <h1 class="m-3">Add Blog</h1>
    <div class="container">
    <form action="{{url('AdminBlogs/')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="m-3">
          <input type="text" class="form-control" name="title" placeholder="Enter Blog Title">
        </div>
        <div class="m-3">
            <input type="text" class="form-control" name="desc" placeholder="Enter Blog Description">
          </div>
          <div class="m-3">
            <input type="text" class="form-control" name="tag" placeholder="Enter Blog Tag">
          </div>
          <div class="mb-3">
            <label for="formFile" class="form-label">Blog Image</label>
            <input class="form-control" type="file" name="image">
          </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection

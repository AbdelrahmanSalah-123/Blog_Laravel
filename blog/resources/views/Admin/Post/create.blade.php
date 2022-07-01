@extends('admin_layout.master')
@section('content')
@include('admin_inc.error')
    <h1 class="m-3">Add Post</h1>
    <div class="container">
    <form action="{{url('AdminPosts/')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="m-3">
          <input type="text" class="form-control" name="title" placeholder="Enter Post Title">
        </div>
        <div class="m-3">
            <input type="text" class="form-control" name="desc" placeholder="Enter Post Description">
          </div>
          <div class="m-3">
            <input type="text" class="form-control" name="comment" placeholder="Enter Post Comment">
          </div>
          <div class="mb-3">
            <label for="formFile" class="form-label">First Post Image</label>
            <input class="form-control" type="file" name="firstImage">
          </div>
          <div class="mb-3">
            <label for="formFile" class="form-label">Second Post Image</label>
            <input class="form-control" type="file" name="secondImage">
          </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection

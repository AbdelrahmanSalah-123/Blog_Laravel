@extends('admin_layout.master')
@section('content')
@include('admin_inc.error')
    <h1 class="m-3">Add Post</h1>
    <div class="container">
    <form action="{{route('AdminPosts.update',$post->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @METHOD('PUT')
        <div class="m-3">
            <label for="">Post Title</label>
          <input type="text" class="form-control" name="title" value="{{$post->title}}">
        </div>
        <div class="m-3">
            <label for="">Post Description</label>
            <input type="text" class="form-control" name="desc" value="{{$post->description}}">
          </div>
          <div class="m-3">
            <label for="">Post Comment</label>
            <input type="text" class="form-control" name="comment" value="{{$post->comment}}">
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

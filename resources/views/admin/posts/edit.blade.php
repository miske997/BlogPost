@extends('layouts.admin')

@section('content')
    <h1>Edit a Post</h1>

    <form method="post" action="{{route('post.updatee', $post->id)}}" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="form-group">
          <label for="title">Title</label>
          <input type="text" name="title" class="form-control" id="" placeholder="Enter title" aria-describedby="" value="{{$post->title}}">
        </div>

        <div class="form-group">
            <div><img height="100px" src="{{ asset("/storage/public/post_images/$post->post_image")}}" alt="Image"></div>
          <label for="file">File</label>
          <input type="file" class="form-control-file" id="post_image" name="post_image">
        </div>

        <div class="form-group">
           <textarea name="body" class="form-control" id="body" cols="30" rows="10">{{$post->body}}</textarea>
          </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
@endsection

{{--
<x-admin-master>
    
    @section('content')
        <h1>Create</h1>
    @endsection

</x-admin-master>
--}}
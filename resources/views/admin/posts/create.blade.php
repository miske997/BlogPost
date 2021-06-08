@extends('layouts.admin')

@section('content')
    <h1>Create</h1>

    <form method="post" action="{{route('post.store')}}" enctype="multipart/form-data">
        @csrf
        
        <div class="form-group">
          <label for="title">Title</label>
          <input type="text" name="title" class="form-control" id="title" placeholder="Enter title" aria-describedby="">
        </div>

        <div class="form-group">
          <label for="file">File</label>
          <input type="file" class="form-control-file" id="post_image" name="post_image" >
        </div>

        <div class="form-group">
           <textarea name="body" class="form-control" id="body" cols="30" rows="10"></textarea>
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





@extends('layouts.admin')

@section('content')
  
      @include('layouts.editor')

    <h1>Create Post</h1>

    {!! Form::open(['action'=>'PostController@store', 'method'=>'POST', 'enctype'=>'multipart/form-data']) !!}
      <div class="form-group">
        {{ Form::label('title', 'Title') }}
        {{ Form::text('title', '', ['class'=>'form-control', 'placeholder'=>'Title']) }}
      </div>
     
      <div class="form-group">
        {{ Form::label('body', 'Body') }}
        {{ Form::textarea('body', '', ['id'=>'article-ckeditor', 'class'=>'form-control','placeholder'=>'Body Text']) }}
      </div>

      <div class="form-group">
        {{Form::file('post_image')}}
      </div>

      {{ Form::submit('Submit', ['class'=>'btn btn-primary']) }}
      {!!Form::close()!!}
@endsection
--}}
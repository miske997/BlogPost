@extends('layouts.admin')

@section('content')
        @if (session()->has('permission-updated'))
            <div class="alert alert-success">
                {{session('permission-updated')}}
            </div>  
        @endif
       <div class="row">
        <div class="col-sm-5">
            <h1>Edit: {{$permission->name}}</h1> 
        
            <form method="post" action="{{route('permissions.update', $permission->id)}}">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{$permission->name}}">
                </div>

                <button class="btn btn-primary" type="submit">Update</button>
            </form>
        </div>
    </div>
@endsection
@extends('layouts.app')

@section('content')
<a href="{{route('posts.index')}}" class="btn btn-danger">Back to Posts</a>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
   <form action="{{ route('posts.update', [$post->id]) }}" method="POST">
        @method('PUT')
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">Title</label>
            <input name="title" value="{{$post->title}}" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Title">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Description</label>
            <textarea name="description" value="{{$post->description}}" class="form-control">{{$post->description}}</textarea>
        </div>
        <div class="form-group">
           <label for="exampleInputPassword1">Post Creator</label>
           <select class="form-control" name="user_id">
                <option name="user_id" value="{{$post->user->id}}">{{$post->user->name}}</option>
           
               @foreach($users as $user)
                   <option name="user_id" value="{{$user->id}}">{{$user->name}}</option>
               @endforeach
           </select>
       </div>

   <button type="submit" class="btn btn-primary">Submit</button>
   </form>

@endsection

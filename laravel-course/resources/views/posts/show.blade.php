@extends('layouts.app')

@section('content')

<div class="jumbotron">
  <h1 class="display-4">{{$post['title']}}</h1>
  <p class="lead">{{$post['description']}}</p>
  <hr class="my-4">
  <p>{{$post['created_at']->format("Y-m-d")}}</p>
</div>

<div class="jumbotron">
  <h1 class="display-4">{{ isset($post->user) ? $post->user->name : 'Not Found'}}</h1>
  <p class="lead">{{ isset($post->user) ? $post->user->email : 'Not Found'}}</p>
  <hr class="my-4">
  <p>{{ isset($post->user) ? $post->user->created_at->isoFormat('dddd D t\h of MMMM Y hh:mm:ss') : 'Not Found'}}</p>
  <a class="btn btn-primary btn-lg" href="{{route('posts.index')}}" role="button">Back to Posts</a>
  
</div>
@endsection
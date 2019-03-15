@extends('layouts.app')

@section('content')

  <table class="table">
  <thead>
    <tr>
        <th scope="col">Id</th>
        <th scope="col">Title</th>
        <th scope="col">Posted By</th>
        <th scope="col">Created at</th>
        <th scope="col">Slug</th>
        <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
        @foreach($posts as $post)
        <tr>
        <th scope="row">{{$post->id}}</th>
        <td>{{$post->title}}</td>
        <td>{{ isset($post->user) ? $post->user->name : 'Not Found'}}</td>
        <td>{{$post->created_at->format("Y-m-d")}}</td>
        <td>{{$post->slug}} </td>
        <td>
        <a href="{{ route('posts.show', [$post->id]) }}" class="btn btn-secondary">View</a>
        <a href="{{ route('posts.edit', [$post->id]) }}" class="btn btn-info">Edit</a>
        <form action="{{ route('posts.destroy', [$post->id])}}" method="POST">
        @method('DELETE')
        @csrf
         <button onclick="return confirm('Are you sure?')" class="btn btn-danger" type="submit" >Delete</button>
         
        </form>
        </td>
        </tr>
        @endforeach
        {{ $posts->links() }}
  </tbody>
</table>
<a href="{{route('posts.create')}}" class="btn btn-success">Create Post</a>

@endsection


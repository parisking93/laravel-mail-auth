@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <h5 class="card-header">{{$post['slug']}}</h5>
            <div class="card-body">
                <h5 class="card-title">{{$post['title']}}</h5>
                @if($post->category)
                <h5 class="card-title">{{$post->category->name}}</h5>
                @endif
                <p class="card-text">{{$post['content']}}</p>
                <div class="card-text">
                    <h3 class="card-title">Tags</h3>
                    @forelse ($post->tags as $tag)
                    <span class="badge badge-{{$colorBadge[rand(0,count($colorBadge)-1)]}} mb-4">{{$tag->name}}</span>
                    @empty
                    <p>Non ci sono tag <a href="{{route('admin.posts.edit', $post->id )}}"> Aggiungine uno --></a></p>
                    @endforelse
                </div>
                <a href="{{ route('admin.posts.edit', $post['id']) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('admin.posts.destroy', $post['id']) }}" method="post" class="delete-post mt-2 d-inline-block">
                    @csrf
                    @method('DELETE')
                    <input type="submit" value="Delete" class="btn btn-danger">
                </form>
            </div>

        </div>
        <div class="mt-3">
            <a href="{{ route('admin.posts.index') }} " class="btn btn-primary">Torna indietro</a>
        </div>

    </div>

@endsection
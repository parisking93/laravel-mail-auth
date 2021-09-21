@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Modifica il Post</h2>
    <form action="{{ route('admin.posts.update', $post->id) }}" method="post" class="w-50">
        @csrf
        @method('PATCH')

        <div class="mb-3">
            <label for="title" class="form-label d-block">Titolo</label>
            <input class="w-100 form-control 
            @error('title') 
            is-invalid 
            @enderror" type="text" name="title" id="title" aria-describedby="emailHelp" value="{{ old('title', $post->title) }}">
            @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="categoria" class="form-label d-block">Titolo</label>
            <select class="form-control w-50
            @error('category_id') 
            is-invalid 
            @enderror " name="category_id" id="categoria" value="{{ old('title', $post->title) }}">
                <option>-- Scegli la Categoria --</option>   
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" @if($category->id == old('category_id', $post->category_id)) selected @endif >
                        {{ $category->name }}
                    </option>   
                @endforeach
            </select>
            @error('category_id')
                <div class="alert alert-danger w-50">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Descrizione</label>
            <textarea name="content" class="form-control 
            @error('content') 
            is-invalid 
            @enderror"  id="description">{{ old('content', $post->content) }}</textarea>
            @error('content')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <h3>Tags</h3>
            @foreach ($tags as $k => $tag)
            <!-- controllo checkbox sia sull'errore che mostrare i gia presenti -->
            <input class="my-4 mx-2" type="checkbox" id="tag{{$k}}" value="{{$tag->id}}" 
            @if ($post->tags->contains($tag->id) && $errors)
                checked
            @elseif (in_array($tag->id, old('tags', [])))
                checked
            @endif name="tags[]" >
            <label for="tag{{$k}}"> {{$tag->name}}</label>
            @endforeach
        </div>
     
        <button type="submit" class="btn btn-primary">Modifica</button>
    </form>
</div>
@endsection
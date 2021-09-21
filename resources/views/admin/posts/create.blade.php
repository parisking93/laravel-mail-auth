@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Aggiungi un Post</h2>
    <form action="{{ route('admin.posts.store') }}" method="post" class="w-50">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label d-block">Titolo</label>
            <input class="w-100 form-control 
            @error('title') 
            is-invalid 
            @enderror" type="text" name="title" id="title" aria-describedby="emailHelp" value="{{ old('title')}}">
            @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="categoria" class="form-label d-block">Titolo</label>
            <select class="form-control w-50 
            @error('category_id') 
            is-invalid 
            @enderror" name="category_id" id="categoria" value="">
                <option>-- Scegli la Categoria --</option>   
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" @if($category->id == old('category_id')) selected @endif >
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
            @enderror" id="description">{{ old('content') }}</textarea>
            @error('content')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <h3>Tags</h3>
            @foreach ($tags as $k => $tag)
            <input class="my-4 mx-2" type="checkbox" id="tag{{$k}}" value="{{$tag->id}}" 
            @if (in_array($tag->id, old('tags', [])))
                checked
            @endif name="tags[]" >
            <label for="tag{{$k}}"> {{$tag->name}}</label>
            @endforeach
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

</div>

@endsection
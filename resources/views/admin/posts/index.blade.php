@extends('layouts.app')

@section('content')
    <div class="container">

        <table class="table">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Titolo</th>
                <th scope="col">Categoria</th>
                <th scope="col">Azioni</th>
                </tr>
            </thead>
            <tbody>
                @if(@session('changed'))
                    <div class="alert alert-success" >{{@session('changed')}}</div>
                @elseif (@session('add'))
                    <div class="alert alert-success" >{{@session('add')}}</div>
                @elseif (@session('delete'))
                    <div class="alert alert-danger" >{{@session('delete')}}</div>
                @endif

                @foreach ($posts as $post)
                <tr>
                    <th scope="row">{{$post->id}}</th>
                    <td>{{$post->title}}</td>
                    <td>
                        @if($post->category_id)
                         <!-- per richiamare il name della tabella category uso  -->
                         <!-- nome del model(collegato a molti) -> nome funzione dentro al model -> nome dell'altributo che voglio prendere  -->
                            {{$post->category->name}}
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.posts.show', $post->slug)}}" class="btn btn-success">Show</a>
                        <a href="{{ route('admin.posts.edit', $post->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('admin.posts.destroy', $post->id )}}" method="post" class="delete-post d-inline-block">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="Delete" class="btn btn-danger">
                        </form>

                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
        <div class="d-inline-block mt-5">
            {{$posts->links()}}
        </div>

    </div>

@endsection
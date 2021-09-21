<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// lo importo per poetr usare slug 
use Illuminate\Support\Str;

// collego i model 
use App\Category;
use App\Post;
use App\Tag;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $posts = Post::paginate(5);
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.posts.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'title' => 'required|max:50',
                'content' => 'required',
                'category_id' => 'nullable|exists:categories,id'
            ]
        );



        $data = $request->all();
        // dd($data['tags'][0]);

        $newPost = new Post();
        // non funzione con new_post->title  dobbiamo usare $data

        $slugCreato = Str::slug($data['title'], '-');

        // controllo se c'è un duplicato
        
        //vedo se è presente uno slug uguale a quello digitato
        $slugDatabase = Post::where('slug', $slugCreato)->first();
        $contatore = 1;
        while($slugDatabase) {
            $slugCreato .= '-' . $contatore;

            // ricontrollo che non ci sia sul database 
            $slugDatabase = Post::where('slug', $slugCreato)->first();

            $contatore++;
        }

        // dd( $slug_database );
        // alla fine del controllo lo aggiungo
        $newPost->slug = $slugCreato;

        $newPost->fill($data);
        $newPost->save();
        if(isset($data['tags'])){
            $newPost->tags()->attach($data['tags']);
        }
        return redirect()->route('admin.posts.index')->with('add', 'Hai aggiunto con successo l\'elemento ' . $newPost->id);  
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $colorBadge = ['success','warning','info','secondary','danger','primary'];
        
        $post = Post::where('slug', $slug)->first();

        return view('admin.posts.show', compact('post','colorBadge'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view('admin.posts.edit', compact('post', 'categories','tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->validate(
            [
                'title' => 'required|max:50',
                'content' => 'required',
                'category_id' => 'nullable|exists:categories,id'
            ]
        );
        $data =$request->all();
        if($data['title'] != $post->title) {

            $slug_creato = Str::slug($data['title'], '-');

            // controllo se c'è un duplicato
            
            //vedo se è presente uno slug uguale a quello digitato
            $slug_database = Post::where('slug', $slug_creato)->first();
            $contatore = 1;
            while($slug_database) {
                $slug_creato .= '-' . $contatore;
    
                // ricontrollo che non ci sia sul database 
                $slug_database = Post::where('slug', $slug_creato)->first();
    
                $contatore++;
            }

            // inserisco lo slug generato in data 
            $data['slug'] = $slug_creato;
            
        }

        $post->update($data);
        if(isset($data['tags'])){

            $post->tags()->sync($data['tags']);
        }
        return redirect()->route('admin.posts.index')->with('changed', 'Hai modificato con successo l\'elemento ' . $post->id);  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        $post->tags()->detach();
        return redirect()->route('admin.posts.index')->with('delete', 'Hai cancellato con successo l\'elemento ' . $post->id);
    }
}

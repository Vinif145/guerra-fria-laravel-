<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = \TCG\Voyager\Models\Post::paginate(2); 
        //scopePublished
        $categories = \TCG\Voyager\Models\Category::all();

        return view('posts.index', ['posts'=> $posts, 'categorias'=> $categories]);
    }

    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = \TCG\Voyager\Models\Post::where('id', $id)->first();
        //dd($post->authorId->name);

        //$author = \TCG\Voyager\Models\User::where('id', $post->author_id)->first(); 
        return view('posts.show', ['post'=> $post]);
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $slug
     * @return \Illuminate\Http\Response
     */
    public function slug($slug)
    {
        $post = \TCG\Voyager\Models\Post::where('slug', $slug)->first();

        return view('posts.show', ['post'=> $post]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $slug
     * @return \Illuminate\Http\Response
     */
    public function slugCategory($slug)
    {
        $category = \TCG\Voyager\Models\Category::where('slug', $slug)->first();

        return view('posts.category', ['category'=> $category]);
    }


}

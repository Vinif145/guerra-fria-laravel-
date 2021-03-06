<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts= \TCG\Voyager\Models\Post::paginate(2);

        $pages= \TCG\Voyager\Models\Page::where('status', 1)->orderBy('created_at')->get();
        
        //$posts = \TCG\Voyager\Models\Post::all(); 
        //scopePublished
        $categories = \TCG\Voyager\Models\Category::all();

        $categoriaEUA = \TCG\Voyager\Models\Category::where('slug', 'eua')->first();

        $categoriaRussia = \TCG\Voyager\Models\Category::where('slug', 'russia')->first();

        return view('index', ['posts'=> $posts, 'categorias'=> $categories, 'pages'=> $pages, 'categoriaEUA'=> $categoriaEUA, 'categoriaRussia'=> $categoriaRussia]);
    }

    public function index2()
    {
        $posts= \TCG\Voyager\Models\Post::paginate(2);

        $pages= \TCG\Voyager\Models\Page::where('status', 1)->orderBy('title')->get();
        
        //$posts = \TCG\Voyager\Models\Post::all(); 
        //scopePublished
        $categories = \TCG\Voyager\Models\Category::all();

        $categoriaEUA = \TCG\Voyager\Models\Category::where('slug', 'eua')->first();

        return view('index-backup', ['posts'=> $posts, 'categorias'=> $categories, 'pages'=> $pages, 'categoriaEUA'=> $categoriaEUA]);
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

        return view('index', ['category'=> $category]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

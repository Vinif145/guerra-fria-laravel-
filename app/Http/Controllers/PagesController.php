<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $pages = \TCG\Voyager\Models\Page::paginate(6); 

        return view('pages.index', ['pages'=> $pages]);
    }

    public function show($id)
    {
        $page = \TCG\Voyager\Models\Page::where('id', $id)->first();
        //scopeActive($query)
        $author = \TCG\Voyager\Models\User::where('id', $page->author_id)->first(); 

        return view('pages.show', ['page'=> $page, 'author'=> $author]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $slug
     * @return \Illuminate\Http\Response
     */
    public function slug($slug)
    {
        $page = \TCG\Voyager\Models\Page::where('slug', $slug)->first();

        $author = \TCG\Voyager\Models\User::where('id', $page->author_id)->first(); 
        
        return view('pages.show', ['page'=> $page, 'author'=> $author]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $role_id
     * @return \Illuminate\Http\Response
     */
    public function authorIndex($role_id)
    {
        $pages = \TCG\Voyager\Models\Page::where('author_id', $role_id)->paginate(6);

        return view('pages.author', ['pages'=>$pages]);
    }

}

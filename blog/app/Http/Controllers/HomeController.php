<?php

namespace App\Http\Controllers;

use App\Models\Home;
use App\Models\Blog;
use App\Models\Post;
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
        $blogs=Blog::paginate(4);
        $posts=Post::all();
        return view('pages.index')->with(['blogs'=>$blogs,'posts'=>$posts]);
    }
   
}
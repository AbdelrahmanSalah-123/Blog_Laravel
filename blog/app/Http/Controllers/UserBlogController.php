<?php

namespace App\Http\Controllers;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class UserBlogController extends Controller
{
    public function index(Request $request){

        $blogs=Blog::paginate(4);
        return view('pages.blog',compact('blogs'));
    }
    public function search(Request $request){
        if(isset($_GET['search'])){
            $search_text=$request->search;
            $blogs=DB::table('blogs')->where('title','like',"%{$search_text}%")->paginate(4);
            $blogs->appends($request->all());
            return view('pages.blog',['blogs'=>$blogs]);
        }
    }
}

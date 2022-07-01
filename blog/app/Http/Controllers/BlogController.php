<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs=Blog::paginate(4);
        return view('Admin.Blog.index',compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.Blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fileExt=$request->image->getClientOriginalExtension();
        $fileName=time().".".$fileExt;
        $path="img";
        $request->image->move($path,$fileName);
        $request->validate(
            [
                'title'=>'required|string|min:5|max:50',
                'desc'=>'required|string|min:5|max:50',
                'tag'=>'required|string|min:5|max:50',
            ]
            );
            $blog=new Blog;
            $blog->title=$request->title;
            $blog->description=$request->desc;
            $blog->tag=$request->tag;
            $blog->image=$fileName;
            $blog->save();
            return redirect('AdminBlogs')->with('success','Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blog = Blog::find($id);
        return view('Admin.Blog.edit',compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $fileExt=$request->image->getClientOriginalExtension();
        $fileName=time().".".$fileExt;
        $path="img";
        $request->image->move($path,$fileName);
        $request->validate(
            [
                'title'=>'required|string|min:5|max:50',
                'desc'=>'required|string|min:5|max:50',
                'tag'=>'required|string|min:5|max:50',
            ]
            );
            // dd($request->title);
            $blog=Blog::find($id);
            $blog->title=$request->title;
            $blog->description=$request->desc;
            $blog->tag=$request->tag;
            $blog->image=$fileName;
            $blog->save();
            return redirect('AdminBlogs')->with('success','Edit Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::delete('DELETE FROM blogs WHERE id = ?', [$id]);
        return redirect('Blogs')->with('success','Delete Successfully');

    }
}
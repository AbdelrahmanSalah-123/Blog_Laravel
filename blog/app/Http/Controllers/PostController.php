<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Post;
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
        $posts=Post::all();
        return view('Admin.Post.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.Post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $first_fileExt=$request->firstImage->getClientOriginalExtension();
        $firstImage_Name=time().".".$first_fileExt;
        $path="img/Post";
        $request->firstImage->move($path,$firstImage_Name);
        $second_fileExt=$request->secondImage->getClientOriginalExtension();
        $secondImage_Name=time().".".$second_fileExt;
        $path="img/Post";
        $request->secondImage->move($path,$secondImage_Name);
        $request->validate(
            [
                'title'=>'required|string|min:5|max:50',
                'desc'=>'required|string|min:5|max:50',
                'comment'=>'required|string|min:5|max:50',
            ]
            );
            $blog=new Post();
            $blog->title=$request->title;
            $blog->description=$request->desc;
            $blog->comment=$request->comment;
            $blog->first_image=$firstImage_Name;
            $blog->second_image=$secondImage_Name;
            $blog->save();
            return redirect('AdminPosts')->with('success','Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        return view('Admin.Post.edit',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $first_fileExt=$request->firstImage->getClientOriginalExtension();
        $firstImage_Name=time().".".$first_fileExt;
        $path="img/Post";
        $request->firstImage->move($path,$firstImage_Name);
        $second_fileExt=$request->secondImage->getClientOriginalExtension();
        $secondImage_Name=time().".".$second_fileExt;
        $path="img/Post";
        $request->secondImage->move($path,$secondImage_Name);
        $request->validate(
            [
                'title'=>'required|string|min:5|max:50',
                'desc'=>'required|string|min:5|max:50',
                'comment'=>'required|string|min:5|max:50',
            ]
            );
            $blog=Post::find($id);
            $blog->title=$request->title;
            $blog->description=$request->desc;
            $blog->comment=$request->comment;
            $blog->first_image=$firstImage_Name;
            $blog->second_image=$secondImage_Name;
            $blog->save();
            return redirect('AdminPosts')->with('success','Edit Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)//Note: Post $post not work
    {
        //$post->delete(); Not work also
        DB::delete('DELETE FROM posts WHERE id = ?', [$id]);
        return redirect('AdminPosts')->with('success','Delete Successfully');
    }
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

use App\Post;

use App\Comment;

use Illuminate\Support\Facades\Auth;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $post = new Post;
        $all = $post->all()->toArray();
        // dd($all);
        return view('posts.index',[
            'posts'=>$all,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = new Post;
        $post->weather = $request->weather;
        $post->user_id = Auth::id();
        $post->tide = $request->tide;
        $post->fishing_spot = $request->fishing_spot;
        $post->post = $request->post;
        $image = request()->file('image')->getClientOriginalName();
        request()->file('image')->storeAs('' , $image , 'public');
        $post->image=$image;
        $post->save();
        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $user = new User;
        $post = new Post;
        $comment = new Comment;

        $date = $post->find($id);
        $all = $comment->where('post_id',$date->id)->get();
        

        return view('posts.show',[
            'date'=>$date,
            'comments'=>$all,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $post = new Post;
        $date = $post->find($id);
        // $date = Post::with('user')->get();
        return view('posts.edit',[
            'date'=>$date,
        ]);
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
        // $image = request()->file('image')->getClientOriginalName();
        // request()->file('image')->storeAs('' , $image , 'public');
        
        $post = Post::find($id);
        $post->weather=$request->weather;
        $post->tide=$request->tide;
        $post->fishing_spot = $request->fishing_spot;
        $post->post = $request->post;
        // $post->icon=$icon;
        $post->save();
        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect('/');
    }

}

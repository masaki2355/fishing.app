<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

use App\Post;

use App\Comment;

use App\Fish;

use App\Http\Requests\PostData;

use App\Http\Requests\UpdateData;

use Illuminate\Support\Facades\Auth;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $post = Post::query();

        
        
        $search = $request->input('keyword');

        if ($search) {
            $spaceConversion = mb_convert_kana($search, 's');

            $wordArraySearched = preg_split('/[\s,]+/', $spaceConversion, -1, PREG_SPLIT_NO_EMPTY);

            foreach($wordArraySearched as $value) {
                $post->where('fishing_spot','like',"%{$value}%")->
                orWhere('weather', 'like', "%{$value}%");
            }

        }
        $posts = $post->get();
        $fishes = Fish::all();
  

        return view('posts.index',[
            'posts'=>$posts,
            'fishes'=>$fishes
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
    public function store(PostData $request)
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
        foreach ($request->fish as $fish => $f ) {

            $fish = new Fish;
            $fish->fish = $f;
            $fish->post_id = $post->id;
            $fish->save(); 
        }

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
        $fish = Fish::where('post_id',$id)->get();

        return view('posts.show',[
            'date'=>$date,
            'comments'=>$all,
            'fish'=>$fish
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
        $fish = Fish::where('post_id',$id)->get();

        // $date = Post::with('user')->get();
        return view('posts.edit',[
            'date'=>$date,
            'fish'=>$fish

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateData $request, $id)
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

        $fish = Fish::where('post_id',$id)->get();
        foreach ($fish as $key => $f ){
            $f->fish = $request->fish[$key];
            $f->post_id = $id;
            $f->save(); 
        }

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

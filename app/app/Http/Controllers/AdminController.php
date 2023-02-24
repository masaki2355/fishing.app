<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

use App\Comment;


class AdminController extends Controller
{
    public function userIndex(){
        $user = User::all();
        return view('admin.user_index',[
            'user' => $user,
        ]);
    }

    public function commentIndex($id){
        $comment = new Comment;
        $user = new User;

        // $date = $comment->find($id);
        $all = $comment->where('user_id',$id)->get();

        return view('admin.comment_index',[
            'comments' => $all,
        ]);
    }

    public function userDelete($id){
        $user = User::find($id);
        $user->delete();
        return redirect('/user_index');
    }

    public function commentDelete($id){
        $comment = Comment::find($id);
        $user_id = $comment->user_id;
        $comment->delete();
        return redirect()->route('comment.index',$user_id);
    }
}

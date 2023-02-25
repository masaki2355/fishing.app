<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

use App\Comment;


class AdminController extends Controller
{
    public function userIndex(Request $request){
        $user = User::all();
                // ユーザー一覧をページネートで取得
        $users = User::paginate(20);
        // 検索フォームで入力された値を取得する
        $search = $request->input('keyword');
        $query = User::query();
        if ($search) {

        // 上記で取得した$queryをページネートにし、変数$usersに代入
        $query->where('name','like',"%{$search}%");
        }
        $user = $query->get();

        // ビューにusersとsearchを変数として渡す
        return view('admin.user_index',[
            'user' => $user,
            'search' => $search,

        ]);
    }

    public function commentIndex(Request $request, $id){

        $query = Comment::where('user_id',$id);
        $search = $request->input('keyword');

        if ($search) {
            $query->where('body','like',"%{$search}%");
        }
        $comment = $query->get();


        return view('admin.comment_index',[
            'comments' => $comment,
            'search' => $search,
            'id' => $id
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

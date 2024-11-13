<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Gate;

class PostController extends Controller
{
    public function create() {
        return view('post.create');
    }

    public function store(Request $request) { //Requestはuse宣言で使われているRequestを指定している

        // $post = Post::create([ //Postモデルに沿って、Postインスタンスを作成している。作成したインスタンスの各要素に入れる値は、引数に直接配列で指定している  
        //     'title' => $request->title, //name="title"と指定された箇所に入力された値が入る
        //     'body' => $request->body //name="body"と指定された箇所に入力された値が入る
        // ]);
        Gate::authorize('test');

        $validated = $request->validate([   
            'title' => 'required|max:20', //値が入ってないor件名が20文字以上の場合エラー
            'body' => 'required|max:400', //値が入ってないor本文が400文字以上の場合エラー
        ]);

        $validated['user_id'] = auth()->id(); //$validatedの中のuser_id情報を取り出す,auth()->id()はログインしているユーザーのid情報

        $post = Post::create($validated); //バリテーションエラーがなかった場合には、対象のデータが配列として$validatedに入る
        return back(); //処理後に元のページに戻るように指定している
    }

    // public function index() {
    //     $posts = Post::all(); //postsテーブルの値を取得する
    //     return view('post.index', compact('posts')); //compact関数=変数名とその値から配列を作成する,postsテーブルから取得した値を配列としてviewに渡す
    // }

    //↓Eloquent ORMを使った場合
    public function index() {
        $posts = Post::where('user_id', auth()->id())->get(); //user_idカラムが、ログインしているユーザーのid(auth()->id())と同じpostsデータを抽出する
        return view('post.index', compact('posts')); //↑語尾にgetメソッドは、条件に合ったデータを全て取得する
    }

    public function show(Post $post) { //(Post $post):タイプヒント=引数の型を指定している(Postモデルの型を指定する)
        return view('post.show', compact('post'));
    }

    public function edit(Post $post) {
        return view('post.edit', compact('post'));
    }

    public function update(Request $request, Post $post) { 
        $validated = $request->validate([
            'title' => 'required|max:20',
            'body' => 'required|max:400',
        ]);

        $validated['user_id'] = auth()->id();

        $post->update($validated);

        $request->session()->flash('message', '更新しました');
        return back();
    }

    public function destroy(Request $request, Post $post) {
        $post->delete();
        $request->session()->flash('message', '削除しました');
        return redirect()->route('post.index'); //return back()だと削除後は、投稿の個別表示も消えてしまうため、リダイレクト用のコード:redirect()->route('post.index')だと投稿を削除した後に、投稿の一覧ページに遷移する
    }
}

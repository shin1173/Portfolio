<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Player;
use App\Models\LineupOrder;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() //投稿一覧画面
    {
        // $posts=Post::all();
        $posts = Post::paginate(10);
        return view('post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() //投稿画面
    {
        $players = Player::pluck('name', 'id');
        return view('post.create', compact('players'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) //投稿データ保存
    {
        $validated = $request->validate([
            'title' => 'required|max:20',
            'body' => 'required|max:300',
        ]);

        $validated['user_id'] = auth()->id();

        $post = Post::create($validated);

        foreach($request->all() as $key => $player_id) {
            if(is_numeric($key)) {
                LineupOrder::create([
                    'order' => $key,
                    'player_id' => $player_id,
                    'post_id' => $post->id, 
                ]);
            }
        }

        $request->session()->flash('message', '保存しました');
        return redirect()->route('post.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post) //投稿を個別表示する
    {
        return view('post.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post) //投稿を編集する
    {
        return view('post.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post) //投稿を更新する
    {
        $validated = $request->validate([
            'title' => 'required|max:20',
            'body' => 'required|max:400',
        ]);

        $validated['user_id'] = auth()->id();

        $post->update($validated);

        $request->session()->flash('message', '更新しました');
        return redirect()->route('post.show', compact('post'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Post $post) //投稿を削除する
    {
        $post->delete();
        $request->session()->flash('message', '削除しました');
        return redirect()->route('post.index');
    }
}

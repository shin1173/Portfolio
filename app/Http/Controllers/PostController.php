<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Player;
use App\Models\LineupOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * MEMO: 投稿一覧画面
     */
    public function index()
    {
        $posts = Post::paginate(10);
        return view('post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     * 
     * MEMO: 投稿画面
     */
    public function create()
    {
        $players = Player::pluck('name', 'id');
        return view('post.create', compact('players'));
    }

    /**
     * Store a newly created resource in storage.
     * 
     * MEMO: 投稿データ保存
     */
    public function store(StorePostRequest $request)
    {
        $validated = $request->validated();

        $validated['user_id'] = auth()->id();

        $post = Post::create($validated);

        foreach($request->all() as $key => $player_id) {
            if(is_numeric($key)  && !is_null($player_id)) {
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
     * 
     * MEMO: 投稿個別表示
     */
    public function show(Post $post)
    {
        return view('post.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     * 
     * MEMO: 投稿編集
     */
    public function edit(Post $post)
    {
        return view('post.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     * 
     * MEMO: 投稿更新
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $validated = $request->validated();

        $validated['user_id'] = auth()->id();

        $post->update($validated);

        $request->session()->flash('message', '更新しました');
        return redirect()->route('post.show', compact('post'));
    }

    /**
     * Remove the specified resource from storage.
     * 
     * MEMO: 投稿削除
     */
    public function destroy(Request $request, Post $post)
    {
        $post->delete();
        $request->session()->flash('message', '削除しました');
        return redirect()->route('post.index');
    }
}

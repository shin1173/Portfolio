<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Player;

class EntryController extends Controller
{
    public function create() {
        return view('entry.player');
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'name' => 'required|max:30',
            'team' => 'required',
            'position' => 'required|max:10',
            'detail' => 'max:20',
        ]);

        $player = Player::create($validated);
        return redirect()->route('entry.index');
    }

    public function index(Request $request) {
        $query = Player::query();

        $keyword = $request->input('keyword');
        if(!empty($keyword)) {
            $query->where('name', 'LIKE', "%{$keyword}%")->get();
        }

        $players = $query->paginate(20);
        return view('entry.index', compact('players'));
    }

    public function show(Player $player) {
        return view('entry.show', compact('player'));
    }

    public function edit(Player $player) {
        return view('entry.edit', compact('player'));
    }

    public function update(Request $request, Player $player) {
        $validated = $request->validate([
            'name' => 'required|max:30',
            'team' => 'required',
            'position' => 'required|max:10',
            'detail' => 'max:20',
        ]);

        $player->update($validated);

        $request->session()->flash('message', '更新しました');
        return redirect()->route('entry.show', compact('player'));
    }

    public function destroy(Request $request, Player $player) {
        $player->delete();

        $request->session()->flash('message', '削除しました');
        return redirect()->route('entry.index');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Player;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreEntryRequest;
use App\Http\Requests\UpdateEntryRequest;

class EntryController extends Controller
{
    public function index(Request $request) {
        $query = Player::query();

        $keyword = $request->input('keyword');
        if(!empty($keyword)) {
            $query->where('name', 'LIKE', "%{$keyword}%")->get();
        }

        $players = $query->paginate(20);
        return view('entry.index', compact('players'));
    }

    public function create() {
        return view('entry.player');
    }

    public function store(StoreEntryRequest $request) {
        $validated = $request->validated();

        $player = Player::create($validated);
        return redirect()->route('entry.index');
    }

    public function show(Player $player) {
        return view('entry.show', compact('player'));
    }

    public function edit(Player $player) {
        return view('entry.edit', compact('player'));
    }

    public function update(UpdateEntryRequest $request, Player $player) {
        $validated = $request->validated();

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

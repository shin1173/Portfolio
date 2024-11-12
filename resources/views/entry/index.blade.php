<x-app-layout>
    <x-slot name="header">
        <div class="flex">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight flex-1">
                選手一覧
            </h2>
            <form method="GET" action="{{ route('entry.index') }}" class="flex-1 text-right h-0">
                @csrf
                    <input type="text" name="keyword" class="py-1" placeholder="選手名">
                    <input type="submit" value="検索" class="hover:bg-amber-200">
            </form>
        </div>
    </x-slot>

    <div class="mt-3 mx-auto px-6 font-bold rounded-2xl flex">
            <div class="p-1 bg-indigo-100 flex-1">
                Player:選手
            </div>
            <div class="p-1 bg-indigo-100 flex-1">
                Team:チーム
            </div>
            <div class="p-1 bg-indigo-100 flex-1">
                Position:ポジション
            </div>
            <div class="p-1 bg-indigo-100 flex-1">
                Detail:特徴
            </div>
    </div>

        @if(session('message'))
            <div class="text-red-600 font-bold">
                {{ session('message') }}
            </div>
        @endif
        
        <div class="mx-auto px-6">
        @foreach($players as $player)
            <div class="mt-3 bg-white w-full rounded-2xl flex">
                <h1 class="p-1 text-lg font-semibold flex-1">
                    Player:
                    <a href="{{ route('entry.show', $player) }}" class="text-blue-400">
                    {{$player->name}}
                    </a>
                </h1>
                <p class="p-1 text-lg font-semibold flex-1">
                    {{$player->team}}
                </p>
                <p class="p-1 text-lg font-semibold flex-1">
                    {{$player->position}}
                </p>
                <p class="p-1 text-lg font-semibold flex-1">
                    {{$player->detail}}
                </p>
            </div>
        @endforeach
        <div class="my-4">
            {{ $players->links() }}
        </div>
    </div>    
</x-app-layout>

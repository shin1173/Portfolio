<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            選手登録
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto px-6">
        @if(session('message'))
            <div class="text-blue-600 font-bold">
                {{ session('message') }}
            </div>
        @endif
        <form method="POST" action="{{ route('entry.update', $player) }}">
        @csrf
        @method('patch')
            <div class="mt-8">
                <div class="w-full flex flex-col">
                    <label for="title" class="font-semibold mt-4">選手名</label>
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    <input type="text" name="name" class="w-auto py-2 border border-gray-300 rounded-md" id="name" value="{{ old('name', $player->name) }}">
                </div>
            </div>

            <div class="mt-8">
                <div class="w-full flex flex-col">
                    <label for="team" class="font-semibold mt-4">所属チーム</label>
                    <x-input-error :messages="$errors->get('team')" class="mt-2" />
                    <input type="text" name="team" class="w-auto py-2 border border-gray-300 rounded-md" id="team" value="{{ old('team', $player->team) }}">
                </div>
            </div>

            <div class="mt-8">
                <div class="w-full flex flex-col">
                    <label for="position" class="font-semibold mt-4">ポジション</label>
                    <x-input-error :messages="$errors->get('position')" class="mt-2" />
                    <input type="text" name="position" class="w-auto py-2 border border-gray-300 rounded-md" id="position" value="{{ old('position', $player->position) }}">
                </div>
            </div>

            <div class="mt-8">
                <div class="w-full flex flex-col">
                    <label for="detail" class="font-semibold mt-4">詳細</label>
                    <x-input-error :messages="$errors->get('detail')" class="mt-2" />
                    <input type="text" name="detail" class="w-auto py-2 border border-gray-300 rounded-md" id="detail" value="{{ old('detail', $player->detail) }}">
                </div>
            </div>

            <x-primary-button class="mt-4">
                更新する
            </x-primary-button>
        </form>
    </div>
</x-app-layout>

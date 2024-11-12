<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            選手詳細
        </h2>
    </x-slot>

    <div class="mx-auto px-6">
            <div class="mt-3 bg-white rounded-2xl flex">
                <h1 class="p-1 text-lg font-semibold w-3/12 leading-10 text-center">
                    {{$player->name}}
                </h1>
                <hr class="h-full">
                <p class="p-1 text-lg font-semibold w-2/12 leading-10 text-center">
                    {{$player->team}}
                </p>
                <hr class="h-full">
                <p class="p-1 text-lg font-semibold w-2/12 leading-10 text-center">
                    {{$player->position}}
                </p>
                <p class="p-1 text-lg font-semibold w-3/12 leading-10 text-center">
                    {{$player->detail}}
                </p>
                    <a href="{{ route('entry.edit', $player )}}" class="w-1/12 text-right">
                        <x-primary-button>
                            編集
                        </x-primary-button>
                    </a>               
                <form method="post" action="{{ route('entry.destroy', $player) }}" class="w-1/12 text-center">
                    @csrf
                    @method('delete')
                    <x-primary-button>
                        削除
                    </x-primary-button>
                </form>
            </div>
    </div>    
</x-app-layout>

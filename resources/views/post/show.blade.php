<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            個別表示
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto px-6">
        <div class="bg-white w-full rounded-2xl">
            <div class="mt-4 p-4">
                <div class="flex">
                    <h1 class="text-lg font-semibold w-10/12 leading-10">
                        チーム名:{{ $post->title}}
                    </h1>
                        <a href="{{route('post.edit', $post)}}" class="w-1/12 text-right">
                            <x-primary-button>
                                編集
                            </x-primary-button>
                        </a>
                        <form method="post" action="{{route('post.destroy', $post)}}" class="w-1/12 text-center">
                            @csrf
                            @method('delete')
                            <x-primary-button class="bg-red-700 ml-2">
                                削除
                            </x-primary-button>
                        </form>
                </div>
                <hr class="w-full">

                <p class="mt-4 font-medium whitespace-pre-line"> {{--whitespace-pre-line(TailwindCSS)クラス=データ保存時の行の折り返しを再現できる--}}
                    @foreach($post->lineupOrders as $lineupOrders)
                        <p class="m-2">
                            打順: {{ $lineupOrders->order }} - {{ $lineupOrders->player->name }}
                        </p>
                    @endforeach
                </p>
                <hr class="w-full mt-10">

                <p class="mt-1 font-medium whitespace-pre-line leading-none"> {{--whitespace-pre-line(TailwindCSS)クラス=データ保存時の行の折り返しを再現できる--}}
                    コンセプト:{{$post->body}}
                </p>
                <div class="text-sm font-semibold flex flex-row-reverse">
                    <p> {{$post->created_at}}</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

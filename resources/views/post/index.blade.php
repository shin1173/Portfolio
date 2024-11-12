{{--投稿した内容を全て表示させるビューファイル--}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            一覧表示
        </h2>
    </x-slot>

    <div class="mx-auto px-6">
        {{-- @if(session('message'))
            <div class="text-red-600 font-bold">
                {{session('message')}}
            </div>
        @endif --}}

        <x-message :message="session('message')" />
        @foreach($posts as $post) {{--PostControllerから受け取った$posts変数の値を取り出して$postに表示する--}}
            <div class="mt-3 px-4 pt-3 pb-1  bg-white w-full rounded-2xl">
                <h1 class="p-1 text-lg font-semibold">
                    チーム名:
                    <a href="{{route('post.show', $post)}}" class="text-blue-600">                    
                    {{$post->title}}
                    </a>
                </h1>
                <hr class="w-full">
                <h1 class="mt-1 px-1 py-6 font-medium">
                    コンセプト:
                    {{$post->body}}
                </h1>
                <div class="pb-1 text-xs font-light">
                    <p>
                        {{$post->created_at}} / {{$post->user->name??'匿名'}} {{--??(NULL合体演算子)=nameがNULLの場合は'匿名'と表示する--}}
                    </p>
                </div>
            </div>
        @endforeach
        <div class="my-4">
            {{ $posts->links() }}
        </div>
    </div>    
</x-app-layout>

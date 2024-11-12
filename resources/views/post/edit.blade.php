<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            編集
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto px-6">
        @if(session('message')) {{--もしセッションの中にmessageが含まれていれば、セッションの中のmessageを表示する--}}
            <div class="text-red-600 font-bold">
                {{session('message')}}
            </div>
        @endif
        <form method="post" action="{{ route('post.update', $post)}}">
        @csrf {{--クロスサイトリクエストフォージェリ攻撃を防ぐためのもの・ワンタイムトークン(秘密情報)を付加する。 --}}
        @method('patch') {{--formタグのメソッドはget・postしかサポートしていないため、それ以外のメソッドを使う場合はformの後にメソッド名を指定する--}}
            <div class="mt-8">
                <div class="w-full flex flex-col">
                    <label for="title" class="font-semibold mt-4">チーム名</label>
                    <x-input-error :messages="$errors->get('title')" class="mt-2" /> {{--バリデーションエラーが起こると、ビュー側に$error変数が受け渡される--}}
                    <input type="text" name="title" class="w-auto py-2
                    border border-gray-300 rounded-md" id="title"
                    value="{{old('title', $post->title)}}"> {{--更新時のold関数は、デフォルトでは、DBに保存されている値を表示して、パリデーションエラーが起きた場合は、エラー前の内容を表示する--}}
                </div>
            </div>

            <div class="w-full flex flex-col">
                <label for="body" class="font-semibold mt-4">コンセプト</label>
                <x-input-error :messages="$errors->get('body')" class="mt-2" /> {{--x-input-errorでinput-error.blade.phpを参照している--}}
                <textarea name="body" class="w-auto py-2 border border-gray-300 rounded-md" id="body" cols="30" rows="5">{{old('body', $post->body)}}</textarea>
            </div>

            <x-primary-button class="mt-4">
                更新する
            </x-primary-button>
        </form>
    </div>
</x-app-layout>

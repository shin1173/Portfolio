<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            チーム作成
        </h2>
    </x-slot>

    <div class="max-w-7xl mb-10 mx-auto px-6">
        {{--チーム名--}}
        <x-message :message= "session('message')" />
        <form method="post" action="{{ route('post.store') }}">
        @csrf {{--クロスサイトリクエストフォージェリ攻撃を防ぐためのもの・ワンタイムトークン(秘密情報)を付加する。 --}}
            <div class="mt-8">
                <div class="w-full flex flex-col">
                    <label for="title" class="font-semibold mt-4">チーム名</label>
                    <x-input-error :messages="$errors->get('title')" class="mt-2" /> {{--バリデーションエラーが起こると、ビュー側に$error変数が受け渡される--}}
                    <input type="text" name="title" class="w-auto py-2 border border-gray-300 rounded-md" id="title" value="{{old('title')}}"> {{--old=バリデーションエラー前の値を残しておく(入力した値を表示したままにしておく)--}}
                </div>
            </div>
            
            {{--オーダー--}}
            <div class="mt-8">
                <label for="team" class="font-semibold mt-4">オーダー</label>
                <div class="flex justify-center w-full bg-green-400">
                    <div class="font-semibold w-64 mt-2 text-center">
                    {{--打順--}}
                    <p class="ml-2 text-center text-2xl my-5">~打順~</p>
                    <select  class="ml-2 mb-3" name="1" id="">
                        <option value="">1番</option>
                        @foreach($players as $id => $player)
                            <option value="{{ $id }}">{{ $player }}</option>
                        @endforeach
                    </select>
                    <select  class="ml-2 mb-3" name="2" id="">
                        <option value="">2番</option>
                        @foreach($players as $id => $player)
                            <option value="{{ $id }}">{{ $player }}</option>
                        @endforeach
                    </select>
                    <select  class="ml-2 mb-3" name="3" id="">
                        <option value="">3番</option>
                        @foreach($players as $id => $player)
                            <option value="{{ $id }}">{{ $player }}</option>
                        @endforeach
                    </select>
                    <select  class="ml-2 mb-3" name="4" id="">
                        <option value="">4番</option>
                        @foreach($players as $id => $player)
                            <option value="{{ $id }}">{{ $player }}</option>
                        @endforeach
                    </select>
                    <select  class="ml-2 mb-3" name="5" id="">
                        <option value="">5番</option>
                        @foreach($players as $id => $player)
                            <option value="{{ $id }}">{{ $player }}</option>
                        @endforeach
                    </select>
                    <select  class="ml-2 mb-3" name="6" id="">
                        <option value="">6番</option>
                        @foreach($players as $id => $player)
                            <option value="{{ $id }}">{{ $player }}</option>
                        @endforeach
                    </select>
                    <select  class="ml-2 mb-3" name="7" id="">
                        <option value="">7番</option>
                        @foreach($players as $id => $player)
                            <option value="{{ $id }}">{{ $player }}</option>
                        @endforeach
                    </select>
                    <select  class="ml-2 mb-3" name="8" id="">
                        <option value="">8番</option>
                        @foreach($players as $id => $player)
                            <option value="{{ $id }}">{{ $player }}</option>
                        @endforeach
                    </select>
                    <select  class="ml-2 mb-3" name="9" id="">
                        <option value="">9番</option>
                        @foreach($players as $id => $player)
                            <option value="{{ $id }}">{{ $player }}</option>
                        @endforeach
                    </select>
                    </div>

                    {{--守備--}}
                    <div class="relative font-semibold w-full mt-4">
                        <div class="absolute bottom-16 left-80 rotate-45 w-60 h-60 bg-yellow-700">
                            <div class="absolute w-4 h-4 top-0 right-0 bg-white" name="firstbase"></div>
                            <div class="absolute w-4 h-4 top-0 left-0 bg-white" name="secondbese"></div>
                            <div class="absolute w-4 h-4 bottom-0 left-0 bg-white" name="thirdbase"></div>
                            <div class="absolute w-4 h-4 bottom-0 right-0 bg-white" name="homebase"></div>
                            <div class="absolute bottom-0 left-0 h-full border-r-4 border-white origin-bottom-right rotate-90" name="leftline"></div>
                            <div class="absolute top-0 right-0 h-full border-r-4 border-white" name="rightline"></div>
                            <select  class="absolute top-24 left-8 -rotate-45 w-40" name="P" id="">
                                <option value="">P</option>
                                @foreach($players as $id => $player)
                                    <option value="{{ $id }}">{{ $player }}</option>
                                @endforeach
                            </select>
                            <select  class="absolute top-48 left-32 -rotate-45 w-40" name="C" id="">
                                <option value="">C</option>
                                @foreach($players as $id => $player)
                                    <option value="{{ $id }}">{{ $player }}</option>
                                @endforeach
                            </select>
                            <select  class="absolute bottom-72 left-48 -rotate-45 w-40" name="1B" id="">
                                <option value="">1B</option>
                                @foreach($players as $id => $player)
                                    <option value="{{ $id }}">{{ $player }}</option>
                                @endforeach
                            </select>
                            <select  class="absolute bottom-60 left-16 -rotate-45 w-40" name="2B" id="">
                                <option value="">2B</option>
                                @foreach($players as $id => $player)
                                    <option value="{{ $id }}">{{ $player }}</option>
                                @endforeach
                            </select>
                            <select  class="absolute top-64 right-56 -rotate-45 w-40" name="3B" id="">
                                <option value="">3B</option>
                                @foreach($players as $id => $player)
                                    <option value="{{ $id }}">{{ $player }}</option>
                                @endforeach
                            </select>
                            <select  class="absolute bottom-24 right-40 -rotate-45 w-40" name="SS" id="">
                                <option value="">SS</option>
                                @foreach($players as $id => $player)
                                    <option value="{{ $id }}">{{ $player }}</option>
                                @endforeach
                            </select>
                            <select  class="absolute bottom-20 right-56 -translate-x-1/2 -rotate-45 w-40" name="LF" id="">
                                <option value="">LF</option>
                                @foreach($players as $id => $player)
                                    <option value="{{ $id }}">{{ $player }}</option>
                                @endforeach
                            </select>
                            <select  class="absolute bottom-64 right-28 -translate-x-1/2 -rotate-45 w-40" name="CF" id="">
                                <option value="">CF</option>
                                @foreach($players as $id => $player)
                                    <option value="{{ $id }}">{{ $player }}</option>
                                @endforeach
                            </select>
                            <select  class="absolute bottom-96 left-20 -rotate-45 w-40" name="RF" id="">
                                <option value="">RF</option>
                                @foreach($players as $id => $player)
                                    <option value="{{ $id }}">{{ $player }}</option>
                                @endforeach
                            </select>
                            <select  class="absolute top-8 left-56 -rotate-45 w-40" name="DH" id="">
                                <option value="">DH</option>
                                @foreach($players as $id => $player)
                                    <option value="{{ $id }}">{{ $player }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            {{--説明--}}
            <div class="w-full flex flex-col">
                <label for="body" class="font-semibold mt-4">説明</label>
                <x-input-error :messages="$errors->get('body')" class="mt-2" /> {{--x-input-errorでinput-error.blade.phpを参照している--}}
                <textarea name="body" class="w-auto py-2 border border-gray-300 rounded-md" id="body" cols="30" rows="5">{{old('body')}}</textarea>
            </div>

            <x-primary-button class="mt-4">
                投稿する
            </x-primary-button>
        </form>
    </div>
</x-app-layout>

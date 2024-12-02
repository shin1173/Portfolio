<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>MY MLB ALLSTAR</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="{{ asset('css/style2.css') }}" type="text/css">
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body class="antialiased backimage">
        <div class="relative min-h-screen">
            @if (Route::has('login'))
                <div class="title">
                    @auth
                        <a href="{{ url('post') }}" class="a-1">
                            <div class="btn">
                                <span>M</span>
                                <span>L</span>
                                <span>B</span>
                                <span> </span>
                                <span>A</span>
                                <span>L</span>
                                <span>L</span>
                                <span>S</span>
                                <span>T</span>
                                <span>A</span>
                                <span>R</span>
                            </div>
                        </a>
                    @else
                        <div class="title-2">
                            <a href="{{ route('login') }}">
                                <div class="btn-2">
                                    <span>L</span>
                                    <span>o</span>
                                    <span>g</span>
                                    <span> </span>
                                    <span>i</span>
                                    <span>n</span>
                                </div>
                            </a>
                            @if (Route::has('register'))
                            <a href="{{ route('register') }}">
                                <div class="btn-3">
                                    <span>R</span>
                                    <span>e</span>
                                    <span>g</span>
                                    <span>i</span>
                                    <span>s</span>
                                    <span>t</span>
                                    <span>e</span>
                                    <span>r</span>
                                </div>
                            </a>
                        </div>
                            @endif
                    @endauth
                </div>
            @endif
            </div>
        </div>
        <script src="{{ asset('js/style.js') }}"></script>
    </body>
</html>

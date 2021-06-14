<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Tweety') }}</title>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

        <!-- Styles -->
        <link href="{{ asset('css/main.css') }}" rel="stylesheet">

        @livewireStyles
    </head>
    <body>
        <div class="app {{ auth()->check() ? 'pt-10' : '' }}">
            @if(!auth()->user())
                <section class="px-8 py-2 mb-4">
                    <header class="container mx-auto py-4">
                        <h1>
                            <a href="{{route('welcome')}}">
                                <img src="{{asset('images/logo.jpeg')}}" alt="Tweety logo">
                            </a>
                        </h1>
                    </header>
                </section>
            @endif

            {{ $slot }}

        </div>

        @livewireScripts
        <script src="https://cdn.jsdelivr.net/gh/livewire/turbolinks@v0.1.x/dist/livewire-turbolinks.js"
                data-turbolinks-eval="false"></script>

    </body>
</html>

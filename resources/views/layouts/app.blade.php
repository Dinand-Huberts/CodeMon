<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
    
        <title>{{ config('app.name', 'Laravel') }}</title>
    
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@500&display=swap" rel="stylesheet">
    
        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/sass.css') }}">
    
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="https://unpkg.com/flowbite@1.3.3/dist/flowbite.js"></script>
    </head>

<body>


    <div class="flex flex-col justify-between">
        @include('header')
        <div
            style="background-image: url('./img/contact-bg2.png'); background-size: cover; background-repeat: no-repeat; background-position: center;">

            <div id="myTabContent">
                <div class="h-screen" id="profiel" role="tabpanel" aria-labelledby="profiel-tab">
                    <div class="home_content backdrop-blur-sm rounded-2xl flex max-h-[75vh] lg:w-[40vw] w-[90vw] flex items-center justify-around overflow-hidden"
                        style="background-color: rgba(125, 125, 125, 0.2)">
                        <div id="text_home" class="m-10">
                            <p class="text-amber-700">PROFIEL:</p> <br>
                            <p><b>Gebruiker -> </b> {{ Auth::user()->name }} </p>
                            <p><b>Email -> </b> {{ Auth::user()->email }} </p>
                        </div>
                    </div>
                </div>

                <div class="hidden" id="kaarten" role="tabpanel" aria-labelledby="kaarten-tab">
                    <div id="dashboard_card" class="min-h-[90vh]">
                        <x-card></x-card>
                    </div>
                </div>


                <div class="hidden h-screen" id="boxes" role="tabpanel" aria-labelledby="boxes-tab">
                    {{ $slot }}
                </div>

                <div class="hidden h-screen" id="quiz" role="tabpanel" aria-labelledby="quiz-tab">
                    <div id="quiz_select"
                        class="home_content backdrop-blur-sm rounded-2xl m-10 flex min-w-[45vw] flex items-center justify-around overflow-hidden"
                        style="background-color: rgba(125, 125, 125, 0.2)">
                        <x-quizselector></x-quizselector>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('footer')
</body>



</html>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/sass.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <script src="https://unpkg.com/flowbite@1.3.3/dist/flowbite.js"></script>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@500&display=swap" rel="stylesheet">
    </head>

<body onload="">


    <div class="flex flex-col justify-between">
        @include('header')
        <div class="relative w-full h-[90vh] -mt-10 z-[1]"
            style="background-image: url('./img/contact-bg2.png'); background-size: cover; background-repeat: no-repeat; background-position: center;">
            <div class="mb-4 mt-10  dark:border-gray-700">
                <ul class="flex flex-wrap -mb-px" id="myTab" data-tabs-toggle="#myTabContent" role="tablist">
                    <li class="mr-5 ml-10 mt-5 mb-5 tabs" role="presentation">
                        <button
                            class="transition transform hover:-translate-y-1 motion-reduce:transition-none motion-reduce:hover:transform-none m-5 hover:underline hover:text-[#F59E0B] text-lg"
                            id="profiel-tab" data-tabs-target="#profiel" type="button" role="tab"
                            aria-controls="profiel" aria-selected="true">Profiel</button>
                    </li>
                    <li class="mr-5 mt-5 tabs" role="presentation">
                        <button
                            class="transition transform hover:-translate-y-1 motion-reduce:transition-none motion-reduce:hover:transform-none m-5 hover:underline hover:text-[#F59E0B] text-lg"
                            id="kaarten-tab" data-tabs-target="#kaarten" type="button" role="tab"
                            aria-controls="kaarten" aria-selected="false">Kaarten</button>
                    </li>
                    <li class="mr-5 mt-5 tabs" role="presentation">
                        <button
                            class="transition transform hover:-translate-y-1 motion-reduce:transition-none motion-reduce:hover:transform-none m-5 hover:underline hover:text-[#F59E0B] text-lg"
                            id="boxes-tab" data-tabs-target="#boxes" type="button" role="tab" aria-controls="boxes"
                            aria-selected="false">Boxes</button>
                    </li>
                    <li class="mt-5 tabs" role="presentation">
                        <button
                            class="transition transform hover:-translate-y-1 motion-reduce:transition-none motion-reduce:hover:transform-none m-5 hover:underline hover:text-[#F59E0B] text-lg"
                            id="quiz-tab" data-tabs-target="#quiz" type="button" role="tab" aria-controls="quiz"
                            aria-selected="false">Quiz</button>
                    </li>
                </ul>
            </div>

            <div id="myTabContent">
                <div class="" id="profiel" role="tabpanel" aria-labelledby="profiel-tab">
                    <div class="home_content backdrop-blur-sm rounded-2xl flex max-h-[75vh] lg:w-[40vw] w-[90vw] flex items-center justify-around overflow-hidden"
                        style="background-color: rgba(125, 125, 125, 0.2)">
                        <div id="text_home" class="m-10">
                            <p class="text-amber-600">PROFIEL:</p> <br>
                            <p><b>Gebruiker -> </b> {{ Auth::user()->name }} </p>
                            <p><b>Email -> </b> {{ Auth::user()->email }} </p>
                        </div>
                    </div>
                </div>

                <div class="hidden" id="kaarten" role="tabpanel" aria-labelledby="kaarten-tab">
                    <div id="dashboard_card" class="">
                        <x-card></x-card>
                    </div>
                </div>
            </div>

            <div class="hidden" id="boxes" role="tabpanel" aria-labelledby="boxes-tab">
               {{ $slot }}
            </div>

            <div class="hidden" id="quiz" role="tabpanel" aria-labelledby="quiz-tab">
                <div class="home_content backdrop-blur-sm rounded-2xl flex max-h-[75vh] min-w-[45vw] flex items-center justify-around overflow-hidden"
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

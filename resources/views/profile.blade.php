<x-app-layout>
    <div class="h-screen" id="profiel">
        <div class="home_content backdrop-blur-sm rounded-2xl flex max-h-[75vh] lg:w-[40vw] w-[90vw] flex items-center justify-around overflow-hidden"
            style="background-color: rgba(125, 125, 125, 0.2)">
            <div id="text_home" class="m-10">
                <p class="text-amber-700">PROFIEL:</p> <br>
                <p><b>Gebruiker -> </b> {{ Auth::user()->name }} </p>
                <p><b>Email -> </b> {{ Auth::user()->email }} </p>
            </div>
        </div>
</x-app-layout>

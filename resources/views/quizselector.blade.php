<x-app-layout onload="{{$onload}}">
    <div class="h-screen" id="quiz">
        <div id="quiz_select"
            class="home_content backdrop-blur-sm rounded-2xl m-10 flex min-w-[45vw] flex items-center justify-around overflow-hidden"
            style="background-color: rgba(125, 125, 125, 0.2)">

            @if ($quiz_cooldown == true)
                <form action="./quiz" method="GET">
                    <select name="difficulty">
                        <option value="1">Easy</option>
                        <option value="2">Normal</option>
                        <option value="3">Hard</option>
                        <option value="4">Extreme</option>
                        <option value="5">Nightmare</option>
                    </select>
                    <button
                        class="text-black bg-red-600 hover:bg-red-600 focus:ring-amber-500 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-3 md:mr-0 dark:bg-red-600 dark:hover:bg-red-600 dark:focus:ring-amber-500 m-10 "
                        type="submit">Make a quiz!</button>
                </form>
            @else
                <script type="text/javascript">
                    {{ $onload }}
                </script>

                <div class="text-xl" id="quiz_cooldown_message">
                    You already made a quiz! You can make one again after: <br>
                </div>
                <p class="" id="timeleft"></p>
            @endif

        </div>
    </div>
</x-app-layout>

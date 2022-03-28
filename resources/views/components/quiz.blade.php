@if ($quiz_cooldown == true)
    <div id="box" class="backdrop-blur-sm rounded-2xl"
        style="background-color: rgba(125, 125, 125, 0.2); width: 50vw; height: auto; padding:25px; margin-top:20vh; margin-bottom: 40vh">

        <div class="flex justify-center">
            <form id="quiz" action="/dashboard" method="GET">
                {!! $quiz_question !!}
                <div class="flex justify-center">
                    <button
                        class="left-[50%] right-[50%] text-black bg-red-600 hover:bg-red-600 focus:ring-amber-500 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-3 md:mr-0 dark:bg-red-600 dark:hover:bg-red-600 dark:focus:ring-amber-500" style="margin: 25px">Submit</button>
                </div>
            </form>
        </div>
    </div>
   
@endif

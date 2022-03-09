@include('includes')
<?php

//Get and set user_id
$user_id = Auth::id();

//Set cooldown variables
$cooldown_query = DB::table('users')->where('id', '=', $user_id)->get();
$cooldown_string = $cooldown_query[0]->quiz_cooldown;
$cooldown = strtotime($cooldown_string);
$cooldown_until = $cooldown + 14400;
$time = time();
$interval = $time - $cooldown;
//Cooldown check
if ($interval >= 14400) {
    $onload = '';
    $quiz_cooldown_check = true;
} elseif ($interval < 14400) {
    $onload = 'countdown_quiz(' . $cooldown_until  . ')';
    $quiz_cooldown_check = false;
}

if ($_GET) {
    session_start();
    if (isset($_SESSION['quiz_id'])) {
        //get and set user_id
        $user_id = Auth::id();

        //Get quiz info with corresponding id
        $quiz = DB::table('quizzes')
            ->where('id', '=', $_SESSION['quiz_id'])
            ->get();
        $quiz_answer = $quiz[0]->quiz_answer;
        $quiz_difficulty = $quiz[0]->quiz_difficulty;
        $user_answer_boolean = $_GET['user_answer'] == $quiz_answer;
        if ($user_answer_boolean) {
            $users_data = ['quiz_cooldown' => date('Y-m-d, H:i:s', time())];
            $boxes_data = ['user_id' => $user_id, 'box_difficulty' => $quiz_difficulty];
            DB::table('boxes')->insert($boxes_data);
            DB::table('users')
                ->where('id', '=', $user_id)
                ->update($users_data);
            echo "<script>alert('Goed antwoord!')</script>";
        } else {
            echo "<script>alert('Fout antwoord!')</script>";
        }

        unset($_SESSION['quiz_id']);
    } else {
        //reroute user to page with no parameters
        $host = $_SERVER['HTTP_HOST'];
        $uri = 'codemon.test/';
        header('Location: /dashboard');
        exit();
    }
}
?>

<body onload="{{$onload}}">


    <div class="flex flex-col justify-between">
        @include('header')
        <div class="relative w-full h-[90vh] -mt-10 z-[1]"
            style="background-image: url('./img/contact-bg2.png'); background-size: cover; background-repeat: no-repeat; background-position: center;">
            <div class="mb-4 mt-10  dark:border-gray-700">
                <ul class="flex flex-wrap -mb-px" id="myTab" data-tabs-toggle="#myTabContent" role="tablist">
                    <li class="mr-5 ml-10 mt-5 mb-5" role="presentation">
                        <button
                            class="transition transform hover:-translate-y-1 motion-reduce:transition-none motion-reduce:hover:transform-none m-5 hover:underline hover:text-[#F59E0B] text-lg"
                            id="profiel-tab" data-tabs-target="#profiel" type="button" role="tab"
                            aria-controls="profiel" aria-selected="true">Profiel</button>
                    </li>
                    <li class="mr-5 mt-5" role="presentation">
                        <button
                            class="transition transform hover:-translate-y-1 motion-reduce:transition-none motion-reduce:hover:transform-none m-5 hover:underline hover:text-[#F59E0B] text-lg"
                            id="kaarten-tab" data-tabs-target="#kaarten" type="button" role="tab"
                            aria-controls="kaarten" aria-selected="false">Kaarten</button>
                    </li>
                    <li class="mr-5 mt-5" role="presentation">
                        <button
                            class="transition transform hover:-translate-y-1 motion-reduce:transition-none motion-reduce:hover:transform-none m-5 hover:underline hover:text-[#F59E0B] text-lg"
                            id="boxes-tab" data-tabs-target="#boxes" type="button" role="tab" aria-controls="boxes"
                            aria-selected="false">Boxes</button>
                    </li>
                    <li class="mt-5" role="presentation">
                        <button
                            class="transition transform hover:-translate-y-1 motion-reduce:transition-none motion-reduce:hover:transform-none m-5 hover:underline hover:text-[#F59E0B] text-lg"
                            id="quiz-tab" data-tabs-target="#quiz" type="button" role="tab" aria-controls="quiz"
                            aria-selected="false">Quiz</button>
                    </li>
                </ul>
            </div>

            <div id="myTabContent">
                <div class="" id="profiel" role="tabpanel" aria-labelledby="profiel-tab">
                    <div class="home_content backdrop-blur-sm rounded-2xl flex max-h-[75vh] min-w-[45vw] flex items-center justify-around overflow-hidden"
                        style="background-color: rgba(125, 125, 125, 0.2)">
                        <div id="text_home" class="m-10">
                            <p>PROFIEL:</p> <br>
                            <p><b>Gebruiker -> </b> {{ Auth::user()->name }} </p>
                            <p><b>Email -> </b> {{ Auth::user()->email }} </p>
                            <p><b>Pashword hash -> </b> {{ Auth::user()->password }} </p>
                        </div>
                    </div>
                </div>

                <div class="hidden" id="kaarten" role="tabpanel" aria-labelledby="kaarten-tab">
                    <div id="text_home" class="">
                        <x-card></x-card>
                    </div>
                </div>
            </div>

            <div class="hidden" id="boxes" role="tabpanel" aria-labelledby="boxes-tab">
                <x-box></x-box>
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
</body>
@include('footer')

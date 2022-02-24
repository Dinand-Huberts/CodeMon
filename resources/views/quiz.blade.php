<!doctype html>
<html>

<head>

    @include('includes')

</head>

<body>

    <div class="flex flex-col h-screen justify-between">
        @include('header')


        @foreach ($quizzes as $quiz)
            <br>
            {{ $random = rand(1, 4) }}
            <div id="quiz">
                <div id="question">{{ $quiz->quiz_question }}</div>
                <div id="user_answer">Antwoord?
                    <div id="a">A</div>
                    <div id="b"> {{ $quiz->quiz_answer }}</div>
                    <div id="c">C</div>
                    <div id="d">D</div>
                </div>
                <div id="answer" class="hidden">{{ $quiz->quiz_answer }}</div>
            </div>
        @endforeach
        @include('footer')

    </div>
</body>

</html>
@include('includes')

<body>
    <div class="flex flex-col justify-between">
        @include('header')
        <div class="w-full h-[90vh] -mt-10 z-[1] flex justify-center align-center sm:"
            style="background-image: url('./img/contact-bg2.png'); background-size: cover; background-repeat: no-repeat; background-position: center;">
            <div class="home_content backdrop-blur-sm rounded-2xl flex max-h-[75vh] w-[80vw]"
                style="background-color: rgba(125, 125, 125, 0.2)">
                <div id="image_home" class="image_home h-[35%] w-[35%] p-6">
                    <img src="./img/kaart.png" alt="kaart">
                </div>
                <div id="text_home" class="ml-[3%] w-[80%] p-6 text-center text-xl">
                    <div id="text-title" class="ml-[3%] w-[80%] p-6 text-center text-4xl font-bold">
                        Play the quiz and win the Codemon cards!
                    </div>
                    What do you know about web development? Play the quiz and test your knowledge or learn something new
                    about web development. Maybe it's something for you. If you anwser the questions right you will win
                    a teacher Codemon card! There are 5 different rarities. Sign in or create an account to start a
                    quiz!<br>
                    @if (Auth::check())
                    <button type="submit"
                    class="text-black bg-red-600 hover:bg-red-700 focus:ring-amber-500 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-3 md:mr-0 dark:bg-red-600 mt-10">
                    <a href="/dashboard">Dashboard</a></button>
                    @else
                    <button type="submit"
                    class="text-black bg-red-600 hover:bg-red-700 focus:ring-amber-500 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-3 md:mr-0 dark:bg-red-600 mt-10">
                    <a href="/login">Login</a></button>
                    @endif

                </div>
            </div>
        </div>
    </div>
</body>
@include('footer')
</html>

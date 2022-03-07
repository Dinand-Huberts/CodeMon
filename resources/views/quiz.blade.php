<!doctype html>
<html>

<head>

    @include('includes')

</head>

<body>
    <div class="flex flex-col justify-between">
            @include('header')
            <div class="relative w-full h-[90vh] -mt-10 z-[1]"
            style="background-image: url('./img/contact-bg2.png'); background-size: cover; background-repeat: no-repeat; background-position: center;">


            <x-quiz></x-quiz>


           
        </div>
        @include('footer')
    </div>
</body>

</html>

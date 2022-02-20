<!doctype html>
<html>

<head>
    <?php
    include('../resources/views/includes.php');
    ?>
</head>

<body>
<div class="flex flex-col h-screen justify-between">
<div class="relative w-full h-[90vh] z-[1]" style="background-image: url('./img/register-bg.png'); background-size: cover; background-repeat: no-repeat; background-position: center;">

            <?php
            include('../resources/views/header.blade.php');
            ?>
            <div class="absolute px-8 py-6 mx-auto mt-4 left-0 right-0 text-left shadow-lg md:w-1/2 lg:w-1/2 sm:w-1/2 backdrop-blur-sm border sm:rounded-md border-gray-300" style="background-color: rgba(125,125,125,0.2);">
                <div class="flex justify-center">
                    <img class="w-20 h-20" src="https://upload.wikimedia.org/wikipedia/commons/9/98/International_Pok%C3%A9mon_logo.svg"></img>
                </div>
                <h3 class="text-2xl font-bold text-center">Join us</h3>
                <form action="">
                    <div class="mt-4">
                        <div>
                            <label class="block" for="Name">Name<label>
                                    <input type="text" placeholder="Name" class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600">
                        </div>
                        <div class="mt-4">
                            <label class="block" for="email">Email<label>
                                    <input type="text" placeholder="Email" class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600">
                        </div>
                        <div class="mt-4">
                            <label class="block">Password<label>
                                    <input type="password" placeholder="Password" class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600">
                        </div>
                        <div class="mt-4">
                            <label class="block">Confirm Password<label>
                                    <input type="password" placeholder="Password" class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600">
                        </div>
                        <span class="hidden text-xs text-red-400">Password must be same!</span>
                        <!-- alert wanneer wachtwoorden niet overeenkomen. -->
                        <div class="flex">
                            <button class="w-full px-6 py-2 mt-4 text-white bg-blue-600 rounded-lg hover:bg-blue-900">Create
                                Account</button>
                        </div>
                        <div class="mt-6 text-grey-dark">
                            Already have an account?
                            <a class="text-blue-600 hover:underline" href="./login">
                                Log in
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <?php
        include('../resources/views/footer.blade.php');
        ?>

    </div>
</body>

</html>
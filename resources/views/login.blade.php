<!doctype html>
<html>

<head>
    <?php
    include('../resources/views/includes.php');
    ?>
</head>

<body>
    <div class="flex flex-col h-screen justify-between">

        <?php
        include('../resources/views/header.blade.php');
        ?>

        <div class="relative w-full h-[90vh] -mt-10 z-[1]" style="background-image: url('./img/contact-bg2.png'); background-size: cover; background-repeat: no-repeat; background-position: center;">
            <div class="block w-full md:w-96 md:max-w-full mx-auto my-[7%] absolute left-0 right-0">
                <div class="p-6 border border-gray-300 sm:rounded-md backdrop-blur-sm" style="background-color: rgba(125,125,125,0.1);">
                    <div class="flex justify-center">
                        <img class="w-20 h-20" src="https://upload.wikimedia.org/wikipedia/commons/9/98/International_Pok%C3%A9mon_logo.svg"></img>
                    </div>
                    <form method="POST" action="/">
                        <h3 class="text-2xl font-bold text-center">Login</h3>
                        <label class="block mb-6">
                            <span class="text-gray-700">Your name</span>
                            <input type="text" name="name" class="block w-full mt-1 p-2 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" placeholder="Joe" />
                        </label>
                        <label class="block mb-6">
                            <span class="text-gray-700">Email address</span>
                            <input name="email" type="email" class="block w-full mt-1 p-2 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" placeholder="joe@example.com" required />
                        </label>
                        <button class="w-full px-6 py-2 mt-4 text-white bg-blue-600 rounded-lg hover:bg-blue-900">Login</button>
                        <div class="mt-6 text-grey-dark">
                            Don't have an account?
                            <a class="text-blue-600 hover:underline" href="./register">
                                Log in
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <?php
        include('../resources/views/footer.blade.php');
        ?>

    </div>
</body>

</html>
<!doctype html>
<html>

<head>
    @include('includes')
</head>

<body>
    <div class="flex flex-col  justify-between">
    
    @include('header')


        <div class="relative w-full h-[90vh] -mt-10 z-[1]" style="background-image: url('./img/contact-bg2.png'); background-size: cover; background-repeat: no-repeat; background-position: center;">
            <div class="block w-full md:w-96 md:max-w-full mx-auto my-[7%] absolute left-0 right-0 mb-auto">
                <div class="p-6 border border-gray-300 sm:rounded-md backdrop-blur-sm" style="background-color: rgba(125,125,125,0.1);">
                    <div class="flex justify-center">
                        <img class="w-20 h-20" src="https://upload.wikimedia.org/wikipedia/commons/9/98/International_Pok%C3%A9mon_logo.svg"></img>
                    </div>

                    <!-- Session Status -->
                    <x-auth-session-status class="mb-4" :status="session('status')" />

                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <h3 class="text-2xl font-bold text-center">Login</h3>

                        <!-- Email -->
                        <x-label class="block" for="email" :value="__('Email')" />

                        <x-input type="text" id="email" name="email" :value="old('email')" class="block w-full mt-1 p-2 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" placeholder="Email" required autofocus />
                        <br>

                        <!-- Password -->
                        <x-label class="block" for="password" :value="__('Password')" />

                        <input id="password" class="block w-full mt-1 p-2 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="password" type="password" placeholder="Password" required autocomplete="current-password" />
                        </label>

                        <!-- <div class="flex items-center justify-end mt-4">
                            @if (Route::has('password.request'))
                            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                            @endif
                        </div> -->


                        <button class="w-full px-6 py-2 mt-4 text-white bg-blue-600 rounded-lg hover:bg-blue-900">Login</button>

                        <div class="mt-6 text-grey-dark">
                            Don't have an account?
                            <a class="text-blue-600 hover:underline" href="{{ route('login') }}">
                                Register
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>



    </div>
    @include('footer')
    
</body>

</html>
<x-guest-layout>

    <div class="flex flex-col  justify-between">

        <div class="relative w-full h-[90vh] z-[1]" style="background-image: url('./img/register-bg.png'); background-size: cover; background-repeat: no-repeat; background-position: center; margin-top :0rem;">

            <div class="px-8 py-6 mx-auto mt-4 left-0 right-0 text-left shadow-lg lg:w-1/2 sm:w-1/2 backdrop-blur-sm border sm:rounded-md border-gray-300" style="background-color: rgba(125,125,125,0.2);" id="register">
                <div class="flex justify-center">
                    <img class="w-20 h-20" src="https://upload.wikimedia.org/wikipedia/commons/9/98/International_Pok%C3%A9mon_logo.svg"></img>
                </div>
                <h3 class="text-2xl font-bold text-center">Join us</h3>

                <!--  Errors -->
                <x-auth-validation-errors class="mb-4" :errors="$errors" />

                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="mt-4">
                        <!-- Name -->
                        <div>
                            <x-label class="block" for="name" :value="__('Name')" />

                            <x-input id="name" type="text" name="name" placeholder="Name" :value="old('name')" class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600" required autofocus />
                        </div>

                        <!-- Email -->
                        <div class="mt-4">
                            <x-label class="block" for="email" :value="__('Email')" />

                            <x-input id="email" placeholder="Email" type="email" name="email" :value="old('email')" class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600" required />
                        </div>

                        <!-- Password -->
                        <div class="mt-4">
                            <x-label for="password" class="block" :value="__('Password')" />

                            <x-input id="password" class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600" type="password" name="password" placeholder="Password" required autocomplete="new-password" />
                        </div>

                        <!-- Confirm Password -->
                        <div class="mt-4">
                            <x-label for="password-confirmation" :value="__('Confirm Password')" class="block" />

                            <x-input id="password_confirmation" class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600" type="password" name="password_confirmation" required placeholder="Password Confirmation" />
                        </div>

                        <span class="hidden text-xs text-red-400">Password must be same!</span>
                        <!-- alert wanneer wachtwoorden niet overeenkomen. -->
                        <div class="flex">
                            <button class="w-full px-6 py-2 mt-4 text-white bg-blue-600 rounded-lg hover:bg-blue-900">Create
                                Account</button>
                        </div>
                        <div class="mt-6 text-grey-dark">
                            Already have an account?
                            <a class="text-blue-600 hover:underline" href="{{ route('login') }}">
                                Log in
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>


    </div>
</x-guest-layout>


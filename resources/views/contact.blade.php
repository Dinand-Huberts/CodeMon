<x-guest-layout>
    <div class="flex flex-col justify-between">

        <div class="relative w-full h-[90vh] -mt-10 z-[1]"
            style="background-image: url('./img/contact-bg2.png'); background-size: cover; background-repeat: no-repeat; background-position: center; margin-top :0rem;">
            <div class="block w-full md:w-96 md:max-w-full mx-auto my-[7%] absolute left-0 right-0">
                <div class="p-6 border border-gray-300 sm:rounded-md backdrop-blur-sm"
                    style="background-color: rgba(125,125,125,0.1);">
                    <form method="POST" action="/">
                        <h3 class="text-2xl font-bold text-center">Contact</h3>
                        <label class="block mb-6">
                            <span class="text-gray-700">Your name</span>
                            <input type="text" name="name"
                                class=" block  w-full mt-1 p-2 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                placeholder="Joe" />
                        </label>
                        <label class="block mb-6">
                            <span class="text-gray-700">Email address</span>
                            <input name="email" type="email"
                                class="  block w-full mt-1 p-2 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                placeholder="joe@example.com" required />
                        </label>
                        <label class="block mb-6">
                            <span class="text-gray-700">Message</span>
                            <input name="message" type="message"
                                class=" block w-full mt-1 p-2 pb-8 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                placeholder="Tell us what you're thinking about!" required />
                        </label>
                        <div class="mb-6">
                            <button type="submit"
                                class="text-black bg-red-600 hover:bg-red-700 focus:ring-amber-500 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-3 md:mr-0 dark:bg-red-600 dark:hover:bg-red-600 dark:focus:ring-amber-500">
                                Contact Us
                            </button>
                        </div>
                        <div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-guest-layout>

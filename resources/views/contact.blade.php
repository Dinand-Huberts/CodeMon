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

<div class="relative w-full h-[50rem] -mt-10 z-[-1]" style="background-image: url('./img/contact-bg.png'); background-size: fit; background-repeat: no-repeat; background-position: center;">
<div class="block w-full md:w-96 md:max-w-full mx-auto my-[7%] absolute left-0 right-0">
  <div class="p-6 border border-gray-300 sm:rounded-md backdrop-blur-sm" style="background-color: rgba(125,125,125,0.1);">
    <form method="POST" action="/">
    <h3 class="text-2xl font-bold text-center">Contact</h3>
      <label class="block mb-6">
        <span class="text-gray-700">Your name</span>
        <input
          type="text"
          name="name"
          class="
            block 
            w-full
            mt-1
            p-2
            border-gray-300
            rounded-md
            shadow-sm
            focus:border-indigo-300
            focus:ring
            focus:ring-indigo-200
            focus:ring-opacity-50
          "
          placeholder="Joe"
        />
      </label>
      <label class="block mb-6">
        <span class="text-gray-700">Email address</span>
        <input
          name="email"
          type="email"
          class=" 
            block
            w-full
            mt-1
            p-2
            border-gray-300
            rounded-md
            shadow-sm
            focus:border-indigo-300
            focus:ring
            focus:ring-indigo-200
            focus:ring-opacity-50
          "
          placeholder="joe@example.com"
          required
        />
      </label>
      <label class="block mb-6">
        <span class="text-gray-700">Message</span>
        <input
          name="message"
          type="message"
          class="
            block
            w-full
            mt-1
            p-2
            pb-8
            border-gray-300
            rounded-md
            shadow-sm
            focus:border-indigo-300
            focus:ring
            focus:ring-indigo-200
            focus:ring-opacity-50
          "
          placeholder="Tell us what you're thinking about!"
          required
        />
      </label>
      <div class="mb-6">
        <button
          type="submit"
          class="
            h-10
            px-5
            text-indigo-100
            bg-indigo-700
            rounded-lg
            transition-colors
            duration-150
            focus:shadow-outline
            hover:bg-indigo-800
          "
        >
          Contact Us
        </button>
      </div>
      <div>
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
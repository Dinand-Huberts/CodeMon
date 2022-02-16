<!doctype html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link href="{{ asset('css/sass.css') }}" rel="stylesheet">
  <link href="{{ asset('css/main.css') }}" rel="stylesheet">
  <link href="{{ asset('js/app.js') }}" rel="text/javascript">
  <script src="https://unpkg.com/flowbite@1.3.3/dist/flowbite.js"></script>
</head>

<body>

  <?php
  include('../resources/views/header.blade.php'); 
  ?>
<div class="fixed w-full" style="background-image: url('/img/contact-bg.png'); background-size: contain; height: 70%;">
<div class="w-full md:w-96 md:max-w-full mx-auto my-10 sticky">
  <div class="p-6 border border-gray-300 sm:rounded-md backdrop-blur-sm">
    <form method="POST" action="/">
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
          name="email"
          type="email"
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

</html>
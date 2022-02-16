<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="{{ asset('/css/app.css') }}" rel="stylesheet">
<link href="{{ asset('/css/sass.css') }}" rel="stylesheet">
<link href="{{ asset('/css/main.css') }}" rel="stylesheet">
<link href="{{ asset('/js/app.js') }}" rel="text/javascript">
<script src="https://unpkg.com/flowbite@1.3.3/dist/flowbite.js"></script>
</head>
<body>

<?php
include('../resources/views/header.blade.php');
?>

<div class="w-max" style="background-color:red;">Test</div>

<?php
include('../resources/views/footer.blade.php');
?>
</body>
</html>
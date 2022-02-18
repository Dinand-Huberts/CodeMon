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

<!-- Title + logo -->

<div class="parallax">
    <div id="group6" class="parallax__group">
      <div class="parallax__layer parallax__layer--back relative w-full h-[400vh]" style="background-image: url('./img/home-bg.png'); background-size: cover; background-repeat: no-repeat; background-position: center;">
      </div>
      <div class="parallax__layer parallax__layer--base">
        <div class="title">Base Layer</div>
      </div>
    </div>
  </div>

<!-- Page content -->



<?php
include('../resources/views/footer.blade.php');
?>
</div>
</body>
</html>
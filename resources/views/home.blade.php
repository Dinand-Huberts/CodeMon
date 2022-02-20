<!doctype html>
<html>

<head>
  <?php
  include('../resources/views/includes.php');
  ?>
</head>

<body>
<div class="parallax">
    <?php
    include('../resources/views/header.blade.php');
    ?>

    <!-- Title + logo -->




    <div id="group3" class="parallax__group absolute">
      <div class="parallax__layer parallax__layer--fore">
        <div class="title">Foreground Layer</div>
      </div>
      <div class="parallax__layer parallax__layer--base">
        <div class="h-[400vh] w-screen" style="background-image: url('./img/home-bg.png'); background-size: cover; background-repeat: no-repeat; background-position: center;"></div>
      </div>
    </div>
    <div id="group3" class="parallax__group absolute">
      <div class="parallax__layer parallax__layer--fore">
        <div class="title">Foreground Layer</div>
      </div>
    </div>
    <div id="group3" class="parallax__group absolute">
      <div class="parallax__layer parallax__layer--fore">
        <div class="title">Foreground Layer</div>
      </div>
    </div>
    <div id="group3" class="parallax__group absolute">
      <div class="parallax__layer parallax__layer--fore">
        <div class="title">Foreground Layer</div>
      </div>
    </div>

    <!-- Page content -->



    <?php
    include('../resources/views/footer.blade.php');
    ?>
    </div>
</body>

</html>
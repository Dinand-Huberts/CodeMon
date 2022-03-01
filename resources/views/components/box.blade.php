@php
//set the username
    $user_name = Auth::user()->name;

//get time of user and set corresponding greeting
    $time = date("H");
    $timezone = date("e");
    if ($time < "12") {
        $greeting = "Goedemorgen";
    } else
    if ($time >= "12" && $time < "17") {
        $greeting = "Goedemiddag";
    } else
    if ($time >= "17" && $time < "19") {
        $greeting = "Goedenavond";
    } else
    if ($time >= "19") {
        $greeting = "Goedenacht";
    }

//get all boxes
    $box_amount=0;
    foreach ($boxes as $box) {
        $box_amount++;
    }

//set the box plural
    if ($box_amount == 0) {
        $box_plural =  " boxes.";
    } elseif ($box_amount == 1) {
        $box_plural =  " ongeopende box.";
    } else {
        $box_plural =  " ongeopende boxes.";
    }
@endphp
<div id="box_alert" class="hidden text-xl sticky top-10">
    {{$greeting . " ". $user_name . "! Je hebt " }} <b> {{ $box_amount }} </b> {{ " " . $box_plural }}
    <div class="round-time-bar bg-amber-500" data-style="smooth" style="--duration: 4;">
        <div></div>
    </div>
</div>

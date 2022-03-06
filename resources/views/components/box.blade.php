@php
//set the username
$user_name = Auth::user()->name;

//get all boxes
$box_amount = 0;
foreach ($boxes as $box) {
    $box_amount++;
}

//set the box plural
if ($box_amount == 0) {
    $box_plural = ' boxes.';
} elseif ($box_amount == 1) {
    $box_plural = ' unused box.';
} else {
    $box_plural = ' unused boxes.';
}
@endphp


{{-- old alert --}}
{{-- <div id="box_alert" class="hidden text-xl sticky top-10">
    {{$greeting . " ". $user_name . "! You have " }} <b> {{ $box_amount }} </b> {{ " " . $box_plural }}
    <div class="round-time-bar bg-amber-500" data-style="smooth" style="--duration: 4;">
        <div></div>
    </div>
</div> --}}
<div class="home_content backdrop-blur-sm rounded-2xl flex max-h-[75vh] min-w-[45vw] flex items-center justify-around overflow-hidden"
    style="background-color: rgba(125, 125, 125, 0.2)">
    <div id="text_home" class="m-10">
        <div id="boxes">
            @foreach ($boxes as $box)
                <div id="box">
                    <div id="difficulty">{{ $box->box_difficulty }}</div>
                </div>
            @endforeach
        </div>
    </div>
</div>

<div class="home_content backdrop-blur-sm rounded-2xl flex center"
    style="background-color: rgba(125, 125, 125, 0.2); width: 80%; height: auto;">

    
    <div id="wrapper" class="m-10">
        <p> Aantal boxes: {{$box_count}}</p>

        <p>current box difficulty: {{$boxes_current->box_difficulty}} </p> 
        <br>
        
        <button type="submit" class="text-black bg-red-600 hover:bg-red-600 focus:ring-amber-500 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-3 md:mr-0 dark:bg-red-600 dark:hover:bg-red-600 dark:focus:ring-amber-500">Open current box!</button>
        {{-- <x-card></x-card> --}}
    </div>

</div>













{{-- DB::table('boxes')->insert([
    'box_activated' => 1
]); --}}


{{-- @foreach ($boxes as $box)
        <div class="container">
            <div class="m-10">
                <div class="box-body">
                    <img class="img" src="https://via.placeholder.com/150">
                    <div class="box-lid">
                        <div class="box-bowtie"></div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach --}}
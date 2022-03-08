
<div class="home_content backdrop-blur-sm rounded-2xl flex"
    style="background-color: rgba(125, 125, 125, 0.2); width: 85%; height: auto;">



    @foreach ($boxes as $box)
        <div class="container">
            <div class="m-10">
                <div class="box">
                    <div class="box-body">
                        <x-card>

                        <img class="img" src="https://via.placeholder.com/150"></x-card>
                        <div class="box-lid">

                            <div class="box-bowtie"></div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>

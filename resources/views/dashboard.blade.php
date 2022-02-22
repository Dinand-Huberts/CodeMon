@include ('includes')


<div class="flex flex-col justify-between">

@include ('header')


<div class="relative w-full h-[90vh] -mt-10 z-[1]" style="background-image: url('./img/contact-bg2.png'); background-size: cover; background-repeat: no-repeat; background-position: center;">
  
<div class="mb-4 mt-10  dark:border-gray-700">
    <ul class="flex flex-wrap -mb-px" id="myTab" data-tabs-toggle="#myTabContent" role="tablist">
        <li class="mr-5 ml-10 mt-5 mb-5"  role="presentation">
            <button class="transition transform hover:-translate-y-1 motion-reduce:transition-none motion-reduce:hover:transform-none m-5 hover:underline hover:text-[#F59E0B]" id="profile-tab" data-tabs-target="#profiel" type="button" role="tab" aria-controls="profiel" aria-selected="false">Profiel</button>
        </li>
        <li class="mr-5 mt-5" role="presentation">
            <button class="transition transform hover:-translate-y-1 motion-reduce:transition-none motion-reduce:hover:transform-none m-5 hover:underline hover:text-[#F59E0B]" id="dashboard-tab" data-tabs-target="#kaarten" type="button" role="tab" aria-controls="kaarten" aria-selected="true">Kaarten</button>
        </li>
        <li class="mr-5 mt-5" role="presentation">
            <button class="transition transform hover:-translate-y-1 motion-reduce:transition-none motion-reduce:hover:transform-none m-5 hover:underline hover:text-[#F59E0B]" id="settings-tab" data-tabs-target="#keys" type="button" role="tab" aria-controls="keys" aria-selected="false">Keys</button>
        </li>
        <li class="mt-5" role="presentation">
            <button class="transition transform hover:-translate-y-1 motion-reduce:transition-none motion-reduce:hover:transform-none m-5 hover:underline hover:text-[#F59E0B]" id="contacts-tab" data-tabs-target="#quiz" type="button" role="tab" aria-controls="quiz" aria-selected="false">Quiz</button>
        </li>
    </ul>
</div>

<div id="myTabContent">
    <div class="" id="profiel" role="tabpanel" aria-labelledby="profile-tab">
        <div class="home_content backdrop-blur-sm rounded-2xl flex max-h-[75vh]" style="background-color: rgba(125, 125, 125, 0.2)">
            <div id="text_home" class="m-10">
                <p>PROFIEL</p>
            </div>
        </div>    
    </div>
   
    <div class="" id="kaarten" role="tabpanel" aria-labelledby="dashboard-tab">
        <div class="home_content backdrop-blur-sm rounded-2xl flex max-h-[75vh]" style="background-color: rgba(125, 125, 125, 0.2)">
            <div id="text_home" class="m-10">
                <p>KAARTEN</p>
            </div>
        </div>      
    </div>
   
    <div class="" id="keys" role="tabpanel" aria-labelledby="settings-tab">
        <div class="home_content backdrop-blur-sm rounded-2xl flex max-h-[75vh]" style="background-color: rgba(125, 125, 125, 0.2)">
            <div id="text_home" class="m-10">
                <p>KEYS</p>
            </div>
        </div>  
    </div>
    
    <div class="" id="quiz" role="tabpanel" aria-labelledby="settings-tab">
        <div class="home_content backdrop-blur-sm rounded-2xl flex max-h-[75vh]" style="background-color: rgba(125, 125, 125, 0.2)">
            <div id="text_home" class="m-10">
                <p>QUIZ</p>
            </div>
        </div>  
    </div>
</div>

<a href="/quiz"  type="button" class="mt-40 ml-10 text-black bg-red-600 hover:bg-red-600 focus:ring-amber-500 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-3 md:mr-0 dark:bg-red-600 dark:hover:bg-red-600 dark:focus:ring-amber-500">Quiz</a>


    

</div>


</div>

@include ('footer')
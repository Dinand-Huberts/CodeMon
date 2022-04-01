<x-app-layout>
    <div id="kaarten" role="tabpanel" aria-labelledby="kaarten-tab">
        <div class="absolute right-20">
            <select id="orderby">
                <option value="rarity">Rarity</option>
                <option value="teacher">Teacher</option>
                <option value="HP">HP</option>
                <option value="Attack">Attack</option>
                <option value="Defense">Defense</option>
                <option value="Special Attack">Special Attack</option>
                <option value="Special Defense">Special Defense</option>
                <option value="Speed">Speed</option>
            </select>
            <button
                class="text-black bg-red-600 hover:bg-red-600 focus:ring-amber-500 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-3 md:mr-0 dark:bg-red-600 dark:hover:bg-red-600 dark:focus:ring-amber-500 m-10 "
                onclick="orderby()">Test</button>
        </div><br>
        <div id="dashboard_card" class="min-h-[90vh]">
            <x-card></x-card>
        </div>
    </div>
</x-app-layout>

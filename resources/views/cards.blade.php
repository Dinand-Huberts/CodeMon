<x-app-layout>
    <div id="kaarten" role="tabpanel" aria-labelledby="kaarten-tab">
        <div class="flex flex-col left-20 mt-3 absolute">
            {{ $maxpages }}
        </div>

        <div class="absolute right-20 mt-10">
            <select id="orderby" onchange="orderby()">
                <option value="rarity">Rarity</option>
                <option value="teacher">Teacher</option>
                <option value="hp">HP</option>
                <option value="attack">Attack</option>
                <option value="defense">Defense</option>
                <option value="special_attack">Special Attack</option>
                <option value="special_defense">Special Defense</option>
                <option value="speed">Speed</option>
            </select>
        </div><br>
        <div id="dashboard_card" class="min-h-[90vh]">
            <x-card></x-card>
        </div>
        <div class="flex flex-col ml-20">
            <form action="/cards" method="GET">
                <select id="v" name="v">
                    <option id="25" value="25">25</option>
                    <option id="50" value="50">50</option>
                    <option id="100" value="100">100</option>
                    <option id="250" value="250">250</option>
                </select>
                <x-button>Filter</x-button>
            </form>
        </div><br>
    </div>
    <script type="text/javascript">
        currentFilterCheck();
    </script>
</x-app-layout>

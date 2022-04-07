<x-app-layout>
    <div id="kaarten" role="tabpanel" aria-labelledby="kaarten-tab">
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
            <form action="./cards" method="GET">
                <select id="v" name="v">
                    <option id="25" value="25">25</option>
                    <option id="50" value="50">50</option>
                    <option id="100" value="100">100</option>
                    <option id="250" value="250">250</option>
                </select>
                <x-button>Filter</x-button>
            </form>
        </div><br>
        {{-- pagination --}}
        <nav aria-label="Page navigation">
            <ul class="inline-flex -space-x-px relative">

                @php
                    $page = 0;
                    $page_btn = 1;
                @endphp

                @for ($i = 0; $i < $maxpages; $i++)
                    <li class="ml-20 mb-10 p-1">
                        <a href="./cards?p={{ $page }}&v={{ $v }}"
                            class="text-black bg-red-600 hover:bg-red-700 focus:ring-amber-500 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-3 md:mr-0 dark:bg-red-600 dark:hover:bg-red-600 dark:focus:ring-amber-500"
                            style="">{{ $page_btn }}</a>
                    </li>
                    @php
                        $page_btn++;
                        $page++;
                    @endphp
                @endfor

            </ul>
        </nav>
    </div>

    <script type="text/javascript">
        currentFilterCheck();
    </script>
</x-app-layout>

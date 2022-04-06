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
        {{-- pagination --}}
        <nav aria-label="Page navigation">
            <ul class="inline-flex -space-x-px relative">
                <li>
                    <a href="/cards?p={{ $p-- }}&v={{ $v }}"
                        class="py-2 px-3 ml-0 leading-tight text-gray-500 bg-white rounded-l-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Previous</a>
                </li>
                <li>
                    <a href="#"
                        class="py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">1</a>
                </li>
                <li>
                    <a href="#"
                        class="py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">2</a>
                </li>
                <li>
                    <a href="#" aria-current="page"
                        class="py-2 px-3 text-blue-600 bg-blue-50 border border-gray-300 hover:bg-blue-100 hover:text-blue-700 dark:border-gray-700 dark:bg-gray-700 dark:text-white">3</a>
                </li>
                <li>
                    <a href="#"
                        class="py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">4</a>
                </li>
                <li>
                    <a href="#"
                        class="py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">5</a>
                </li>
                <li>
                    <a href="#"
                        class="py-2 px-3 leading-tight text-gray-500 bg-white rounded-r-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Next</a>
                </li>
            </ul>
        </nav>
    </div>

    <script type="text/javascript">
        currentFilterCheck();
    </script>
</x-app-layout>

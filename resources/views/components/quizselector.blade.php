@if ($quiz_cooldown == true)

    <form action="./quiz" method="GET">
        <select name="difficulty" id="">
            <option value="easy">Easy</option>
            <option value="normal">Normal</option>
            <option value="hard">Hard</option>
            <option value="extreme">Extreme</option>
            <option value="nightmare">Nightmare</option>
        </select>

        <button
            class="text-black bg-red-600 hover:bg-red-600 focus:ring-amber-500 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-3 md:mr-0 dark:bg-red-600 dark:hover:bg-red-600 dark:focus:ring-amber-500 mt-10"
            type="submit">Make a quiz!</button>
    </form>
@else
    <script>
        alert('You may not view a quiz at this time!');
        window.location.reload;
    </script>
@endif

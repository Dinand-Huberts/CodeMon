@if($quiz_cooldown == true)

<div class="flex justify-center">
<form id="quiz" action="/dashboard" method="GET" style="padding: 75px">
{!! $quiz_question !!}
<div class="flex justify-center">
<button class="left-[50%] right-[50%] text-black bg-red-600 hover:bg-red-600 focus:ring-amber-500 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-3 md:mr-0 dark:bg-red-600 dark:hover:bg-red-600 dark:focus:ring-amber-500">Submit</button>
</div>
</form>
</div>
@else

{{-- <script> 
alert('You may not view a quiz at this time!');
window.location.reload;
</script>  --}}
@endif
<!-- Team -->
<div>
  <div wire:loading>
    <div class="animate-spin inline-block size-6 border-[3px] border-current border-t-transparent text-blue-600 rounded-full dark:text-blue-500" role="status" aria-label="loading">
      <span class="sr-only">Loading...</span>
    </div>
    Processing..</div>



<div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
 

  <!-- Grid -->
  <div class="grid grid-cols-2  md:grid-cols-3 gap-8 md:gap-12">
    <div class="flex flex-col rounded-xl p-4 md:p-6 bg-white border border-gray-200 dark:bg-neutral-900 dark:border-neutral-700">
      <div class=" items-center gap-x-9">
        <img class=" size-50" src="{{asset('user5.jpeg')}}" alt="Avatar">
        <div class="grow">
          <h3 class="font-medium text-gray-800 dark:text-neutral-200 text-center py-2 ">
          {{$lecturer_details->lecturerUser->name}}
          </h3>
          <p class="text-xs uppercase text-gray-500 dark:text-neutral-500 text-center">
          {{$lecturer_details->unit->unit_name}} | {{$lecturer_details->department_name}}

          </p>
        </div>
      </div>

      

     
    </div>
    <!-- End Col -->
    <div class="text-center">
       
    <h3 class="font-medium text-gray-800 dark:text-neutral-200 py-3">Current Appointment</h3>

    <ul class="space-y-3 text-sm">
    <li class="flex gap-x-3">
    <span class="size-5 flex justify-center items-center rounded-full bg-blue-600 text-white dark:bg-blue-500">
      <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
        <polyline points="20 6 9 17 4 12"></polyline>
      </svg>
    </span>
    <span class="text-gray-600 dark:text-white">
      {{$appointment_details->appointment_date.' | '. date('H:i A',strtotime($appointment_details->appointment_time))}}
    </span>
  </li>
</ul>

        <h3 class="font-medium text-gray-800 dark:text-neutral-200 py-3">Select an Available Date</h3>
<input type="text" id="datepicker" autocomplete="off" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none bg-gray-100 dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" placeholder="Select Available date">
@if($selectedDate)
    <div>
        <h4 class="font-medium text-gray-800 dark:text-neutral-200 py-3 ">Selected Date: {{ $selectedDate }}</h4>
    </div>
@endif
<div>
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight py-5">Available Time Slots</h2>
    <div class="flex flex-wrap">
        @foreach ($timeSlots as $slot)
            <button class="m-2 p-2 bg-blue-500 text-white rounded hover:bg-blue-700"
            type="button"
            wire:click="updateAppointment( '{{ $slot }}' )"
            wire:confirm="Are you sure that you want to update appointment from {{$appointment_details->appointment_date.' , '. date('H:i A',strtotime($appointment_details->appointment_time))}} to {{ $selectedDate }}, {{ $slot }} ?">
                {{ date('H:i',strtotime($slot)) }}  
            </button>
        @endforeach
    </div>
</div>
</div>
<!-- End Col -->
</div>
<!-- End Grid -->
</div>
<!-- End Card Blog -->

<script src="pikaday.js"></script>
<script>
    // Inject available dates from Livewire
        var availableDates = @json($availableDates);

        var picker = new Pikaday({
            field: document.getElementById('datepicker'),
            format: 'YYYY-MM-DD',
            onSelect: function(date) {
                var selectedDate = picker.toString();
                @this.call('selectDate', selectedDate);
            },
            disableDayFn: function(date) {
                // Disable all dates not in the availableDates array
                var formattedDate = moment(date).format('YYYY-MM-DD');
                return !availableDates.includes(formattedDate);
            }
        });
</script>

</div>

   

  </div>
  <!-- End Grid -->
</div>
<!-- End Team -->
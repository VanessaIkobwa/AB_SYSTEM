<!-- Team -->
<div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
  <!-- Title -->
  <div class="max-w-2xl mx-auto text-center mb-10 lg:mb-14">
    <h2 class="text-2xl font-bold md:text-4xl md:leading-tight dark:text-white">Featured Lecturers</h2>
    <p class="mt-1 text-gray-600 dark:text-neutral-400">Expert Educators</p>
  </div>
  <!-- End Title -->

  <!-- Grid -->
  <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

    @if(count($featuredLecturers) > 0)
      @foreach($featuredLecturers as $item)
      <div class="flex flex-col rounded-xl p-4 md:p-6 bg-white border border-gray-200 dark:bg-neutral-900 dark:border-neutral-700">
        <div class="flex items-center gap-x-4">
          <img class="rounded-full w-20 h-20" src="https://images.unsplash.com/photo-1568602471122-7832951cc4c5?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=2&w=320&h=320&q=80" alt="Avatar">
          <div class="grow">
            <h3 class="font-medium text-gray-800 dark:text-neutral-200">{{ $item->lecturerUser->name }}</h3>
            <p class="text-xs uppercase text-gray-500 dark:text-neutral-500">{{ $item->unit->unit_name }}</p>
          </div>
        </div>

        <p class="mt-3 text-gray-500 dark:text-neutral-500">
        {{ $item->department_name }}
        </p>

        <!-- Social and Appointment -->
        <div class="flex justify-between mt-5">
          <div class="mt-3 space-x-1">
            <a class="inline-flex justify-center items-center w-8 h-8 text-sm font-semibold rounded-lg border border-gray-200 text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-neutral-400 dark:border-neutral-700 dark:hover:bg-neutral-700 dark:focus:bg-neutral-700" href="" target="_blank">
              <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 16">
                <path d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38v-1.49c-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48v2.2c0 .21.15.46.55.38A8.012 8.012 0 0 0 16 8c0-4.42-3.58-8-8-8z"/>
              </svg>
            </a>
          </div>

          @if (auth()->user() != null)
          <a href="{{ route('appointment.book', $lecturer->id) }}" class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700">
              Book Appointment
          </a>
          @else
          <a href="/login" class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700">
              Book Appointment
          </a>
          @endif
        </div>
      </div>
      @endforeach
    @else
      <a class="col-span-full lg:col-span-1 group flex flex-col justify-center text-center rounded-xl p-4 md:p-6 border border-dashed border-gray-200 hover:shadow-sm dark:border-neutral-700" href="#">
        <h3 class="text-lg text-gray-800 dark:text-neutral-200">Explore!</h3>
        <span class="inline-flex items-center gap-x-2 text-blue-600 group-hover:text-blue-700 dark:text-blue-500">
          See all Lecturers
          <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
            <path d="m9 18 6-6-6-6"/>
          </svg>
        </span>
      </a>
    @endif

  </div>
  <!-- End Grid -->
</div>
<!-- End Team -->

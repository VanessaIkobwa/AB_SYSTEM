<!-- Card Section -->
<div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
  <!-- Grid -->
  <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6">

   <!-- Admin -->
  @if(auth()->user() && auth()->user()->role == 2)
 <!-- Card -->
 <div class="flex flex-col gap-y-3 lg:gap-y-5 p-4 md:p-5 bg-white border shadow-sm rounded-xl dark:bg-neutral-900 dark:border-neutral-800">
      <div class="inline-flex justify-center items-center">
        <span class="size-2 inline-block bg-blue-500 rounded-full me-2"></span>
        <span class="text-xs font-semibold uppercase text-gray-600 dark:text-neutral-400">Users</span>
      </div>

      <div class="text-center">
        <h3 class="text-3xl sm:text-4xl lg:text-5xl font-semibold text-gray-800 dark:text-neutral-200">
          {{$users_count}}
        </h3>
      </div>

      <dl class="flex justify-center items-center divide-x divide-gray-200 dark:divide-neutral-800">
       <dd class="text-start ps-3">
          <span class="text-sm font-semibold text-gray-800 dark:text-neutral-200">5</span>
          <span class="block text-sm text-gray-500 dark:text-neutral-500">last month</span>
        </dd>
        <dd class="text-start ps-3">
          <span class="text-sm font-semibold text-gray-800 dark:text-neutral-200">5</span>
          <span class="block text-sm text-gray-500 dark:text-neutral-500">last week</span>
        </dd>
      </dl>
    </div>
    <!-- End Card -->

    <!-- Card -->
    <div class="flex flex-col gap-y-3 lg:gap-y-5 p-4 md:p-5 bg-white border shadow-sm rounded-xl dark:bg-neutral-900 dark:border-neutral-800">
      <div class="inline-flex justify-center items-center">
        <span class="size-2 inline-block bg-green-500 rounded-full me-2"></span>
        <span class="text-xs font-semibold uppercase text-gray-600 dark:text-neutral-400">Lecturers</span>
      </div>

      <div class="text-center">
        <h3 class="text-3xl sm:text-4xl lg:text-5xl font-semibold text-gray-800 dark:text-neutral-200">
          25
        </h3>
      </div>

      <dl class="flex justify-center items-center divide-x divide-gray-200 dark:divide-neutral-800">
        <dt class="pe-3">
          <span class="text-green-600">
            <svg class="inline-block size-4 self-center" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
              <path fill-rule="evenodd" d="m7.247 4.86-4.796 5.481c-.566.647-.106 1.659.753 1.659h9.592a1 1 0 0 0 .753-1.659l-4.796-5.48a1 1 0 0 0-1.506 0z"/>
            </svg>
            <span class="inline-block text-sm">
              5.6%
            </span>
          </span>
          <span class="block text-sm text-gray-500 dark:text-neutral-500">change</span>
        </dt>
        <dd class="text-start ps-3">
          <span class="text-sm font-semibold text-gray-800 dark:text-neutral-200">7</span>
          <span class="block text-sm text-gray-500 dark:text-neutral-500">last week</span>
        </dd>
      </dl>
    </div>
    <!-- End Card -->

    <!-- Card -->
    <div class="flex flex-col gap-y-3 lg:gap-y-5 p-4 md:p-5 bg-white border shadow-sm rounded-xl dark:bg-neutral-900 dark:border-neutral-800">
      <div class="inline-flex justify-center items-center">
        <span class="size-2 inline-block bg-yellow-500 rounded-full me-2"></span>
        <span class="text-xs font-semibold uppercase text-gray-600 dark:text-neutral-400">Students</span>
      </div>

      <div class="text-center">
        <h3 class="text-3xl sm:text-4xl lg:text-5xl font-semibold text-gray-800 dark:text-neutral-200">
          4
        </h3>
      </div>

      <dl class="flex justify-center items-center divide-x divide-gray-200 dark:divide-neutral-800">
        <dt class="pe-3">
          <span class="text-red-600">
            <svg class="inline-block size-4 self-center" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
              <path fill-rule="evenodd" d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
            </svg>
            <span class="inline-block text-sm">
              5.6%
            </span>
          </span>
          <span class="block text-sm text-gray-500 dark:text-neutral-500">change</span>
        </dt>
        <dd class="text-start ps-3">
          <span class="text-sm font-semibold text-gray-800 dark:text-neutral-200">7</span>
          <span class="block text-sm text-gray-500 dark:text-neutral-500">last week</span>
        </dd>
      </dl>
    </div>
    <!-- End Card -->

     <!-- Card -->
     <div class="flex flex-col gap-y-3 lg:gap-y-5 p-4 md:p-5 bg-white border shadow-sm rounded-xl dark:bg-neutral-900 dark:border-neutral-800">
      <div class="inline-flex justify-center items-center">
        <span class="size-2 inline-block bg-purple-500 rounded-full me-2"></span>
        <span class="text-xs font-semibold uppercase text-gray-600 dark:text-neutral-400">Academic Administrators</span>
      </div>

      <div class="text-center">
        <h3 class="text-3xl sm:text-4xl lg:text-5xl font-semibold text-gray-800 dark:text-neutral-200">
          4
        </h3>
      </div>

      <dl class="flex justify-center items-center divide-x divide-gray-200 dark:divide-neutral-800">
        <dt class="pe-3">
          <span class="text-red-600">
            <svg class="inline-block size-4 self-center" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
              <path fill-rule="evenodd" d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
            </svg>
            <span class="inline-block text-sm">
              5.6%
            </span>
          </span>
          <span class="block text-sm text-gray-500 dark:text-neutral-500">change</span>
        </dt>
        <dd class="text-start ps-3">
          <span class="text-sm font-semibold text-gray-800 dark:text-neutral-200">7</span>
          <span class="block text-sm text-gray-500 dark:text-neutral-500">last week</span>
        </dd>
      </dl>
    </div>
    <!-- End Card -->


 <!-- Card -->
 <div class="flex flex-col gap-y-3 lg:gap-y-5 p-4 md:p-5 bg-white border shadow-sm rounded-xl dark:bg-neutral-900 dark:border-neutral-800">
      <div class="inline-flex justify-center items-center">
        <span class="size-2 inline-block bg-pink-500 rounded-full me-2"></span>
        <span class="text-xs font-semibold uppercase text-gray-600 dark:text-neutral-400">Appointments</span>
      </div>

      <div class="text-center">
        <h3 class="text-3xl sm:text-4xl lg:text-5xl font-semibold text-gray-800 dark:text-neutral-200">
          4
        </h3>
      </div>

      <dl class="flex justify-center items-center divide-x divide-gray-200 dark:divide-neutral-800">
        <dt class="pe-3">
          <span class="text-red-600">
            <svg class="inline-block size-4 self-center" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
              <path fill-rule="evenodd" d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
            </svg>
            <span class="inline-block text-sm">
              5.6%
            </span>
          </span>
          <span class="block text-sm text-gray-500 dark:text-neutral-500">change</span>
        </dt>
        <dd class="text-start ps-3">
          <span class="text-sm font-semibold text-gray-800 dark:text-neutral-200">7</span>
          <span class="block text-sm text-gray-500 dark:text-neutral-500">last week</span>
        </dd>
      </dl>
    </div>
    <!-- End Card -->

  @endif
  

   <!-- Lec -->
  @if(auth()->user() && auth()->user()->role == 1)
  <!-- Card -->
  <div class="flex flex-col gap-y-3 lg:gap-y-5 p-4 md:p-5 bg-white border shadow-sm rounded-xl dark:bg-neutral-900 dark:border-neutral-800">
      <div class="inline-flex justify-center items-center">
        <span class="size-2 inline-block bg-green-500 rounded-full me-2"></span>
        <span class="text-xs font-semibold uppercase text-gray-600 dark:text-neutral-400">All Appointments</span>
      </div>

      <div class="text-center">
        <h3 class="text-3xl sm:text-4xl lg:text-5xl font-semibold text-gray-800 dark:text-neutral-200">
          25
        </h3>
      </div>

      <dl class="flex justify-center items-center divide-x divide-gray-200 dark:divide-neutral-800">
        <dt class="pe-3">
          <span class="text-green-600">
            <svg class="inline-block size-4 self-center" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
              <path fill-rule="evenodd" d="m7.247 4.86-4.796 5.481c-.566.647-.106 1.659.753 1.659h9.592a1 1 0 0 0 .753-1.659l-4.796-5.48a1 1 0 0 0-1.506 0z"/>
            </svg>
            <span class="inline-block text-sm">
              5.6%
            </span>
          </span>
          <span class="block text-sm text-gray-500 dark:text-neutral-500">change</span>
        </dt>
        <dd class="text-start ps-3">
          <span class="text-sm font-semibold text-gray-800 dark:text-neutral-200">7</span>
          <span class="block text-sm text-gray-500 dark:text-neutral-500">last week</span>
        </dd>
      </dl>
    </div>
    <!-- End Card -->

    <!-- Card -->
    <div class="flex flex-col gap-y-3 lg:gap-y-5 p-4 md:p-5 bg-white border shadow-sm rounded-xl dark:bg-neutral-900 dark:border-neutral-800">
      <div class="inline-flex justify-center items-center">
        <span class="size-2 inline-block bg-purple-500 rounded-full me-2"></span>
        <span class="text-xs font-semibold uppercase text-gray-600 dark:text-neutral-400">Up-Coming Appointments</span>
      </div>

      <div class="text-center">
        <h3 class="text-3xl sm:text-4xl lg:text-5xl font-semibold text-gray-800 dark:text-neutral-200">
          25
        </h3>
      </div>

      <dl class="flex justify-center items-center divide-x divide-gray-200 dark:divide-neutral-800">
        <dt class="pe-3">
          <span class="text-green-600">
            <svg class="inline-block size-4 self-center" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
              <path fill-rule="evenodd" d="m7.247 4.86-4.796 5.481c-.566.647-.106 1.659.753 1.659h9.592a1 1 0 0 0 .753-1.659l-4.796-5.48a1 1 0 0 0-1.506 0z"/>
            </svg>
            <span class="inline-block text-sm">
              5.6%
            </span>
          </span>
          <span class="block text-sm text-gray-500 dark:text-neutral-500">change</span>
        </dt>
        <dd class="text-start ps-3">
          <span class="text-sm font-semibold text-gray-800 dark:text-neutral-200">7</span>
          <span class="block text-sm text-gray-500 dark:text-neutral-500">last week</span>
        </dd>
      </dl>
    </div>
    <!-- End Card -->

     <!-- Card -->
     <div class="flex flex-col gap-y-3 lg:gap-y-5 p-4 md:p-5 bg-white border shadow-sm rounded-xl dark:bg-neutral-900 dark:border-neutral-800">
      <div class="inline-flex justify-center items-center">
        <span class="size-2 inline-block bg-pink-500 rounded-full me-2"></span>
        <span class="text-xs font-semibold uppercase text-gray-600 dark:text-neutral-400">Complete Appointments</span>
      </div>

      <div class="text-center">
        <h3 class="text-3xl sm:text-4xl lg:text-5xl font-semibold text-gray-800 dark:text-neutral-200">
          25
        </h3>
      </div>

      <dl class="flex justify-center items-center divide-x divide-gray-200 dark:divide-neutral-800">
        <dt class="pe-3">
          <span class="text-green-600">
            <svg class="inline-block size-4 self-center" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
              <path fill-rule="evenodd" d="m7.247 4.86-4.796 5.481c-.566.647-.106 1.659.753 1.659h9.592a1 1 0 0 0 .753-1.659l-4.796-5.48a1 1 0 0 0-1.506 0z"/>
            </svg>
            <span class="inline-block text-sm">
              5.6%
            </span>
          </span>
          <span class="block text-sm text-gray-500 dark:text-neutral-500">change</span>
        </dt>
        <dd class="text-start ps-3">
          <span class="text-sm font-semibold text-gray-800 dark:text-neutral-200">7</span>
          <span class="block text-sm text-gray-500 dark:text-neutral-500">last week</span>
        </dd>
      </dl>
    </div>
    <!-- End Card -->

  @endif
  

   <!-- Academic Admin -->
  @if(auth()->user() && auth()->user()->role == 3)
   <!-- Card -->
   <div class="flex flex-col gap-y-3 lg:gap-y-5 p-4 md:p-5 bg-white border shadow-sm rounded-xl dark:bg-neutral-900 dark:border-neutral-800">
      <div class="inline-flex justify-center items-center">
        <span class="size-2 inline-block bg-green-500 rounded-full me-2"></span>
        <span class="text-xs font-semibold uppercase text-gray-600 dark:text-neutral-400">Lecturers</span>
      </div>

      <div class="text-center">
        <h3 class="text-3xl sm:text-4xl lg:text-5xl font-semibold text-gray-800 dark:text-neutral-200">
          25
        </h3>
      </div>

      <dl class="flex justify-center items-center divide-x divide-gray-200 dark:divide-neutral-800">
        <dt class="pe-3">
          <span class="text-green-600">
            <svg class="inline-block size-4 self-center" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
              <path fill-rule="evenodd" d="m7.247 4.86-4.796 5.481c-.566.647-.106 1.659.753 1.659h9.592a1 1 0 0 0 .753-1.659l-4.796-5.48a1 1 0 0 0-1.506 0z"/>
            </svg>
            <span class="inline-block text-sm">
              5.6%
            </span>
          </span>
          <span class="block text-sm text-gray-500 dark:text-neutral-500">change</span>
        </dt>
        <dd class="text-start ps-3">
          <span class="text-sm font-semibold text-gray-800 dark:text-neutral-200">7</span>
          <span class="block text-sm text-gray-500 dark:text-neutral-500">last week</span>
        </dd>
      </dl>
    </div>
    <!-- End Card -->

    
 <!-- Card -->
 <div class="flex flex-col gap-y-3 lg:gap-y-5 p-4 md:p-5 bg-white border shadow-sm rounded-xl dark:bg-neutral-900 dark:border-neutral-800">
      <div class="inline-flex justify-center items-center">
        <span class="size-2 inline-block bg-pink-500 rounded-full me-2"></span>
        <span class="text-xs font-semibold uppercase text-gray-600 dark:text-neutral-400">Appointments</span>
      </div>

      <div class="text-center">
        <h3 class="text-3xl sm:text-4xl lg:text-5xl font-semibold text-gray-800 dark:text-neutral-200">
          4
        </h3>
      </div>

      <dl class="flex justify-center items-center divide-x divide-gray-200 dark:divide-neutral-800">
        <dt class="pe-3">
          <span class="text-red-600">
            <svg class="inline-block size-4 self-center" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
              <path fill-rule="evenodd" d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
            </svg>
            <span class="inline-block text-sm">
              5.6%
            </span>
          </span>
          <span class="block text-sm text-gray-500 dark:text-neutral-500">change</span>
        </dt>
        <dd class="text-start ps-3">
          <span class="text-sm font-semibold text-gray-800 dark:text-neutral-200">7</span>
          <span class="block text-sm text-gray-500 dark:text-neutral-500">last week</span>
        </dd>
      </dl>
    </div>
    <!-- End Card -->
     


    <!-- Card -->
    <div class="flex flex-col gap-y-3 lg:gap-y-5 p-4 md:p-5 bg-white border shadow-sm rounded-xl dark:bg-neutral-900 dark:border-neutral-800">
      <div class="inline-flex justify-center items-center">
        <span class="size-2 inline-block bg-yellow-500 rounded-full me-2"></span>
        <span class="text-xs font-semibold uppercase text-gray-600 dark:text-neutral-400">Students</span>
      </div>

      <div class="text-center">
        <h3 class="text-3xl sm:text-4xl lg:text-5xl font-semibold text-gray-800 dark:text-neutral-200">
          25
        </h3>
      </div>

      <dl class="flex justify-center items-center divide-x divide-gray-200 dark:divide-neutral-800">
        <dt class="pe-3">
          <span class="text-green-600">
            <svg class="inline-block size-4 self-center" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
              <path fill-rule="evenodd" d="m7.247 4.86-4.796 5.481c-.566.647-.106 1.659.753 1.659h9.592a1 1 0 0 0 .753-1.659l-4.796-5.48a1 1 0 0 0-1.506 0z"/>
            </svg>
            <span class="inline-block text-sm">
              5.6%
            </span>
          </span>
          <span class="block text-sm text-gray-500 dark:text-neutral-500">change</span>
        </dt>
        <dd class="text-start ps-3">
          <span class="text-sm font-semibold text-gray-800 dark:text-neutral-200">7</span>
          <span class="block text-sm text-gray-500 dark:text-neutral-500">last week</span>
        </dd>
      </dl>
    </div>
    <!-- End Card -->
  @endif
  
  
  
  
 

  </div>
  <!-- End Grid -->
</div>
<!-- End Card Section -->
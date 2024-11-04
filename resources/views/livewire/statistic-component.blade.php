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
          <span class="text-sm font-semibold text-gray-800 dark:text-neutral-200">{{$last_month_users_count}}</span>
          <span class="block text-sm text-gray-500 dark:text-neutral-500">last month</span>
        </dd>
        <dd class="text-start ps-3">
          <span class="text-sm font-semibold text-gray-800 dark:text-neutral-200">{{$last_week_users_count}}</span>
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
          {{$lecturers_count}}
        </h3>
      </div>

      <dl class="flex justify-center items-center divide-x divide-gray-200 dark:divide-neutral-800">
      <dd class="text-start ps-3">
          <span class="text-sm font-semibold text-gray-800 dark:text-neutral-200">{{$last_month_lecturer_count}}</span>
          <span class="block text-sm text-gray-500 dark:text-neutral-500">last month</span>
        </dd>
        <dd class="text-start ps-3">
          <span class="text-sm font-semibold text-gray-800 dark:text-neutral-200">{{$last_week_lecturer_count}}</span>
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
        {{$students_count}}
          
        </h3>
      </div>

      <dl class="flex justify-center items-center divide-x divide-gray-200 dark:divide-neutral-800">
      <dd class="text-start ps-3">
          <span class="text-sm font-semibold text-gray-800 dark:text-neutral-200">{{$last_month_student_count}}</span>
          <span class="block text-sm text-gray-500 dark:text-neutral-500">last month</span>
        </dd>
        <dd class="text-start ps-3">
          <span class="text-sm font-semibold text-gray-800 dark:text-neutral-200">{{$last_week_student_count}}</span>
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
          {{$academic_admin_count}}
        </h3>
      </div>

      <dl class="flex justify-center items-center divide-x divide-gray-200 dark:divide-neutral-800">
      <dd class="text-start ps-3">
          <span class="text-sm font-semibold text-gray-800 dark:text-neutral-200">{{$last_month_academic_count}}</span>
          <span class="block text-sm text-gray-500 dark:text-neutral-500">last month</span>
        </dd>
        <dd class="text-start ps-3">
          <span class="text-sm font-semibold text-gray-800 dark:text-neutral-200">{{$last_week_academic_count}}</span>
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
     {{$appointments_count}}
        </h3>
      </div>

      <dl class="flex justify-center items-center divide-x divide-gray-200 dark:divide-neutral-800">
      <dd class="text-start ps-3">
          <span class="text-sm font-semibold text-gray-800 dark:text-neutral-200">{{$last_month_appointments_count}}</span>
          <span class="block text-sm text-gray-500 dark:text-neutral-500">last month</span>
        </dd>
        <dd class="text-start ps-3">
          <span class="text-sm font-semibold text-gray-800 dark:text-neutral-200">{{$last_week_appointments_count}}</span>
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
        {{$lecturer_appointments_count}}
        </h3>
      </div>

     
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
          {{$upcoming_appointments_count}}
        </h3>
      </div>

     
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
          {{$complete_appointments_count}}
        </h3>
      </div>

     
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
        {{$lecturers_count}}
          
        </h3>
      </div>

      <dl class="flex justify-center items-center divide-x divide-gray-200 dark:divide-neutral-800">
      <dd class="text-start ps-3">
          <span class="text-sm font-semibold text-gray-800 dark:text-neutral-200">{{$last_month_lecturer_count}}</span>
          <span class="block text-sm text-gray-500 dark:text-neutral-500">last month</span>
        </dd>
        <dd class="text-start ps-3">
          <span class="text-sm font-semibold text-gray-800 dark:text-neutral-200">{{$last_week_lecturer_count}}</span>
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
     {{$appointments_count}}
          
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
        <span class="size-2 inline-block bg-yellow-500 rounded-full me-2"></span>
        <span class="text-xs font-semibold uppercase text-gray-600 dark:text-neutral-400">Students</span>
      </div>

      <div class="text-center">
        <h3 class="text-3xl sm:text-4xl lg:text-5xl font-semibold text-gray-800 dark:text-neutral-200">
        {{$students_count}}
        </h3>
      </div>

      <dl class="flex justify-center items-center divide-x divide-gray-200 dark:divide-neutral-800">
      <dd class="text-start ps-3">
          <span class="text-sm font-semibold text-gray-800 dark:text-neutral-200">{{$last_month_student_count}}</span>
          <span class="block text-sm text-gray-500 dark:text-neutral-500">last month</span>
        </dd>
        <dd class="text-start ps-3">
          <span class="text-sm font-semibold text-gray-800 dark:text-neutral-200">{{$last_week_student_count}}</span>
          <span class="block text-sm text-gray-500 dark:text-neutral-500">last week</span>
        </dd>
      </dl>
    </div>
    <!-- End Card -->

    <style>
        /* Optional: Set max width for better layout */
        #appointmentChart {
            max-width: 400px; /* or any desired maximum width */
            height: 10px; /* Set height here if using CSS */
        }
    </style>
   <canvas id="appointmentChart" width="70" height="15"></canvas>
    <script>
        const ctx = document.getElementById('appointmentChart').getContext('2d');
        const appointmentChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels:data, // Replace with your month/week labels
                datasets: [{
                    label: 'Number of Appointments',
                    data: appointments,
                    borderColor: 'rgba(75, 192, 192, 1)',
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    fill: true,
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Number of Appointments'
                        }
                    },
                    x: {
                        title: {
                            display: true,
                            text: 'Month'
                        }
                    }
                }
            }
        });
    </script>





   




















  @endif
  
  
  
  
 

  </div>
  <!-- End Grid -->
</div>
<!-- End Cad Section -->
 
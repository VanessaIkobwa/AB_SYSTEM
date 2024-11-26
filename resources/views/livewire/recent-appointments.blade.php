<!-- Table Section -->
<div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
 
<div class="max-w-2xl mx-auto text-center mb-10 lg:mb-14">
<h2 class="text-2xl font-bold md:text-4xl md:leading-tight dark:text-white"> My Appointments</h2>
</div>

<div wire:loading class="text-gray-800 dark:text-neutral-200">
    <div class="animate-spin inline-block size-6 border-[3px] border-current border-t-transparent text-blue-600 rounded-full dark:text-blue-500" role="status" aria-label="loading">
      <span class="sr-only">Loading...</span>
    </div>
    Processing..</div>
<!-- Card -->
  <div class="flex flex-col">
    <div class="-m-1.5 overflow-x-auto">
      <div class="p-1.5 min-w-full inline-block align-middle">
        <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden dark:bg-neutral-900 dark:border-neutral-700">
         

          <!-- Table -->
          <table class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700">
            <thead class="bg-gray-50 dark:bg-neutral-800">
                        
            <tr>
                @if(auth()->user() && auth()->user()->role == 0 )

                @else
                <th scope="col" class="px-6 py-3 text-start">
                  <div class="flex items-center gap-x-2">
                    <span class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-neutral-200">
                      Student Name
                    </span>
                  </div>
                </th>
                @endif

                
                @if(auth()->user() && auth()->user()->role == 1 )

                @else
                <th scope="col" class="px-6 py-3 text-start">
                  <div class="flex items-center gap-x-2">
                    <span class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-neutral-200">
                      Lecturer Name
                    </span>
                  </div>
                </th>

                @endif


                <th scope="col" class="px-6 py-3 text-start">
                  <div class="flex items-center gap-x-2">
                    <span class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-neutral-200">
                      Appointment Date
                    </span>
                  </div>
                </th>

                <th scope="col" class="px-6 py-3 text-start">
                  <div class="flex items-center gap-x-2">
                    <span class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-neutral-200">
                    Appointment Time
                    </span>
                  </div>
                </th>

                

                <th scope="col" class="px-6 py-3 text-start">
                  <div class="flex items-center gap-x-2">
                    <span class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-neutral-200">
                      Status
                    </span>
                  </div>
                </th>
 
                <th scope="col" class="px-6 py-3 text-start">
                  <div class="flex items-center gap-x-2">
                    <span class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-neutral-200">
                    Action
                    </span>
                  </div>
                </th>



              </tr>
            </thead>

            

            <tbody class="divide-y divide-gray-200 dark:divide-neutral-700">
               @if (count($recent_appointments) > 0)
                @foreach($recent_appointments as $appointment)
                <tr class="bg-white hover:bg-gray-50 dark:bg-neutral-900 dark:hover:bg-neutral-800">
                        
                        
                        @if(auth()->user() && auth()->user()->role == 0 )

                        @else
                                <td class="size-px whitespace-nowrap align-top">
                                    <a class="block p-6" href="#">
                                    <div class="flex items-center gap-x-4">
                                        <img class="shrink-0 size-[38px] rounded-lg" src="https://images.unsplash.com/photo-1572307480813-ceb0e59d8325?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=320&h=320&q=80" alt="Product Image">
                                        <div>
                                        <span class="block text-sm font-semibold text-gray-800 dark:text-neutral-200">{{$appointment->student->name}}</span>
                                        </div>
                                    </div>
                                    </a>
                                </td>
                                
                        @endif
                            
                            
                        @if(auth()->user() && auth()->user()->role == 1 )

                        @else
                                <td class="size-px whitespace-nowrap align-top">
                                    <a class="block p-6" href="#">
                                    <div class="flex items-center gap-x-3">
                                        <img class="inline-block size-[38px] rounded-full" src="https://images.unsplash.com/photo-1531927557220-a9e23c1e4794?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=2&w=300&h=300&q=80" alt="Product Image">
                                        <div class="grow">
                                        <span class="block text-sm font-semibold text-gray-800 dark:text-neutral-200">{{$appointment->lecturer->lecturerUser->name}}</span>
                                        <span class="block text-sm text-gray-500 dark:text-neutral-500">{{$appointment->lecturer->lecturerUser->email}}</span>
                                        </div>
                                    </div>
                                    </a>
                                </td>

                        @endif
                            
                                <td class="h-px w-72 min-w-72 align-top">
                                <a class="block p-6" href="#">
                                
                                <span class="block text-sm text-gray-800 dark:text-neutral-200">{{ date('d M Y',strtotime($appointment->appointment_date) ) }}</span>
                                </a>
                                
                                </td>
                                <td class="size-px whitespace-nowrap align-top">
                                    <a class="block p-6" href="#">
                                    <span class="text-sm text-gray-800 dark:text-neutral-200">{{ date('H:i',strtotime($appointment->appointment_time) ) }}</span>
                                    </a>
                                </td>
                                <td class="size-px whitespace-nowrap align-top">
                                    <div class="block p-6" href="#">
                                      @if($appointment->is_complete == 1)
                                    <span class="py-1 px-1.5 inline-flex items-center gap-x-1 text-xs font-medium bg-teal-100 text-teal-800 rounded-full dark:bg-teal-500/10 dark:text-teal-500">
                                        <svg class="size-2.5" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                                        </svg>
                                        Complete
                                    </span>
                                     @else
                                     <span class="py-1 px-1.5 inline-flex items-center gap-x-1 text-xs font-medium bg-yellow-100 text-yellow-800 rounded-full dark:bg-yellow-500/10 dark:text-yellow-500">
                                        
                                     <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />                                       
                                        </svg>
                                        Pending
                                    </span>
                                    @endif
                                </div>
                                </td>

                                <!--RESCHEDULING AND CANCELLING-->
                                <td class="size-px whitespace-nowrap align-top">
                                <div class="flex items-center gap-x-2 py-7">
                                @if (auth()->user()->role == 0)
                                  <a href="/student/reschedule/{{$appointment->id}}" class="bg-blue-500 rounded text-white p-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                    </svg>
                                  </a>
                            @elseif(auth()->user()->role == 1)
                              <a href="/lecturer/reschedule/{{$appointment->id}}" class="bg-blue-500 rounded text-white p-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                    </svg>
                                  </a>
                            @elseif(auth()->user()->role == 3)
                                <a href="/academic_admin/reschedule/{{$appointment->id}}" class="bg-blue-500 rounded text-white p-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                    </svg>
                                  </a>
                            @endif
                                   <!-- Cancellation Reason Input -->
                            <button class="bg-red-500 rounded text-white p-1 ml-3" wire:click="cancel({{$appointment->id}})" wire:confirm="Are you sure you want to cancel the appointment?">
                              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                              </svg>
                            </button>
                                </td>





                                </tr>
                @endforeach
             @else
             <tr>
                <td colspan="5">
                    No Data Found!
                </td>
             </tr>
             @endif 
            
          

           

              
            </tbody>
          </table>
          <!-- End Table -->

          
        </div>
      </div>
    </div>
  </div>
  <!-- End Card -->

 

</div>
<!-- End Table Section -->

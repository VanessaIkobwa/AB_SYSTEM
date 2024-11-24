<!-- Table Section -->
<div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">

@if(session()->has('message'))
        <div class="mt-2 bg-teal-500 text-sm text-white rounded-lg p-4" role="alert" tabindex="-1" aria-labelledby="hs-solid-color-success-label">
          <span id="hs-solid-color-success-label" class="font-bold">Success</span> {{session('message')}}
                </div>
@endif
  <!-- Card -->
  <div class="flex flex-col">
    <div class="-m-1.5 overflow-x-auto">
      <div class="p-1.5 min-w-full inline-block align-middle">
        <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden dark:bg-neutral-900 dark:border-neutral-700">
          <!-- Header -->
          <div class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-b border-gray-200 dark:border-neutral-700">
            <div>
              <h2 class="text-xl font-semibold text-gray-800 dark:text-neutral-200">
               Lecturers
              </h2>
              <p class="text-sm text-gray-600 dark:text-neutral-400">
                Registered Lecturers.
              </p>
            </div>

            <div>
              <div class="inline-flex gap-x-2">
              

                <a class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none" href="/admin/create/lecturer">
                  <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="M12 5v14"/></svg>
                  Create
                </a>
              </div>
            </div>
          </div>
          <!-- End Header -->

         <!-- Table -->
<table class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700">
  <thead class="bg-gray-50 divide-y divide-gray-200 dark:bg-neutral-800 dark:divide-neutral-700">
    <tr>
      <th scope="col" class="px-6 py-3 text-left border-s border-gray-200 dark:border-neutral-700">
        <span class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-neutral-200">
          Lecturer ID
        </span>
      </th>

      <th scope="col" class="px-6 py-3 text-left border-s border-gray-200 dark:border-neutral-700">
        <span class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-neutral-200">
          Lecturer Name
        </span>
      </th>

      <th scope="col" class="px-6 py-3 text-left border-s border-gray-200 dark:border-neutral-700">
        <span class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-neutral-200">
          Email
        </span>
      </th>

      <th scope="col" class="px-6 py-3 text-left border-s border-gray-200 dark:border-neutral-700">
        <span class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-neutral-200">
          Unit
        </span>
      </th>

      <th scope="col" class="px-6 py-3 text-left border-s border-gray-200 dark:border-neutral-700">
        <span class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-neutral-200">
          Department
        </span>
      </th>

     

      <th scope="col" class="px-6 py-3 text-left border-s border-gray-200 dark:border-neutral-700">
        <span class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-neutral-200">
          Office
        </span>
      </th>

      <th scope="col" class="px-6 py-3 text-left border-s border-gray-200 dark:border-neutral-700">
        <span class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-neutral-200">
          Featured
        </span>
      </th>

      <th scope="col" class="px-6 py-3 text-left border-s border-gray-200 dark:border-neutral-700">
        <span class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-neutral-200">
          Action
        </span>
      </th>
    </tr>
  </thead>

  <tbody class="divide-y divide-gray-200 dark:divide-neutral-700">
    @if(count($lecturers) > 0)
      @foreach($lecturers as $item)
        <tr>
          <!-- ID -->
          <td class="h-px w-auto whitespace-nowrap">
            <div class="px-6 py-2">
              <span class="font-semibold text-sm text-gray-800 dark:text-neutral-200">{{$loop->iteration}}</span>
            </div>
          </td>

          <!-- Name -->
          <td class="h-px w-auto whitespace-nowrap">
            <div class="px-6 py-2">
              <span class="font-semibold text-sm text-gray-800 dark:text-neutral-200">{{$item->lecturerUser->name}}</span>   
            </div>
          </td>

          <!-- Email -->
          <td class="h-px w-auto whitespace-nowrap">
            <div class="px-6 py-2">
              <span class="font-semibold text-sm text-gray-800 dark:text-neutral-200">{{$item->lecturerUser->email}}</span>   
            </div>
          </td>

           <!-- Unit -->
           <td class="h-px w-auto whitespace-nowrap">
            <div class="px-6 py-2">
              <span class="font-semibold text-sm text-gray-800 dark:text-neutral-200">{{$item->unit->unit_name}}</span>   
            </div>
          </td>

          <!-- Department -->
          <td class="h-px w-auto whitespace-nowrap">
            <div class="px-6 py-2">
              <span class="font-semibold text-sm text-gray-800 dark:text-neutral-200">{{$item->department_name}}</span>   
            </div>
          </td>

         

          <!-- Office -->
          <td class="h-px w-auto whitespace-nowrap">
            <div class="px-6 py-2">
              <span class="font-semibold text-sm text-gray-800 dark:text-neutral-200">{{$item->office}}</span>   
            </div>
          </td>

          <!-- Featured -->
          <td class="h-px w-auto whitespace-nowrap">
            <div class="px-6 py-2">

            <div class="flex items-center">
                <input type="checkbox" 
                @if($item->is_featured == 1)
                      checked
                @endif
                
                wire:click="featured({{$item->id}})" id="hs-xs-switch" class="relative w-[35px] h-[21px] bg-gray-100 border-transparent text-transparent rounded-full cursor-pointer transition-colors ease-in-out duration-200 focus:ring-blue-600 disabled:opacity-50 disabled:pointer-events-none checked:bg-none checked:text-blue-600 checked:border-blue-600 focus:checked:border-blue-600 dark:bg-neutral-800 dark:border-neutral-700 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-600

                before:inline-block before:size-4 before:bg-white checked:before:bg-blue-200 before:translate-x-0 checked:before:translate-x-full before:rounded-full before:shadow before:transform before:ring-0 before:transition before:ease-in-out before:duration-200 dark:before:bg-neutral-400 dark:checked:before:bg-blue-200">
               <label for="hs-xs-switch" class="text-sm text-gray-500 ms-3 dark:text-neutral-400"></label>
            </div>        

            </div>
          </td>

          <!-- Action -->
          <td class="h-px w-auto whitespace-nowrap">
            <a class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none" href="/edit/unit/{{$item->id}}">
              Edit
            </a>
            <button wire:confirm.prevent="Are you sure?" wire:click="delete({{$item->id}})" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-red-600 text-white hover:bg-red-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
              Delete
            </button>
          </td>
        </tr>
      @endforeach
    @else
      <tr>
        <td colspan="7" class="text-center px-6 py-2">No data</td>
      </tr>
    @endif
  </tbody>
</table>

          <!-- End Table -->

          <!-- Footer -->
        
          <!-- End Footer -->
        </div>
      </div>
    </div>
  </div>
  <!-- End Card -->
</div>
<!-- End Table Section -->

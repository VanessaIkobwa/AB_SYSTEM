<div>
<div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
<form wire:submit="register" class="p-5">
        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input wire:model="name" id="name" class="block mt-1 w-full" type="text" name="name"  autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input wire:model="email" id="email" class="block mt-1 w-full" type="email" name="email"  autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        
        <!-- Department-->
        <div>
            <x-input-label for="name" :value="__('Department Name')" />
            <select wire:model="department_name" class="py-3 px-4 pe-9 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                    <option selected="">~Select Department~</option>
                    <option>Mentorship Department</option>
                    <option>School of Computing and Engineering Sciences</option>
                    <option>Institute for Advanced Studies in International Criminal Justice</option>
                    <option> School of Humanities and Social Sciences</option>
                    <option>School of Graduate Studies</option>
                    <option>School of Humanities and Social Sciences</option>
                    <option>Law School</option>
                    <option>Institute of Mathematical Sciences</option>
                    <option>Business School</option>
                    <option>Institute for Advanced Studies in International Criminal Justice</option>
                    <option>School of Graduate Studies</option>


            </select>
            <x-input-error :messages="$errors->get('department_name')" class="mt-2" />

        </div>

         <!-- Office -->
         <div>
            <x-input-label for="name" :value="__('Office')" />
            <x-text-input wire:model="office" id="office" class="block mt-1 w-full" type="text" name="office"  autofocus autocomplete="office" />
            <x-input-error :messages="$errors->get('office')" class="mt-2" />
        </div> 

        <!-- Units-->
        <div>
            <x-input-label for="name" :value="__('Units')" />
            <select wire:model="unit_id" class="py-3 px-4 pe-9 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                    <option selected="">~Select Unit~</option>
                    @foreach($units as $item)
                    <option value="{{$item->id}}">{{$item->unit_name}}</option>

                    @endforeach
            </select>
            <x-input-error :messages="$errors->get('unit_id')" class="mt-2" />

        </div>
        

            

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input wire:model="password" id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password 
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input wire:model="password_confirmation" id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation"  autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>-->

        <div class="flex items-center justify-end mt-4">

        
        <a class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-red-600 text-white hover:bg-red-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none" href="/admin/lecturers">
                  Cancel
                </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</div>
</div>
</div>
</div>


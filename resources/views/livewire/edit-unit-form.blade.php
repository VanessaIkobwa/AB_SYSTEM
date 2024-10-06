<div>
<div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
<form wire:submit="update" class="p-5">
        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Unit Name')" />
            <x-text-input wire:model="name" id="name" class="block mt-1 w-full" type="text" name="name" autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Unit Code 
        <div >
            <x-input-label for="name" :value="__('Unit Code')" />
            <x-text-input wire:model="unit_code" id="unit_code" class="block mt-1 w-full" type="text" name="unit_code" autofocus autocomplete="unit_code" />
            <x-input-error :messages="$errors->get('unit_code')" class="mt-2" />
        </div> -->

       

       

     

            

      
       
        <div class="flex items-center justify-end mt-4">

        
        <a class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-red-600 text-white hover:bg-red-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none" href="/admin/units">
                  Cancel
                </a>

            <x-primary-button class="ms-4">
                {{ __('Update') }}
            </x-primary-button>
        </div>
    </form>
</div>
</div>
</div>
</div>



<div>
    <form wire:submit.prevent="submit" class="max-w-md mx-auto bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-lg font-semibold mb-4">Provide a Reason for Booking</h2>

        @if (session()->has('message'))
            <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
                {{ session('message') }}
            </div>
        @elseif (session()->has('error'))
            <div class="bg-red-100 text-red-800 p-3 rounded mb-4">
                {{ session('error') }}
            </div>
        @endif

        <div class="mb-4">
            <label for="reason" class="block text-sm font-medium text-gray-700">Reason</label>
            <textarea id="reason" wire:model.defer="reason" rows="4" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500"></textarea>

            @error('reason') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
            Submit
        </button>
    </form>
</div>


<x-app-layout>
    <x-slot name="header">
      <div class="flex items-center justify-between">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('New Category') }}
        </h2>
      </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="flex justify-center">
                <div class="p-6 bg-white border-gray-200 w-1/3">
                  <form action="/category" method="post">
                    @csrf
                    <div>
                        <x-label for="name" :value="__('Name')" />
                        <x-input id="name" class="block mt-1 w-full" type="text" name="name" required autofocus />
                    </div>
                    <div class="mt-4">
                      <x-button type="submit">Create</x-button>
                    </div>
                  </form>
                </div>
            </div>
            </div>
        </div>
    </div>
</x-app-layout>
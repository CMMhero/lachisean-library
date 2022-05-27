<x-app-layout>
    <x-slot name="header">
      <div class="flex items-center justify-between">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('New Admin') }}
        </h2>
      </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="flex justify-center">
                <div class="p-6 bg-white border-gray-200 w-1/3">
                  <form action="/admins" method="post" enctype="multipart/form-data">
                    @csrf
                    <div>
                        <x-label for="name" :value="__('Name')" />
                        <x-input id="name" class="block mt-1 w-full" type="text" name="name" required autofocus />
                    </div>

                    <div class="mt-4">
                        <x-label for="email" :value="__('Email')" />
                        <x-input id="email" class="block mt-1 w-full" type="email" name="email" required />
                    </div>

                    <div class="mt-4">
                        <x-label for="password" :value="__('Password')" />
                        <x-input id="password" class="block mt-1 w-full"
                                        type="password"
                                        name="password"
                                        required autocomplete="new-password" />
                    </div>

                    <div class="mt-4">
                      <x-label for="photo" :value="__('Photo')"/>
                      <label for="photo" class="mt-1 shadow-sm sm:rounded-lg flex flex-col justify-center items-center w-full h-64 bg-gray-50 rounded-lg border-gray-300 border cursor-pointer dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600 ">
                          <div class="flex flex-col justify-center items-center pt-5 pb-6 py-4">
                              <svg class="mb-3 w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path></svg>
                              <p class="text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                          </div>
                          <input id="photo" name="photo" type="file" class="hidden" />
                      </label>
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
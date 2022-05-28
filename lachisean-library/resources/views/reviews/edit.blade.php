<x-app-layout>
    <x-slot name="header">
      <div class="flex items-center justify-between">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Review') }}
        </h2>
      </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                  <div class="py-4">
                        <form action="/reviews/{{$review->id}}" method="post">
                          @csrf
                          @method('PUT')
                          <div>
                            <textarea class="block mt-1 w-full sm:rounded-lg shadow-sm border-gray-300" name="content" rows="5" cols="50" required>{{$review->content}}</textarea><br/>
                            <div>
                                <x-label for="rating" :value="__('Rating')" />
                                <div class="mt-1 w-20">
                                    <select name="rating" id="rating" required value="{{ $review->rating }}" class="block mt-1 w-full sm:rounded-lg shadow-sm border-gray-300">
                                        <option value="{{$review->rating}}" selected hidden>{{$review->rating}}</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                </div>
                            </div>
                          </div>
                          <x-button class="mt-4" type="submit">Update</x-button>
                        </form>
                      </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

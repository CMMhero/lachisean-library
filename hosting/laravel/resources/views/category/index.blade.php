<x-app-layout>
    <x-slot name="header">
      <div class="flex items-center justify-between">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Category') }}
        </h2>
        @if (Auth::check() && Auth::user()->is_admin)
          <a href="{{ route('category.create') }}">
            <x-button>+ New Category</x-button>
          </a>
        @endif
      </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                <div class="flex justify-center">
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                    <table class="min-w-full divide-y divide-gray-200">
                                        <thead class="bg-gray-100">
                                        <tr class="border-b">
                                            <th scope="col" class="px-6 py-4 text-sm font-medium text-gray-900 uppercase">
                                              Name
                                            </th>
                                            <th scope="col" class="px-6 py-4 text-sm font-medium text-gray-900 uppercase">
                                              Books
                                            </th>
                                            <th scope="col" class="px-6 py-4 text-sm font-medium text-gray-900 uppercase">
                                              Action
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-gray-200">
                                        @foreach ($categories as $category)
                                        <tr class="border-b">
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                {{ $category->name }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                {{ $category->books->count() }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                <form action="{{ route('category.destroy', $category->id) }}" method="post">
                                                  @method('DELETE')
                                                  @csrf
                                                  <a href="/books/cat/{{ $category->id }}" class="text-indigo-600 hover:text-indigo-900">View</a> ・ 
                                                  <a href="{{ route('category.edit', $category->id) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a> ・ 
                                                  <a class="text-red-600"> 
                                                  <button type="submit">Delete</button>
                                                  </a>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                      </div>
                      {{ $categories->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<x-app-layout>
    <x-slot name="header">
      <div class="flex items-center justify-between">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admins') }}
        </h2>
        @if (Auth::check() && Auth::user()->is_admin)
          <a href="{{ route('admins.create') }}">
            <x-button>+ New Admin</x-button>
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
                                              Photo
                                            </th>
                                            <th scope="col" class="px-6 py-4 text-sm font-medium text-gray-900 uppercase">
                                              Name
                                            </th>
                                            <th scope="col" class="px-6 py-4 text-sm font-medium text-gray-900 uppercase">
                                              Email
                                            </th>
                                            <th scope="col" class="px-6 py-4 text-sm font-medium text-gray-900 uppercase">
                                              Action
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-gray-200">
                                        @foreach ($admins as $admin)
                                        <tr class="border-b">
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                              <img src="{{ asset('/storage/' . $admin->photo) }}" class="w-20 h-20 shadow-sm circle fill">
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                              {{ $admin->name }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                              {{ $admin->email }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                <form action="{{ route('admins.destroy', $admin->id) }}" method="post">
                                                  @method('DELETE')
                                                  @csrf
                                                  <a href="{{ route('users.show', $admin->id) }}" class="text-indigo-600 hover:text-indigo-900">View</a> ・ 
                                                  <a href="{{ route('admins.edit', $admin->id) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a> ・ 
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
                      {{ $admins->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
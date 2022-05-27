<x-app-layout>
    <x-slot name="header">
      <div class="flex items-center justify-between">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Members') }}
        </h2>
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
                                              Reviews
                                            </th>
                                            <th scope="col" class="px-6 py-4 text-sm font-medium text-gray-900 uppercase">
                                              Action
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-gray-200">
                                            
                                        @foreach ($users as $user)
                                        <tr class="border-b">
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                              <img src="{{ asset('/storage/' . $user->photo) }}" class="h-20 w-20 shadow-sm circle fill">
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                              {{ $user->name }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                              {{ $user->email }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                              {{ $user->reviews->count() }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                @if ($user->deleted_at)
                                                <form action="{{ route('users.unblock', $user->id) }}" method="get">
                                                  @csrf
                                                  <a href="{{ route('users.show', $user->id) }}" class="text-indigo-600 hover:text-indigo-900">View</a> ・ 
                                                  <a class="text-green-600"> 
                                                  <button type="submit">Unblock</button>
                                                  </a>
                                                </form>
                                                @else
                                                <form action="{{ route('users.destroy', $user->id) }}" method="post">
                                                  @method('DELETE')
                                                  @csrf
                                                  <a href="{{ route('users.show', $user->id) }}" class="text-indigo-600 hover:text-indigo-900">View</a> ・ 
                                                  <a class="text-red-600"> 
                                                  <button type="submit">Block</button>
                                                  </a>
                                                </form>
                                                @endif
                                            </td>
                                        </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                      </div>
                      {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<x-app-layout>
    <x-slot name="header">
      <div class="flex items-center justify-between">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __($title) }}
        </h2>
        @if (Auth::check() && Auth::user()->is_admin)
          <a href="{{ route('books.create', ['categories' => $categories]) }}">
            <x-button>+ New Book</x-button>
          </a>
        @endif
      </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex justify-center">
                    <div class="w-1/3 py-2">
                      <form action="{{ route('books.search') }}" method="get">
                        @csrf
                        <div class="xl:w-96">
                          <div class="input-group relative flex flex-wrap items-stretch w-full mb-4">
                            <input type="search" name="q" id="q" class="form-control relative flex-auto min-w-0 block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" placeholder="Search Books" @if($title != "Books") value="{{ $title }}" @endif aria-label="Search Book">
                            <x-button class="btn px-6 py-2.5 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700  focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out flex items-center" type="submit">
                              <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="search" class="w-4" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                <path fill="currentColor" d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z"></path>
                              </svg>
                            </x-button>
                          </div>
                        </div>
                      </form>
                      </div>
                    </div>

                    <div class="flex justify-center mb-4 py-2">
                      <x-button onclick="document.location='/books'">All</x-button>
                      @foreach ($categories as $category)
                      <x-button onclick="document.location='/books/cat/{{$category->id}}'">{{ $category->name }}</x-button>
                      @endforeach
                    </div>

                    @if (Auth::check() && Auth::user()->is_admin)

                      <div class="flex justify-center">
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                @if (count($books) == 0)
                                  <div class="flex justify-center py-6">
                                    <span class="font-semibold text-xl text-gray-800">No books found.</span>
                                  </div>
                                @else
                                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                    <table class="min-w-full divide-y divide-gray-200">
                                        <thead class="bg-gray-100">
                                        <tr class="border-b">
                                            <th scope="col" class="px-6 py-4 text-sm font-medium text-gray-900 uppercase">
                                              Cover
                                            </th>
                                            <th scope="col" class="px-6 py-4 text-sm font-medium text-gray-900 uppercase">
                                              Book
                                            </th>
                                            <th scope="col" class="px-6 py-4 text-sm font-medium text-gray-900 uppercase">
                                              Category
                                            </th>
                                            <th scope="col" class="px-6 py-4 text-sm font-medium text-gray-900 uppercase">
                                              Author
                                            </th>
                                            <th scope="col" class="relative px-6 py-4 text-sm font-medium text-gray-900 uppercase">
                                              Action
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-gray-200">
                                        @foreach ($books as $book)
                                        <tr class="border-b">
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                <img src="{{ asset('/storage/' . $book->cover) }}" class="h-30 w-20 shadow-sm sm:rounded-lg">
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                {{ $book->title }}
                                                <div class="flex items-center">
                                                  @if ($book->reviews->count() != null)
                                                    <a>{{ $book->reviews->avg('rating') }} ★・</a>
                                                  @else
                                                    <a>0 ★・</a>
                                                  @endif
                                                  <span >{{ $book->reviews->count() }} review(s)</span>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                {{ $book->category->name }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                {{ $book->author }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                <form action="/books/{{$book->id}}" method="post">
                                                  @method('DELETE')
                                                  @csrf
                                                  <a href="{{ route('books.show', $book) }}" class="text-indigo-600 hover:text-indigo-900">View</a> ・ 
                                                  <a href="{{ route('books.edit', $book) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a> ・ 
                                                  <a class="text-red-600"> 
                                                  <button type="submit">Delete</button>
                                                  </a>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                    @endif
                                </div>
                            </div>
                        </div>
                      </div>
                    @else

                      <div class="flex max-w-6xl py-6 justify-center">
                      @if (count($books) == 0)
                        <div class="flex justify-center py-6">
                          <span class="font-semibold text-xl text-gray-800">No books found.</span>
                        </div>
                      @else
                        @for ($i = 0; $i < 4; $i++)
                          @if ($books[$i] != null)
                            <div class="flex flex-col mx-1.5">
                              <a href="{{ route('books.show', $books[$i]) }}">
                                <div class="flex-1 bg-gray-800 overflow-hidden shadow sm:rounded-lg w-60">
                                  <div class="flex justify-center">
                                    <img src="{{ asset('/storage/' . $books[$i]->cover) }}" class="h-23">
                                  </div>
                                  <div class="p-6">
                                    <p class="block font-semibold text-xl text-white mb-2">{{ $books[$i]->title }}</p>
                                    <p class="text-gray-300 text-base">{{ $books[$i]->category->name }}</p>
                                    <p class="text-gray-400 text-base">{{ $books[$i]->author }}</p>
                                    <div class="flex items-center">
                                      @if ($books[$i]->reviews->count() != null)
                                        <a class="text-gray-300 text-sm">{{ $books[$i]->reviews->avg('rating') }} ★・</a>
                                      @else
                                        <a class="text-sm text-gray-300">0 ★・</a>
                                      @endif
                                      <span class="text-sm text-gray-300">{{ $books[$i]->reviews->count() }} review(s)</span>
                                    </div>
                                  </div>
                                </div>
                              </a>
                            </div>
                          @endif
                        @endfor
                      </div>
                      <div class="flex max-w-6xl py-6 justify-center">
                        @for ($i = 4; $i < 8; $i++)
                          @if ($books[$i] != null)
                            <div class="flex flex-col mx-1.5">
                              <a href="{{ route('books.show', $books[$i]) }}">
                                <div class="flex-1 bg-gray-800 overflow-hidden shadow sm:rounded-lg w-60">
                                  <div class="flex justify-center">
                                    <img src="{{ asset('/storage/' . $books[$i]->cover) }}" class="h-23">
                                  </div>
                                  <div class="p-6">
                                    <p class="block font-semibold text-xl text-white mb-2">{{ $books[$i]->title }}</p>
                                    <p class="text-gray-300 text-base">{{ $books[$i]->category->name }}</p>
                                    <p class="text-gray-400 text-base">{{ $books[$i]->author }}</p>
                                    <div class="flex items-center">
                                      @if ($books[$i]->reviews->count() != null)
                                        <a class="text-gray-300 text-sm">{{ $books[$i]->reviews->avg('rating') }} ★・</a>
                                      @else
                                        <a class="text-sm text-gray-300">0 ★・</a>
                                      @endif
                                      <span class="text-sm text-gray-300">{{ $books[$i]->reviews->count() }} review(s)</span>
                                    </div>
                                  </div>
                                </div>
                              </a>
                            </div>
                          @endif
                        @endfor
                      </div>
                      @endif

                      @endif
                      {{ $books->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

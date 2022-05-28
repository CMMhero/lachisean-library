<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Book Detail') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex flex-wrap">
                        <div class="w-1/6 py-4 px-4">
                            <img src="{{ asset('/storage/' . $book->cover) }}" class="w-full shadow-sm sm:rounded-lg">
                            <div class="flex items-center justify-center mt-4">
                            @if ($book->reviews->count() != null)
                                <a class="text-gray-600">{{ $book->reviews->avg('rating') }} ★</a>
                            @else
                                <a class="text-gray-600">0 ★</a>
                            @endif
                            </div>
                        </div>
                        <div class="w-5/6 py-4 px-4">
                            <h1 class="text-xl font-semibold">{{$book->title}}</h1>
                            <p>{{$book->author}}</p>
                            <p>{{$book->category->name}}</p>
                            <p class="py-6 text-gray-600 text-sm">{{$book->description}}</p>
                            @if (Auth::check() && Auth::user()->is_admin)
                                <a href="/books/{{$book->id}}/edit">
                                    <x-button>Edit</x-button>
                                </a>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="p-6 bg-white border-b border-gray-200">
                    <p class="font-semibold text-xl">Recommended Books</p>
                    @if ($recommendedBooks->count() == 0)
                        <p class="text-gray-600">No recommended books yet</p>
                    @else
                        <div class="flex items-center py-2 mx-auto">
                        @foreach ($recommendedBooks as $recommendedBook)
                            <a href="/books/{{ $recommendedBook->id }}">
                                    <div class="mr-4 mx-auto">
                                        <img src="{{ asset('/storage/' . $recommendedBook->cover) }}" class="w-20 shadow-sm sm:rounded-lg">
                                    </div>
                                    <div class="ml-4 mx-auto">
                                        <a href="/books/{{ $recommendedBook->id }}" class="font-semibold">{{$recommendedBook->title}}</a><br/>
                                        <a class="text-gray-600 text-sm">{{$recommendedBook->author}}</a><br/>
                                        <a class="text-gray-600 text-sm">{{$recommendedBook->category->name}}</a>
                                        <div class="flex items-center">
                                        @if ($recommendedBook->reviews->count() != null)
                                            <a class="text-gray-600 text-sm">{{ $recommendedBook->reviews->avg('rating') }} ★・</a>
                                        @else
                                            <a class="text-sm text-gray-600">0 ★・</a>
                                        @endif
                                        <span class="text-sm text-gray-600">{{ $recommendedBook->reviews->count() }} review(s)</span>
                                        </div>
                                    </div>
                            </a>
                        @endforeach
                        </div>
                    @endif
                </div>

                  <div class="p-6 bg-white border-b border-gray-200">
                      <p class="font-semibold text-xl">Reviews</p>
                        @if ($book->reviews->count() == 0)
                            <p class="text-gray-600">No reviews yet</p>
                        @else
                        @foreach ($reviews as $review)
                            <div class="flex py-2">
                            <a href="{{ route('users.show', $review->user->id) }}">
                                <div class="mr-4">
                                    <img src="{{ asset('/storage/' . $review->user->photo) }}" class="h-20 w-20 shadow-sm circle fill">
                                </div>
                                <div class="ml-4 w-5/6">
                                    <strong>{{$review->user->name}}</strong></a>・<a class="text-gray-600 text-sm">{{$review->created_at->diffForHumans()}}</a>
                                        @if ($review->updated_at != $review->created_at)
                                            <a class="text-gray-600 text-sm">(edited)</a>
                                        @endif
                                    <br/>
                                    @for ($i = 0; $i < $review->rating; $i++)
                                        <a class="text-gray-600 text-sm">★</a>
                                    @endfor
                                    <p>{{$review->content}}</p>
                                    @if (Auth::check() && $review->user->id == Auth::user()->id && $book->reviews->where('user_id', Auth::user()->id)->count() > 0)
                                        <div class="flex items-center">
                                            <div>
                                                <form action="{{ route('reviews.destroy', $book->reviews->where('user_id', Auth::user()->id)->first()->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <a class="text-indigo-600 text-sm" href="{{ route('reviews.edit', $book->reviews->where('user_id', Auth::user()->id)->first()->id) }}">Edit My Review</a> ・ 
                                                    <a class="text-red-600 text-sm">
                                                    <button type="submit">Delete My Review</button>
                                                    </a>
                                                </form>
                                            </div>
                                        </div>
                                    @endif
                                    @if (Auth::check() && Auth::user()->is_admin && $review->user->id != Auth::user()->id)
                                        <form action="{{ route('reviews.destroy', $review->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 text-sm">Delete this review</button>
                                        </form>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                        @endif

                    @if (Auth::check())
                        @if ($book->reviews->where('user_id', Auth::user()->id)->count() == 0)
                        <div class="py-4">
                            <form action="/reviews" method="post">
                            @csrf
                            <input type="hidden" name="book_id" value="{{$book->id}}">
                            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                            <div>
                                <textarea class="block mt-1 w-full sm:rounded-lg shadow-sm border-gray-300" name="content" rows="5" cols="50" required></textarea><br/>
                                <div>
                                    <x-label for="rating" :value="__('Rating')" />
                                    <div class="mt-1 w-20">
                                        <select name="rating" id="rating" required class="block mt-1 w-full sm:rounded-lg shadow-sm border-gray-300">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <x-button class="mt-4" type="submit">Add Review</x-button>
                            </form>
                        </div>
                        @endif
                    {{ $reviews->links() }}
                    @else
                    <div class="py-4 flex justify-center">
                      <p>You must <a class="text-indigo-600" href="{{ route('login') }}">log in</a> to add a review.</p>
                    </div>
                    @endif
                  </div>
            </div>
        </div>
    </div>
</x-app-layout>
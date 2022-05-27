<x-app-layout>
    <x-slot name="header">
      <div class="flex items-center justify-between">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __($user->name . "'s Profile") }}
        </h2>
      </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex items-center">
                    <div class="mr-4">
                        <img src="{{ asset('/storage/' . $user->photo) }}" class="h-20 w-20 shadow-sm circle fill">
                    </div>
                    <div class="ml-4">
                        <a class="font-semibold text-xl">{{$user->name}}</a><br/>
                        {{$user->email}}<br/>
                        Joined at {{date('d F Y', strtotime($user->created_at))}}<br/>
                        @if (Auth::check() && Auth::user()->id == $user->id)
                            <a href="/users/{{$user->id}}/edit">
                                <x-button>Edit</x-button>
                            </a>
                        @endif
                    </div>
                </div>
                </div>
                <div class="p-6 bg-white border-b border-gray-200">
                        <p class="font-semibold text-xl">Reviews</p>
                        @if ($user->reviews->count() == 0)
                            <p class="text-gray-600">No reviews yet</p>
                        @else
                            @foreach ($user->reviews as $review)
                            <a href="/books/{{ $review->book->id }}">
                                <div class="flex py-2">
                                    <div class="mr-4">
                                        <img src="{{ asset('/storage/' . $review->book->cover) }}" class="w-20 shadow-sm sm:rounded-lg">
                                    </div>
                                    <div class="ml-4 w-5/6">
                                        <strong>{{$review->book->title}}</strong><br/>
                                        <a class="text-gray-600 text-sm">{{$review->created_at->diffForHumans()}}</a><br/>
                                        @for ($i = 0; $i < $review->rating; $i++)
                                            <a class="text-gray-600 text-sm">★</a>
                                        @endfor
                                        <p>{{$review->content}}</p>
                                        @if (Auth::check() && (Auth::user()->id == $user->id || Auth::user()->is_admin))
                                            <form action="/reviews/{{$review->id}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                @if (Auth::check() && Auth::user()->id == $user->id)
                                                    <a class="text-indigo-600 text-sm" href="{{ route('reviews.edit', $review->id) }}">Edit My Review</a> ・ 
                                                @endif
                                                <button type="submit" class="text-red-600 text-sm">Delete this review</button>
                                            </form>
                                        @endif
                                    </div>
                                </div>
                            </a>
                            @endforeach
                        @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
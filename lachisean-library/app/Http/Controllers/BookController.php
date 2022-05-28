<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Category;
use App\Models\User;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        
        $books = Book::paginate(8);
        $title = "Books";
        return view('books.index', [
            'books' => $books, 
            'title' => $title, 
            'categories' => $categories,
        ]);
    }

    public function indexByCategory($category_id) {
        $books = Book::where('category_id', $category_id)->paginate(8);
        $categories = Category::all();
        $category = Category::find($category_id)->name;
        $title = $category . " Books";
        return view('books.index', [
            'books' => $books, 
            'title' => $title,
            'categories' => $categories,
        ]);
    }

    public function search(Request $request) {
        $q = $request->q;

        $books = Book::where('title', 'like', '%' . $q . '%')
            ->orWhere('author', 'like', '%' . $q . '%')
            ->orWhere('description', 'like', '%' . $q . '%')
            ->paginate(8)
            ->appends(['q' => $q]);

        $categories = Category::all();
        $title = $q;
        return view('books.index', [
            'books' => $books, 
            'title' => $title,
            'categories' => $categories,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!Gate::allows('create-book')) {
            abort('403');
        }

        $categories = Category::all();
        return view('books.create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!Gate::allows('create-book')) {
            abort('403');
        }

        if ($request->hasFile('cover')) {
            $path = $request->file('cover')->storePublicly('cover', 'public');
        } else {
            $path = 'cover/default.png';
        }

        $book = new Book();
        $book->title = $request->title;
        $book->description = $request->description;
        $book->category_id = $request->category_id;
        $book->author = $request->author;
        $book->cover = $path;
        $book->save();
        return redirect('/books')->with('success', 'Book created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = Book::find($id);
        $reviews = Review::where('book_id', $id)->paginate(4);

        $recommendedBooks = Book::where('id', '!=', $id)
            ->where(function ($query) use ($book) {
                $query->where('title', 'like', '%' . $book->title . '%')
                    ->orWhere('author', 'like', '%' . $book->author . '%')
                    ->orWhere('description', 'like', '%' . $book->description . '%')
                    ->orWhere('category_id', $book->category_id);
            })
            ->limit(4)
            ->get();

        return view('books.show', [
            'book' => $book,
            'reviews' => $reviews,
            'recommendedBooks' => $recommendedBooks,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = Book::find($id);
        $categories = Category::all();
        if (!Gate::allows('update-book', $book)) {
            abort('403');
        }

        return view('books.edit', ['book' => $book, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (!Gate::allows('update-book')) {
            abort('403');
        }

        $book = Book::find($id);
        $book->title = $request->title;
        $book->description = $request->description;
        $book->category_id = $request->category_id;
        $book->author = $request->author;
        if ($request->hasFile('cover')) {
            $book->cover = $request->file('cover')->storePublicly('cover', 'public');
        }
        $book->save();
        return redirect('/books/' , $book->id)->with('success', 'Book updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!Gate::allows('delete-book')) {
            abort('403');
        }

        $book = Book::find($id);
        $reviews = Review::withTrashed()->where('book_id', $id)->get();
        foreach ($reviews as $review) {
            $review->forceDelete();
        }
        $book->delete();
        return redirect('/books')->with('success', 'Book deleted');
    }
}

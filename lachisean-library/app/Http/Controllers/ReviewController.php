<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Book;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reviews = Review::paginate(5);
        return view('reviews.index', [
            'reviews' => $reviews
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $review = new Review();
        $review->user_id = $request->user_id;
        $review->book_id = $request->book_id;
        $review->content = $request->content;
        $review->rating = $request->rating;
        $review->save();
        return redirect('/books/' . $review->book->id)->with('success', 'Review added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $review = Review::find($id);
        return view('reviews.edit', [
            'review' => $review
        ]);
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
        $review = Review::find($id);

        if (!Gate::allows('update-review', $review)) {
            abort('403');
        }

        $review->content = $request->content;
        $review->rating = $request->rating;
        $review->save();
        return redirect('/books/' . $review->book->id)->with('success', 'Review updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $review = Review::find($id);

        if (Gate::allows('update-review', $review)) {
            $review->forceDelete();
            return redirect()->back()->with('success', 'Review deleted');
        }

        if(!Gate::allows('delete-review', Auth::user())) {
            abort('403');
        }

        $review->forceDelete();
        return redirect()->back()->with('success', 'Review deleted');
    }
}

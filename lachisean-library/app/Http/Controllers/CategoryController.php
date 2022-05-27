<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::paginate(5);
        return view('category.index', ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!Gate::allows('create-category', Auth::user())) {
            abort('403');
        }

        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!Gate::allows('update-category', Auth::user())) {
            abort('403');
        }

        $this->validate($request, [
            'name' => 'required|string|max:25',
        ]);

        $category = new Category();
        $category->name = $request->name;
        $category->save();
        return redirect('/category')->with('success', 'Category added');
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
        if(!Gate::allows('update-category', Auth::user())) {
            abort('403');
        }
        
        $category = Category::find($id);
        return view('category.edit', ['category' => $category]);
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
        if(!Gate::allows('update-category', Auth::user())) {
            abort('403');
        }

        $this->validate($request, [
            'name' => 'required|string|max:25',
        ]);

        $category = Category::find($id);
        $category->name = $request->name;
        $category->save();
        return redirect('/category')->with('success', 'Category updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!Gate::allows('delete-category', Auth::user())) {
            abort('403');
        }

        $category = Category::find($id);
        $category->delete();
        return redirect('/category')->with('success', 'Category deleted');
    }
}

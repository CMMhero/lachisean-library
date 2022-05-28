<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins = User::where('is_admin', true)->paginate(5);
        return view('admins.index', ['admins' => $admins]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!Gate::allows('create-admin')) {
            abort('403');
        }

        return view('admins.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!Gate::allows('create-admin')) {
            abort('403');
        }

        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->storePublicly('photo', 'public');
        } else {
            $path = 'photo/admin.png';
        }

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->photo = $path;
        $user->password = bcrypt($request->password);
        $user->is_admin = true;
        $user->save();

        return redirect('/admins')->with('success', 'Created admin');
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
        $admin = User::find($id);
        if(!Gate::allows('update-admin', $admin)) {
            abort('403');
        }

        return view('admins.edit', ['admin' => $admin]);
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
        $admin = User::find($id);
        if(!Gate::allows('update-admin', Auth::user())) {
            abort('403');
        }

        $admin->name = $request->name;
        $admin->email = $request->email;
        if ($request->hasFile('photo')) {
            $admin->photo = $request->file('photo')->storePublicly('photo', 'public');
        }
        if ($request->password) {
            $admin->password = bcrypt($request->password);
        }
        $admin->save();

        return redirect()->back()->with('success', 'Updated admin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $admin = User::find($id);
        if(!Gate::allows('delete-admin', Auth::user())) {
            abort('403');
        }

        $admin->forceDelete();

        return redirect('/admins')->with('success', 'Deleted admin');
    }
}

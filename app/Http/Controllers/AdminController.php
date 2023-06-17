<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() // show all users
    {
        $users = User::all();
        return view('admin.users', compact('users'));
    }

    public function update(Request $request, User $user)
    {

        $this->validate($request, [
            'administration_level' => 'required',
        ]);

        $user->update([
            'administration_level' => $request->administration_level,
        ]);

        return back()->with('success', 'User updated successfully.');
    }
}

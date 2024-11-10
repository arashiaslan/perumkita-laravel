<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }
    public function profile()
    {
        $admin = auth()->user();
        return view('admin.profile', compact('admin'));
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,'.auth()->id(),
    ]);

        $admin = auth()->user();
        $admin->name = $request->input('name');
        $admin->email = $request->input('email');
        $admin->save();

        return redirect()->route('admin.profile')->with('success', 'Profile updated successfully');
    }

    public function user_data()
    {
        $users = User::all();
        return view('admin.user-data', compact('users'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id); // Cari user berdasarkan ID
        return view('admin.user-edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,'.$id,
    ]);

        $user = User::findOrFail($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->save();

        return redirect()->route('admin.user.edit', $id)->with('success', 'User updated successfully');
    }

    public function delete($id)
    {
        User::findOrFail($id)->delete();
        return redirect()->route('admin.user.data')->with('success', 'User deleted successfully');
    }
}
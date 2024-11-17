<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Artikel;
use App\Models\Complaint;
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

    public function userData()
    {
        $users = User::where('role', 'user')->paginate(10);
        return view('admin.user-data', compact('users'));
    }

    public function editWarga($id)
    {
        $user = User::findOrFail($id); // Cari user berdasarkan ID
        return view('admin.user-edit', compact('user'));
    }

    public function updateWarga(Request $request, $id)
    {
        $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,'.$id,
    ]);

        $user = User::findOrFail($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->save();

        return redirect()->route('admin.user.data')->with('success', 'User updated successfully');
    }

    public function deleteWarga($id)
    {
        User::findOrFail($id)->delete();
        return redirect()->route('admin.user.data')->with('success', 'User deleted successfully');
    }

    public function indexComplaint()
    {   
        $complaints = Complaint::paginate(5);
        return view('admin.complaint', compact('complaints'));
    }

    public function updateComplaint(Request $request, $id)
    {
        // Validasi input jika status diterima dari request
        $request->validate([
            'status' => 'required|in:pending,proses,selesai',
        ]);

        // Cari complaint berdasarkan ID
        $complaint = Complaint::findOrFail($id);

        // Update status
        $complaint->status = $request->status;
        $complaint->save();

        // Redirect dengan pesan sukses
        return redirect()->route('admin.complaints.index')->with('success', 'Status berhasil diperbarui');
    }

    public function indexArtikel()
    {
        $articles = Artikel::paginate(5);
        return view('admin.artikel', compact('articles'));
    }

    
    public function indexKantin()
    {
        return view('admin.kantin');
    }
    
    public function indexGaleri()
    {
        return view('admin.galeri');
    }
}
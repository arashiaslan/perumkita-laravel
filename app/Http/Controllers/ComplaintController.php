<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use Illuminate\Http\Request;

class ComplaintController extends Controller
{
    public function updateStatus($id, Request $request)
    {
        // Cari pengaduan berdasarkan ID
        $pengaduan = Pengaduan::findOrFail($id);

        // Ubah status menjadi selesai
        $pengaduan->status = 'selesai';
        $pengaduan->save();

        // Redirect atau tampilkan pesan sukses
        return redirect()->back()->with('success', 'Status pengaduan berhasil diperbarui menjadi selesai');
    }
}

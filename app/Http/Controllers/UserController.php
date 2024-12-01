<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Order;
use App\Models\Artikel;
use App\Models\Gallery;
use App\Models\Complaint;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $articles = Artikel::paginate(4);
        return view('user.index', compact('articles'));
    }

    public function profile()
    {
        $user = auth()->user();
        return view('user.profile', compact('user'));
    }

    public function updateKeluarga(Request $request)
    {
        $request->validate([
            'jumlah_anak' => 'required|integer|min:0',
            'jumlah_istri' => 'required|integer|min:0',
            'no_rumah' => 'required|string',
        ]);

        $user = auth()->user();
        $user->jumlah_anak = $request->jumlah_anak;
        $user->jumlah_istri = $request->jumlah_istri;
        $user->no_rumah = $request->no_rumah;
        $user->save();

        return redirect()->route('user.profile')->with('success', 'Profile updated successfully');
    }

    public function jadwalSholat()
    {
        return view('user.jadwal-sholat');
    }

    public function indexArtikel()
    {
        $articles = Artikel::paginate(6);
        return view('user.artikel', compact('articles'));
    }

    public function detailArtikel($id)
    {
        $article = Artikel::find($id);
        return view('user.artikel-detail', compact('article'));
    }

    public function galeri()
    {
        $galeris = Gallery::paginate(9);
        return view('user.galeri', compact('galeris'));
    }

    public function pengaduan()
    {
        return view('user.pengaduan');
    }

    public function storePengaduan(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:25',
            'description' => 'required|string|max:255',
        ]);

        Complaint::create([
            'title' => $request->title,
            'description' => $request->description,
            'user_id' => auth()->id(), // Set user_id jika pengguna login
        ]);

        return redirect()->route('user.pengaduan')->with('success', 'Pengaduan berhasil dikirim.');
    }

    public function historyPengaduan()
    {
        $complaints = Complaint::where('user_id', auth()->id())->get();
        return view('user.riwayat-pengaduan', compact('complaints'));
    }

    public function indexKantin()
    {
        $menus = Menu::paginate(6);
        return view('user.kantin', compact('menus'));
    }

    public function orderKantin(Request $request)
    {
        $request->validate([
            'menu_id' => 'required|exists:menus,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $menu = Menu::find($request->menu_id);
        $totalPrice = $menu->price * $request->quantity;

        Order::create([
            'user_id' => auth()->id(),
            'menu_id' => $menu->id,
            'quantity' => $request->quantity,
            'total_price' => $totalPrice,
            'status' => 'pending',
        ]);

        return redirect()->route('user.kantin')->with('success', 'Pesanan berhasil dibuat.');
    }

    public function myOrderKantin()
    {
        $orders = Order::where('user_id', auth()->id())->orderByRaw("FIELD(status, 'pending', 'dibuat', 'dikirim', 'diterima', 'selesai')")->orderBy('created_at', 'desc')->paginate(8);
        return view('user.kantin-pesanan', compact('orders'));
    }
}

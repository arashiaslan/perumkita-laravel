<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Order;
use App\Models\Artikel;
use App\Models\Complaint;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('user.index');
    }

    public function profile()
    {
        $user = auth()->user();
        return view('user.profile', compact('user'));
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
        return view('user.galeri');
    }

    public function kantin()
    {
        return view('user.kantin');
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

        return redirect()->route('user.pengaduan')->with('success', 'Complaint added successfully');
    }

    public function historyPengaduan()
    {
        $complaints = Complaint::where('user_id', auth()->id())->get();
        return view('user.riwayat-pengaduan', compact('complaints'));
    }

    public function indexKantin()
    {
        $menus = Menu::all();
        return view('user.kantin', compact('menus'));
    }

    public function menuKantin($id)
    {
        $menu = Menu::find($id);
        return view('user.kantin-menu', compact('menu'));
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
}

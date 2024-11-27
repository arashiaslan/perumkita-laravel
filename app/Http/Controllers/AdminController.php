<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\User;
use App\Models\Order;
use App\Models\Artikel;
use App\Models\Gallery;
use App\Models\Complaint;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //Manage Admin
    public function index()
    {
        $complaints = Complaint::where('status', 'pending')->paginate(4);
        return view('admin.index', compact('complaints'));
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
            'email' => 'required|email|unique:users,email,' . auth()->id(),
        ]);

        $admin = auth()->user();
        $admin->name = $request->input('name');
        $admin->email = $request->input('email');
        $admin->save();

        return redirect()->route('admin.profile')->with('success', 'Profile updated successfully');
    }

    //Manage Warga
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
            'email' => 'required|email|unique:users,email,' . $id,
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
        return redirect()->route('admin.user.data')->with('danger', 'User deleted successfully');
    }

    //Manage Complaint
    public function indexComplaint()
    {
        $complaints = Complaint::orderByRaw("FIELD(status, 'pending', 'proses', 'selesai')")->orderBy('created_at', 'desc')->paginate(5);
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

    //Manage Artikel
    public function indexArtikel()
    {
        $articles = Artikel::paginate(10);
        return view('admin.artikel', compact('articles'));
    }

    public function addArtikel()
    {
        $writers = User::all();
        return view('admin.artikel-add', compact('writers'));
    }

    public function storeArtikel(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Upload gambar
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images/article'), $imageName);

        // Simpan artikel ke database
        Artikel::create([
            'title' => $request->title,
            'content' => $request->content,
            'image' => 'images/article/' . $imageName,
            'writer_id' => auth()->id(),
            'writer_name' => $request->writer_name,
            'writer_email' => $request->writer_email,
        ]);

        return redirect()->route('admin.artikel.index')->with('primary', 'Artikel berhasil ditambahkan.');
    }

    public function editArtikel($id)
    {
        $article = Artikel::findOrFail($id);
        return view('admin.artikel-edit', compact('article'));
    }

    public function updateArtikel(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $article = Artikel::findOrFail($id);
        $article->title = $request->title;
        $article->content = $request->content;
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images/article'), $imageName);

            // Hapus gambar lama
            if (file_exists(public_path($article->image))) {
                unlink(public_path($article->image));
            }

            $article->image = 'images/article/' . $imageName;
        }

        $article->save();

        return redirect()->route('admin.artikel.index')->with('success', 'Artikel berhasil diperbarui.');
    }

    public function deleteArtikel($id)
    {
        $article = Artikel::findOrFail($id);
        $article->delete();
        return redirect()->route('admin.artikel.index')->with('danger', 'Artikel berhasil dihapus.');
    }

    //Manage Kantin
    public function indexKantin()
    {
        $menus = Menu::paginate(10);
        return view('admin.kantin', compact('menus'));
    }

    public function addMenu()
    {
        return view('admin.kantin-add');
    }

    public function storeMenu(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Upload gambar
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images/menu'), $imageName);

        // Simpan artikel ke database
        Menu::create([
            'name' => $request->name,
            'price' => $request->price,
            'image' => 'images/menu/' . $imageName,
        ]);

        return redirect()->route('admin.kantin.index')->with('success', 'Menu berhasil ditambahkan.');
    }

    public function editMenu($id)
    {
        $menu = Menu::findOrFail($id);
        return view('admin.kantin-edit', compact('menu'));
    }

    public function updateMenu(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $menu = Menu::findOrFail($id);
        $menu->name = $request->name;
        $menu->price = $request->price;
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images/menu'), $imageName);

            // Hapus gambar lama
            if (file_exists(public_path($menu->image))) {
                unlink(public_path($menu->image));
            }

            $menu->image = 'images/menu/' . $imageName;
        }

        $menu->save();

        return redirect()->route('admin.kantin.index')->with('success', 'Menu berhasil diperbarui.');
    }

    public function deleteMenu($id)
    {
        $menu = Menu::findOrFail($id);
        $menu->delete();
        return redirect()->route('admin.kantin.index')->with('success', 'Menu berhasil dihapus.');
    }
    public function orderKantin()
    {
        $orders = Order::with(['user', 'menu'])->orderByRaw("FIELD(status, 'pending', 'dibuat', 'dikirim', 'diterima', 'selesai')")->orderBy('created_at', 'desc')->paginate(10);
        return view('admin.kantin-pesanan', compact('orders'));
    }

    //Manage Galeri
    public function indexGaleri()
    {
        $galleries = Gallery::paginate(10);
        return view('admin.galeri', compact('galleries'));
    }

    public function addGaleri()
    {
        $today = now()->toDateString();
        return view('admin.galeri-add', compact('today'));
    }

    public function storeGaleri(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'required|string',
        ]);

        // Upload gambar
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images/galeri'), $imageName);

        // Simpan artikel ke database
        Gallery::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => 'images/galeri/' . $imageName,
        ]);

        return redirect()->route('admin.galeri.index')->with('success', 'Galeri berhasil ditambahkan.');
    }

    public function editGaleri($id)
    {
        $today = now()->toDateString();
        $gallery = Gallery::findOrFail($id);
        return view('admin.galeri-edit', compact('gallery', 'today'));
    }

    public function updateGaleri(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $gallery = Gallery::findOrFail($id);
        $gallery->title = $request->title;
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images/galeri'), $imageName);

            // Hapus gambar lama
            if (file_exists(public_path($gallery->image))) {
                unlink(public_path($gallery->image));
            }

            $gallery->image = 'images/galeri/' . $imageName;
        }

        $gallery->save();

        return redirect()->route('admin.galeri.index')->with('success', 'Galeri berhasil diperbarui.');
    }   

    public function deleteGaleri($id)
    {
        $gallery = Gallery::findOrFail($id);
        $gallery->delete();
        return redirect()->route('admin.galeri.index')->with('success', 'Galeri berhasil dihapus.');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\User;
use App\Models\Order;
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
            'email' => 'required|email|unique:users,email,' . auth()->id(),
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

        return redirect()->route('admin.artikel.index')->with('success', 'Artikel berhasil ditambahkan.');
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

    public function deleteArtikel($id) {
        $article = Artikel::findOrFail($id);
        $article->delete();
        return redirect()->route('admin.artikel.index')->with('success', 'Artikel berhasil dihapus.');
    }

    public function indexKantin()
    {
        $menus = Menu::paginate(10);
        return view('admin.kantin', compact('menus'));
    }

    public function orderKantin()
    {
        $orders = Order::with(['user', 'menu'])->get();
        return view('admin.kantin-pesanan', compact('orders'));
    }

    public function updateOrder(Request $request, Order $order)
    {
        $request->validate([
            'status' => 'required|in:pending,dibuat,dikirim,diterima','selesai',
        ]);

        $order->update(['status' => $request->status]);
        return redirect()->route('admin.canteen.orders')->with('success', 'Status pesanan berhasil diperbarui.');
    }

    public function indexGaleri()
    {
        return view('admin.galeri');
    }
}

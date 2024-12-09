<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    //
    public function index(){
        $books = Book::all();

        return view('books.index', compact('books'));
    }

    public function create(){
        return view('books.create');
    }


    public function store(Request $request): RedirectResponse
{
    set_time_limit(300);
    // Validasi data input
    $validatedData = $request->validate([
        'title' => 'required|min:5|max:100',
        'deskripsi' => 'required|min:20|max:999999',
        'author' => 'required|min:5|max:100',
        'cover' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'file_path' => 'required|mimes:pdf|max:102400|',
        'kategori_buku' => 'required',
        'kategori_kelas' => 'required',
    ]);

    try {
        // Upload cover
        $cover = $request->file('cover');
        $coverPath = $cover->storeAs('covers', $cover->hashName(), 'public');

        // Upload file
        $file = $request->file('file_path');
        $filePath = $file->storeAs('buku', $file->hashName(), 'public');

        // Menyisipkan data ke database menggunakan model Book
        $book = Book::create([
            'title' => $validatedData['title'],
            'deskripsi' => $validatedData['deskripsi'],
            'author' => $validatedData['author'],
            'cover' => $cover->hashName(),
            'file_path' => $file->hashName(),
            'kategori_buku' => $validatedData['kategori_buku'],
            'kategori_kelas' => $validatedData['kategori_kelas'],
        ]);

        // Log informasi
        Log::info('Book created successfully', ['book_id' => $book->id]);

        return redirect()->route('books.index')->with(['success' => 'Buku berhasil ditambahkan']);
        
    } catch (\Exception $e) {
        // Log error
        Log::error('Error creating book: ' . $e->getMessage());

        // Hapus file yang diunggah jika terjadi error
        if (isset($coverPath)) {
            Storage::disk('public')->delete($coverPath);
        }
        if (isset($filePath)) {
            Storage::disk('public')->delete($filePath);
        }

        return redirect()->back()->with(['error' => 'Terjadi kesalahan saat menambahkan buku: ' . $e->getMessage()]);
    }
}

    public function edit(string $id){
        $book = Book::findOrFail($id);

        return view('books.edit', compact('book'));
    }

    public function update($id, Request $request)
    {
        // Cari data buku berdasarkan ID
        $book = Book::find($id);

        // Update data buku dengan data dari request
        $book->title = $request->input('title');
        $book->deskripsi = $request->input('deskripsi');
        $book->author = $request->input('author');
        $book->kategori_buku = $request->input('kategori_buku');
        $book->kategori_kelas = $request->input('kategori_kelas');

        // Cek apakah ada file cover yang diupload
        if ($request->hasFile('cover')) {
            $cover = $request->file('cover');
            $cover->storeAs('covers', $cover->hashName(), 'public');
            $book->cover = $cover->hashName();
        }

        // Cek apakah ada file PDF yang diupload
        if ($request->hasFile('file_path')) {
            $file = $request->file('file_path');
            $file->storeAs('buku', $file->hashName(), 'public');
            $book->file_path = $file->hashName();
        }

        // Simpan perubahan ke database
        $book->save();

        // Redirect kembali ke halaman daftar buku
        return redirect()->route('books.index')->with('success', 'Buku berhasil diperbarui');
    }

    public function destroy($id){
        $book = Book::find($id);

        Storage::disk('public')->delete('covers/' . $book->cover);
        Storage::disk('public')->delete('buku/' . $book->file_path);

        $book->delete();

        return redirect()->route('books.index')->with(['success' => 'Buku berhasil dihapus']);
    }

    public function read($id){
        $book = Book::find($id);
        return view('books.read', compact('book'));

        if(!$book->file_path){
            return redirect()->back()->with('error', 'File tidak ditemukan');
        }

        $filePath = storage_path('app/public/buku/' . $book->file_path);

        if (!file_exists($filePath)) {
            return redirect()->back()->with('error', 'File tidak ditemukan di server');
        }

        return response()->file($filePath);
    }

    public function download($id){
        $book = Book::findOrFail($id);

        $filePath = storage_path(('app/public/buku/' . $book->file_path));
        // dd($filePath);

        if(!file_exists($filePath)){
            return redirect()->back()->with('error', 'File tidak ditemukan');
        }

        return response()->download($filePath, $book->file_path);
    }

    public function readBook(Request $request, $bookId) {
        // Cari buku berdasarkan ID
        $book = Book::findOrFail($bookId);

        // Ambil user yang sedang login
        $user = Auth::user();
        dd($user);
        return view('book.read', compact('book'));
    }
}

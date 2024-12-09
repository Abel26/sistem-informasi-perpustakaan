<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Book;

class UserController extends Controller
{
    // Method untuk menambah riwayat baca buku
    public function readBook(Request $request, $userId, $bookId)
    {
        $user = User::findOrFail($userId); // Menemukan pengguna
        $book = Book::findOrFail($bookId); // Menemukan buku

        // Tambahkan buku ke riwayat baca pengguna
        $user->addToHistory($book);

        return response()->json(['message' => 'Book added to reading history successfully.']);
    }

    // Method untuk menampilkan riwayat buku yang dibaca oleh pengguna
    public function showHistory($userId)
    {
        // Ambil data user berdasarkan ID
        $user = User::findOrFail($userId);

        // Dapatkan history buku yang pernah dibaca oleh user
        $books = $user->readingHistory;

        // Return view dan kirimkan data books ke view
        return view('dashboard.showHistory', compact('books'));
    }

}

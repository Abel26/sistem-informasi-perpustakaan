<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index(){
        $books = Book::all();

        return view('siswa.index', compact('books'));
    }
}

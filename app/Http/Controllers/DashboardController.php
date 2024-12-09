<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index(){
        $books = Book::all();
        return view('dashboard.index', compact('books'));
    }

    public function users(){
        $users = User::all();

        // dd($booksCount);

        return view('dashboard.showUser', 
            [
                'users' => $users,
            ]
        );  
    }

    public function books(){
        $books = Book::all();

        return view('dashboard.showBooks', 
            [
                'books' => $books,
            ]
        );  
    }

    public function showHistory($id){
        $user = User::findOrFail($id);
        $books = $user->books;
        return view('dashboard.showHistory', compact('books'));
    }
}

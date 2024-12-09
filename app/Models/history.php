<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class history extends Model
{
    //
    protected $table = 'histories';

    protected $fillable = [
        'user_id', 
        'book_id', 
        'read_at'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}

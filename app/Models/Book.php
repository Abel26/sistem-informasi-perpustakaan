<?php

namespace App\Models;
use HasFactory;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    //
    protected $fillable = [
        'title',
        'deskripsi',
        'author',
        'cover',
        'file_path',
        'kategori_buku',
        'kategori_kelas',
    ];

    

    // Relasi ke tabel 'users' melalui tabel pivot 'history'
    public function users()
    {
        return $this->belongsToMany(User::class, 'history')
                    ->withPivot('read_at')
                    ->withTimestamps();
    }

}

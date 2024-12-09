<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'nisn',
        'kelas'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function books()
    {
        return $this->belongsToMany(Book::class, 'history')
                    ->withPivot('read_at')      // Tambahkan kolom pivot read_at untuk tracking waktu
                    ->withTimestamps();         // Menyimpan waktu created_at dan updated_at
    }

    // Method untuk menambahkan buku ke history user
    public function addToHistory(Book $book)
    {
        return $this->books()->attach($book->id, ['read_at' => now()]);
    }

    // Method untuk mendapatkan history buku yang dibaca
    public function readingHistory()
    {
        return $this->books()->orderByPivot('read_at', 'desc');  // Mendapatkan buku dalam urutan waktu terbaru
    }
}

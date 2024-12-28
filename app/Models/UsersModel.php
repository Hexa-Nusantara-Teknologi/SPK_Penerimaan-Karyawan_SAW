<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsersModel extends Model
{
    use HasFactory;

    protected $table = 'users';

    protected $fillable = [
        'nama',
        'email',
        'notelp',
        'alamat',
        'tgllahir',
        'pendidikan',
        'cv',
        'sosmed',
    ];

    /**
     * Kolom yang harus di-cast ke tipe data tertentu.
     */
    protected $casts = [
        'tgllahir' => 'date',
    ];

    /**
     * Sembunyikan kolom sensitif dari serialisasi model.
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
}

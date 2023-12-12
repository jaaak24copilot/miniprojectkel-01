<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    use HasFactory;
    protected $table = 'pengaduan';
    protected $fillable = [
        'user_id',
        'nama_pelapor',
        'email',
        'subjek',
        'no_telp',
        'status',
        'deskripsi',
    ];
}

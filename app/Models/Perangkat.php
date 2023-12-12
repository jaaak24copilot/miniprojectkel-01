<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perangkat extends Model
{
    use HasFactory;
    protected $table = 'perangkat';
    protected $fillable = [
        'user_id',
        'nama_pelanggan',
        'device_id',
        'tipe_perangkat',
        'tanggal_pinjam',
        'tanggal_kembali',
        'status',
    ];
}

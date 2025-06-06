<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Karyawan extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'nama_karyawan',
        'bidang_keahlian',
        'email',
        'nomor_telepon',
        'tanggal_mulai',
        'durasi_kontrak',
        'status',
    ];

    // Jika ingin method format() langsung bisa dipakai:
    protected $casts = [
        'tanggal_mulai' => 'date',
    ];
}

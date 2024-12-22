<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pemasok extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'nama_pemasok',
        'kontak',
        'email',
        'alamat',
        'kota',
        'kode_pos',
    ];

    public function pemesanans()
    {
        return $this->hasMany(Pemesanan::class);
    }
}
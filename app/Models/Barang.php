<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Barang extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'kode_barang',
        'nama_barang',
        'kategori',
        'satuan',
        'stok',
        'harga_satuan',
    ];

    public function stoks()
    {
        return $this->hasMany(Stok::class);
    }

    public function transaksis()
    {
        return $this->hasMany(Transaksi::class);
    }
}

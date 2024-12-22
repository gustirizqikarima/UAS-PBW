<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pemesanan extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'barang_id',
        'pemasok_id',
        'jumlah',
        'total_harga',
        'status',
        'tanggal_pemesanan',
        'tanggal_pengiriman',
    ];

    protected $casts = [
        'tanggal_pemesanan' => 'datetime:YY-mm-dd',
        'tanggal_pengiriman' => 'datetime:YY-mm-dd',
    ];

    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }

    public function pemasok()
    {
        return $this->belongsTo(Pemasok::class);
    }
}
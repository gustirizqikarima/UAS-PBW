<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaksi extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'barang_id',
        'jenis_transaksi',
        'jumlah',
        'harga_total',
        'tanggal_transaksi',
    ];

    protected $casts = [
        'tanggal_transaksi' => 'datetime:YY-mm-dd',
    ];

    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }
}
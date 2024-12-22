<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('barang_id');
            $table->string('jenis_transaksi');
            $table->integer('jumlah');
            $table->decimal('harga_total', 12, 2)->nullable();
            $table->timestamp('tanggal_transaksi')->useCurrent();
            $table->softDeletes(); 
            $table->timestamps();

            // Foreign key constraint
            $table->foreign('barang_id')->references('id')->on('barangs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksis');
    }
};

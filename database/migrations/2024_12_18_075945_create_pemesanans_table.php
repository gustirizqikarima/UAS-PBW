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
        Schema::create('pemesanans', function (Blueprint $table) {
            $table->id(); 
            $table->unsignedBigInteger('barang_id'); 
            $table->unsignedBigInteger('pemasok_id'); 
            $table->integer('jumlah'); 
            $table->decimal('total_harga', 12, 2); 
            $table->string('status')->default('pending');
            $table->date('tanggal_pemesanan'); 
            $table->date('tanggal_pengiriman')->nullable(); 
            $table->softDeletes();
            $table->timestamps(); 

            // Foreign key constraints
            $table->foreign('barang_id')->references('id')->on('barangs')->onDelete('cascade');
            $table->foreign('pemasok_id')->references('id')->on('pemasoks')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemesanans');
    }
};

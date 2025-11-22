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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('foto');
            $table->string('nama');
            $table->text('deskripsi');
            $table->decimal('harga', 8, 2);
            $table->integer('stok')->default(0);
            // $table->foreign('kategori_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreignId('kategori_id')
                ->constrained('categories')
                ->onDelete('cascade'); // Produk ikut terhapus saat kategori dihapus
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};

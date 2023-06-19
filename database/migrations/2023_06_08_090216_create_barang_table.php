<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barang', function (Blueprint $table) {
            $table->bigIncrements('idBarang');
            $table->string('namaBarang');
            $table->string('satuan');
            $table->integer('stock');
            $table->bigInteger('harga');
            $table->string('fotoBarang');

            $table->unsignedBigInteger('pemasok_id'); // Foreign key column
            $table->unsignedBigInteger('kategori_id'); // Foreign key column
            $table->foreign('pemasok_id')->references('idPemasok')->on('pemasok');
            $table->foreign('kategori_id')->references('idKategori')->on('kategori');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('barang');
    }
};

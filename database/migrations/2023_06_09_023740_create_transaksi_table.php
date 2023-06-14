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
        Schema::create('transaksi', function (Blueprint $table) {
            $table->unsignedBigInteger('idTransaksi',false)->primary();
            $table->string('keterangan');
            $table->string('tanggal');
            $table->enum('status',['in','out']);
            $table->bigInteger('totalHarga');
            $table->integer('jumlah');
            $table->unsignedBigInteger('barang_id'); // Foreign key column
            $table->foreign('barang_id')->references('idBarang')->on('barang');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksi');
    }
};

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
        // Schema::dropIfExists('perangkat');
        Schema::create('perangkat', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('nama_pelanggan');
            $table->string('device_id');
            $table->integer('tipe_perangkat');
            $table->date('tanggal_pinjam');
            $table->date('tanggal_kembali');
            $table->string('status')->default('Menunggu Pembayaran');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('perangkat');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKaryawansTable extends Migration
{
    public function up()
    {
        Schema::create('karyawans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_karyawan');
            $table->string('bidang_keahlian');
            $table->string('email')->unique();
            $table->string('nomor_telepon');
            $table->date('tanggal_mulai');
            $table->integer('durasi_kontrak');
            $table->enum('status', ['aktif', 'tidak aktif', 'selesai']);
            $table->softDeletes(); // Soft delete
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('karyawans');
    }
}

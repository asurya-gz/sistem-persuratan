<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('surat_keterangan_mau_menikah', function (Blueprint $table) {
            $table->id();
            $table->foreignId('surats_id')->constrained('surats')->onDelete('cascade');
            $table->date('tanggal_pernikahan');

            // Data Pria
            $table->string('nama_pria');
            $table->string('nik_pria');
            $table->string('tempat_lahir_pria');
            $table->date('tanggal_lahir_pria');
            $table->string('warga_negara_pria');
            $table->string('agama_pria');
            $table->text('alamat_pria');

            // Data Wanita
            $table->string('nama_wanita');
            $table->string('nik_wanita');
            $table->string('tempat_lahir_wanita');
            $table->date('tanggal_lahir_wanita');
            $table->string('warga_negara_wanita');
            $table->string('agama_wanita');
            $table->text('alamat_wanita');

            $table->text('alamat_pernikahan');
            $table->string('no_telp')->nullable();
            $table->string('email')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('surat_keterangan_mau_menikah');
    }
};

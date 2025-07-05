<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('surat_keterangan_pemilik_rumah', function (Blueprint $table) {
            $table->id();
            $table->foreignId('surats_id')->constrained('surats')->onDelete('cascade');
            $table->string('nik');
            $table->string('status_perkawinan');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('agama');
            $table->string('warga_negara');
            $table->string('pekerjaan');
            $table->text('alamat');
            $table->string('no_telp')->nullable();
            $table->string('email')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('surat_keterangan_pemilik_rumah');
    }
};

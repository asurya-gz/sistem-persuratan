<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('surat_keterangan_kematian', function (Blueprint $table) {
            $table->id();
            $table->foreignId('surats_id')->constrained('surats')->onDelete('cascade');
            $table->string('nama');
            $table->string('nik');
            $table->string('pekerjaan');
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']);
            $table->text('alamat');
            $table->date('tanggal_kematian');
            $table->time('waktu_kematian');
            $table->string('penyebab_kematian');
            $table->integer('umur');
            $table->string('tempat_kematian');
            $table->string('nama_pelapor');
            $table->string('hubungan_dengan_meninggal');
            $table->string('no_telp')->nullable();
            $table->string('email')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('surat_keterangan_kematian');
    }
};

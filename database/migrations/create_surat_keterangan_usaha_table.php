<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('surat_keterangan_usaha', function (Blueprint $table) {
            $table->id();
            $table->foreignId('surats_id')->constrained('surats')->onDelete('cascade');

            $table->string('nik');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']);
            $table->string('agama');
            $table->string('status_perkawinan');
            $table->string('warga_negara');
            $table->string('nama_usaha');
            $table->decimal('omset', 15, 2);
            $table->string('penanggung_jawab');
            $table->string('jenis_usaha');
            $table->string('pekerjaan');
            $table->text('alamat_usaha');
            $table->text('alamat');
            $table->string('no_telp')->nullable();
            $table->string('email')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('surat_keterangan_usaha');
    }
};

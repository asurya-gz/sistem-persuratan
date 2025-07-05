<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('surat_keterangan_kehilangan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('surats_id')->constrained('surats')->onDelete('cascade');
            $table->string('nik');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']);
            $table->string('agama');
            $table->string('pekerjaan');
            $table->string('warga_negara');
            $table->text('alamat');
            $table->string('jenis_kehilangan');
            $table->string('no_telp')->nullable();
            $table->string('email')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('surat_keterangan_kehilangan');
    }
};

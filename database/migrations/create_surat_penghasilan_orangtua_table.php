<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('surat_penghasilan_orangtua', function (Blueprint $table) {
            $table->id();
            $table->foreignId('surats_id')->constrained('surats')->onDelete('cascade');
            
            // Data orang tua
            $table->string('nik');
            $table->string('nama_orangtua');
            $table->string('tempat_lahir_orangtua');
            $table->date('tanggal_lahir_orangtua');
            $table->enum('jenis_kelamin_orangtua', ['Laki-laki', 'Perempuan']);
            $table->string('pekerjaan_orangtua');
            $table->text('alamat_orangtua');

            // Data anak
            $table->string('nama_anak');
            $table->string('tempat_lahir_anak');
            $table->date('tanggal_lahir_anak');
            $table->enum('jenis_kelamin_anak', ['Laki-laki', 'Perempuan']);
            $table->string('pekerjaan_anak');
            $table->text('alamat_anak');

            // Penghasilan dan kontak
            $table->decimal('jumlah_penghasilan', 15, 2);
            $table->string('no_telp')->nullable();
            $table->string('email')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('surat_penghasilan_orangtua');
    }
};

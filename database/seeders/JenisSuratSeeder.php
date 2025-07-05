<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\JenisSurat;

class JenisSuratSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['value' => 'skck', 'name' => 'Surat Keterangan Catatan Kepolisian'],
            ['value' => 'sktm', 'name' => 'Surat Keterangan Tidak Mampu'],
            ['value' => 'domisili', 'name' => 'Surat Keterangan Domisili'],
            ['value' => 'kehilangan', 'name' => 'Surat Keterangan Kehilangan'],
            ['value' => 'kematian', 'name' => 'Surat Keterangan Kematian'],
            ['value' => 'kepemilikan_rumah', 'name' => 'Surat Keterangan Kepemilikan Rumah'],
            ['value' => 'mau_menikah', 'name' => 'Surat Keterangan Mau Menikah'],
            ['value' => 'penghasilan_ortu', 'name' => 'Surat Keterangan Penghasilan Orang Tua'],
            ['value' => 'sudah_menikah', 'name' => 'Surat Keterangan Sudah Menikah'],
            ['value' => 'usaha', 'name' => 'Surat Keterangan Usaha'],
        ];

        JenisSurat::insert($data);
    }
}

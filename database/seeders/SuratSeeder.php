<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Surat;
use App\Models\User;
use Carbon\Carbon;

class SuratSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::take(3)->get();

        $jenisSurat = [
            'Surat Keterangan Domisili',
            'Surat Pengantar RT',
            'Surat Keterangan Usaha',
            'Surat Keterangan Tidak Mampu',
            'Surat Izin Keramaian',
        ];

        $tujuanSurat = [
            'Kecamatan Tembalang',
            'RT 05 RW 03',
            'Dinas Perdagangan',
            'Dinas Sosial',
            'Polsek Tembalang',
        ];

        $keteranganSurat = [
            'Untuk keperluan administrasi pindah KK',
            'Pengajuan bantuan sosial',
            'Untuk registrasi usaha kecil',
            'Untuk keperluan sekolah',
            'Untuk izin mengadakan acara masyarakat',
        ];

        $statusSurat = ['diajukan', 'disetujui', 'ditolak'];

        $surats = [];

        for ($i = 0; $i < 15; $i++) {
            $user = $users->random(); // Ambil user acak dari 1-3
            $daysAgo = rand(1, 10);

            $surats[] = [
                'user_id' => $user->id,
                'jenis_surat' => $jenisSurat[array_rand($jenisSurat)],
                'tujuan' => $tujuanSurat[array_rand($tujuanSurat)],
                'keterangan' => $keteranganSurat[array_rand($keteranganSurat)],
                'status' => $statusSurat[array_rand($statusSurat)],
                'created_at' => Carbon::now()->subDays($daysAgo),
                'updated_at' => Carbon::now()->subDays($daysAgo),
            ];
        }

        Surat::insert($surats);
    }
}

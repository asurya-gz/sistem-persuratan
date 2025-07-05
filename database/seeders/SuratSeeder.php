<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Surat;
use App\Models\User;
use App\Models\JenisSurat;
use Carbon\Carbon;

class SuratSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::take(3)->get();
        $jenisSurats = JenisSurat::pluck('value')->toArray(); // Ambil nama-nama surat dari tabel jenis_surats

        $tujuanSurat = [
            'Kecamatan Tembalang',
            'RT 05 RW 03',
            'Dinas Perdagangan',
            'Dinas Sosial',
            'Polsek Tembalang',
            'Kantor Kelurahan',
            'Universitas Diponegoro',
            'KUA Tembalang',
        ];

        $keteranganSurat = [
            'Untuk keperluan administrasi pindah KK',
            'Pengajuan bantuan sosial',
            'Untuk registrasi usaha kecil',
            'Untuk keperluan sekolah',
            'Untuk izin mengadakan acara masyarakat',
            'Untuk keperluan beasiswa',
            'Untuk kelengkapan lamaran kerja',
        ];

        $statusSurat = ['diajukan', 'disetujui', 'ditolak'];

        $surats = [];

        for ($i = 0; $i < 15; $i++) {
            $user = $users->random();
            $daysAgo = rand(1, 10);

            $surats[] = [
                'user_id' => $user->id,
                'jenis_surat' => $jenisSurats[array_rand($jenisSurats)], // ambil dari DB
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

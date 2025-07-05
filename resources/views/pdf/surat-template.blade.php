<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Bukti Keterangan Pengambilan Surat</title>
    <style>
        @php
        $jenisSuratMap = [
            'skck' => 'Surat Keterangan Catatan Kepolisian',
            'sktm' => 'Surat Keterangan Tidak Mampu',
            'domisili' => 'Surat Keterangan Domisili',
            'kehilangan' => 'Surat Keterangan Kehilangan',
            'kematian' => 'Surat Keterangan Kematian',
            'kepemilikan_rumah' => 'Surat Keterangan Kepemilikan Rumah',
            'mau_menikah' => 'Surat Keterangan Mau Menikah',
            'penghasilan_ortu' => 'Surat Keterangan Penghasilan Orang Tua',
            'sudah_menikah' => 'Surat Keterangan Sudah Menikah',
            'usaha' => 'Surat Keterangan Usaha',
        ];
        $statusLabel = [
            'diajukan' => 'Diajukan',
            'disetujui' => 'Disetujui',
            'ditolak' => 'Ditolak',
        ];
        $statusClass = [
            'diajukan' => 'status diajukan',
            'disetujui' => 'status disetujui',
            'ditolak' => 'status ditolak',
        ];
        @endphp
        
        body {
            font-family: 'Times New Roman', serif;
            font-size: 12pt;
            line-height: 1.6;
            color: #000;
            margin: 0;
            padding: 20px;
            background: #fff;
        }
        
        .container {
            max-width: 210mm;
            margin: 0 auto;
            background: #fff;
            padding: 30px;
            border: 1px solid #000;
        }
        
        .header {
            text-align: center;
            margin-bottom: 30px;
            padding-bottom: 15px;
            border-bottom: 2px solid #000;
        }
        
        .header h1 {
            font-size: 16pt;
            font-weight: bold;
            color: #000;
            margin: 0;
            text-transform: uppercase;
        }
        
        .header h2 {
            font-size: 14pt;
            font-weight: bold;
            color: #000;
            margin: 10px 0 0 0;
            text-transform: uppercase;
        }
        
        .nomor-surat {
            text-align: center;
            margin-bottom: 25px;
            font-weight: bold;
            font-size: 12pt;
            color: #000;
        }
        
        .content {
            margin-bottom: 30px;
        }
        
        .info-row {
            display: table;
            width: 100%;
            margin-bottom: 8px;
        }
        
        .label {
            display: table-cell;
            font-weight: bold;
            color: #000;
            width: 180px;
            vertical-align: top;
            padding-right: 10px;
        }
        
        .colon {
            display: table-cell;
            width: 20px;
            font-weight: bold;
            vertical-align: top;
        }
        
        .value {
            display: table-cell;
            color: #000;
            vertical-align: top;
        }
        
        .status {
            display: inline-block;
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 11pt;
            font-weight: bold;
        }
        
        .status.diajukan {
            background-color: #fff3cd;
            color: #856404;
            border: 1px solid #ffeaa7;
        }
        
        .status.disetujui {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        
        .status.ditolak {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
        
        .divider {
            border: none;
            height: 1px;
            background: #000;
            margin: 25px 0;
        }
        
        .footer {
            background: #f8f9fa;
            padding: 15px;
            border: 1px solid #000;
            margin-top: 20px;
        }
        
        .footer h3 {
            font-size: 12pt;
            color: #000;
            margin: 0 0 10px 0;
            font-weight: bold;
        }
        
        .footer p {
            margin: 5px 0;
            color: #000;
            font-size: 10pt;
        }
        
        .signature-section {
            margin-top: 40px;
            display: table;
            width: 100%;
        }
        
        .signature-box {
            display: table-cell;
            text-align: center;
            width: 50%;
            padding: 0 20px;
        }
        
        .signature-title {
            font-weight: bold;
            color: #000;
            margin-bottom: 60px;
            font-size: 12pt;
        }
        
        .signature-name {
            border-top: 1px solid #000;
            padding-top: 5px;
            font-weight: bold;
            color: #000;
            font-size: 12pt;
        }
        
        @media print {
            body {
                padding: 0;
            }
            
            .container {
                border: none;
                padding: 15px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Pemerintah Desa Situterate</h1>
            <h2>Surat Bukti Keterangan Pengambilan Surat</h2>
        </div>
        
        <div class="nomor-surat">
            Nomor: ................................
        </div>
        
        <div class="content">
            <div class="info-row">
                <span class="label">Jenis Surat</span>
                <span class="colon">:</span>
                <span class="value">{{ $jenisSuratMap[$surat->jenis_surat] ?? $surat->jenis_surat }}</span>
            </div>
            
            <div class="info-row">
                <span class="label">Tujuan Penggunaan</span>
                <span class="colon">:</span>
                <span class="value">{{ $surat->tujuan }}</span>
            </div>
            
            <div class="info-row">
                <span class="label">Tanggal Pengajuan</span>
                <span class="colon">:</span>
                <span class="value">{{ $surat->created_at->format('d M Y') }}</span>
            </div>
            
            <div class="info-row">
                <span class="label">Keterangan</span>
                <span class="colon">:</span>
                <span class="value">{{ $surat->keterangan }}</span>
            </div>
            
            <div class="info-row">
                <span class="label">Status Permohonan</span>
                <span class="colon">:</span>
                <span class="value">
                    <span class="{{ $statusClass[$surat->status] ?? 'status' }}">
                        {{ $statusLabel[$surat->status] ?? 'Tidak Diketahui' }}
                    </span>
                </span>
            </div>
        </div>
        
        <hr class="divider">
        
        <div class="footer">
            <h3>PETUNJUK PENGAMBILAN SURAT</h3>
            <p><strong>1.</strong> Tunjukkan surat bukti ini kepada petugas pelayanan di kantor desa</p>
            <p><strong>2.</strong> Pastikan membawa identitas diri yang masih berlaku (KTP/KK)</p>
            <p><strong>3.</strong> Surat asli hanya dapat diambil pada jam kerja: Senin-Jumat (08:00-15:00)</p>
            <p><strong>4.</strong> Apabila diwakilkan, wajib membawa surat kuasa bermaterai</p>
        </div>
        
        <div class="signature-section">
            <div class="signature-box">
                <div class="signature-title">Pemohon</div>
                <div class="signature-name">................................</div>
            </div>
            
            <div class="signature-box">
                <div class="signature-title">Petugas Pelayanan</div>
                <div class="signature-name">................................</div>
            </div>
        </div>
    </div>
</body>
</html>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Surat Keterangan</title>
    <style>
        body { font-family: sans-serif; font-size: 12pt; }
    </style>
</head>
<body>
    <h3 style="text-align:center">Surat Keterangan</h3>
    <p>Jenis Surat: {{ $surat->jenis_surat }}</p>
    <p>Tujuan: {{ $surat->tujuan }}</p>
    <p>Tanggal Pengajuan: {{ $surat->created_at->format('d M Y') }}</p>
    <p>Keterangan: {{ $surat->keterangan }}</p>
</body>
</html>

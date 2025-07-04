@extends('layouts.app')

@section('content')
     <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Penduduk</h1>
            <a href="/resident/create" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-plus fa-sm text-white-50"></i>Tambah</a>
    </div>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

{{-- css data pendududk --}}
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 20px;
        }

        .row {
            display: flex;
            justify-content: center;
        }

        .col {
            width: 100%;
            max-width: 1200px;
        }

        .card {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            overflow-x: auto;
        }

        .card-body {
            padding: 20px;
        }

        .table-responsive {
            width: 100%;
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 1000px;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: left;
            white-space: nowrap;
        }

        th {
            background-color: #f1f1f1;
        }

        tr:hover {
            background-color: #f9f9f9;
        }
    </style>
</head>
<body>

<!-- TABEL DATA PENDUDUK -->
<div class="row">
    <div class="col">
        <div class="card shadow">
            <div class="card-body"> 
                <div class="table-responsive"> 
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NIK</th>
                                <th>Nama</th>
                                <th>Jenis Kelamin</th>
                                <th>Tempat Tanggal Lahir</th>
                                <th>Alamat</th>
                                <th>Agama</th>
                                <th>Status Perkawinan</th>
                                <th>Pekerjaan</th>
                                <th>Nomor HP</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        @if (count($residents) < 1)
                            <tr>
                                <td colspan="11">
                                    <p class="pt-3 text-center">Tidak Ada Data</p>
                                </td>
                            </tr>
                        @else
                            @foreach ($residents as $item)
                                <tr>
                                    <td>{{ $loop->iteration + $residents->firstItem() - 1 }}</td>
                                    <td>{{ $item->nik }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->gender }}</td>
                                    <td>{{ $item->birth_place }}, {{ $item->birth_date }}</td>
                                    <td>{{ $item->address }}</td>
                                    <td>{{ $item->religion }}</td>
                                    <td>{{ $item->material_status }}</td>
                                    <td>{{ $item->occupation }}</td>
                                    <td>{{ $item->phone }}</td>
                                    <td>{{ $item->status }}</td>
                                    <td class="text-center">
                                        <div class="d-flex align-items-center" style="gap: 10px;">
                                            <a href="/resident/{{ $item->id }}" class="btn btn-sm btn-warning mr-1">
                                                <i class="fas fa-pen"></i>
                                            </a>
                                            <button type=button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#confirmasidelete-{{ $item->id }}">
                                                <i class="fas fa-eraser"></i>
                                            </button>
                                            @if (!is_null($item->user_id))
                                            <button type=button class="btn btn-sm btn-outline-info" data-bs-toggle="modal" data-bs-target="#detailAccount-{{ $item->id }}">
                                                Lihat Akun
                                            </button>
                                            @include('pages.resident.detail-account')
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                                @include('pages.resident.confirmasi-delete')
                            @endforeach
                        </tbody>
                    @endif
                </table>
            </div> 
            @if ($residents->lastPage()> 1)
            <div class="card-footer">
                {{ $residents->links('pagination::bootstrap-5')}}
            </div>    
            @endif
        </div> 
    </div> 
</div>
@endsection
@extends('layouts.app')

@section('content')

  <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Data Penduduk</h1>
    </div>

    {{-- @if ($errors->any())
    @dd($errors->all())
    @endif --}}

    <div class="row">
        <div class="col">
            <form action="/resident" method="post">
                @csrf
                @method('POST')
                <div class="card">
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label for="nik">NIK</label>
                            <input type="number" inputmode="numeric" name="nik" id="nik" class="form-control @error('nik') is-invalid @enderror" value="{{ old('nik')}}">
                            @error('nik')
                                <span class="invalid-feedback">
                                    {{$message}}
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-2">
                            <label for="name">Masukan Nama Lengkap</label>
                            <input type="text" inputmode="numeric" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name')}}">
                           @error('name')
                                <span class="invalid-feedback">
                                    {{$message}}
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-2">
                            <label for="gender">Jenis Kelamin</label>
                            <select name="gender" id="gender" class="form-control @error('gender') is-invalid @enderror">
                                @foreach ([
                                    (object) [
                                        "label" => "Laki-Laki",
                                        "value" => "male",
                                    ],
                                       (object) [
                                        "label" => "Perempuan",
                                        "value" => "female",
                                    ],
                                ] as $item)
                                    <option value="{{ $item->value }}" @selected(old('gender') == $item->value)>
                                    {{ $item->label }}</option>   
                                @endforeach
                            </select>
                               @error('gender')
                                <span class="invalid-feedback">
                                    {{$message}}
                                </span>
                                @enderror
                        </div>

                         <div class="form-group mb-2">
                            <label for="birth_date">Tanggal Lahir</label>
                            <input type="date" name="birth_date" id="birth_date" class="form-control @error('birth_date') is-invalid @enderror" value="{{ old('birth_date')}}">
                           @error('birth_date')
                                <span class="invalid-feedback">
                                    {{$message}}
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-2">
                            <label for="birth_place">Tempat Lahir</label>
                            <input type="text" name="birth_place" id="birth_place" class="form-control @error('birth_place') is-invalid @enderror" value="{{ old('birth_place')}}">
                           @error('birts=h_place')
                                <span class="invalid-feedback">
                                    {{$message}}
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-2">
                            <label for="address">Alamat</label>
                            <textarea name="address" id="address" cols="30" rows="10" class="form-control @error('address') is-invalid @enderror">{{ old('address')}}</textarea>
                           @error('address')
                                <span class="invalid-feedback">
                                    {{$message}}
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-2">
                            <label for="religion">Agama</label>
                            <input type="text" name="religion" id="religion" class="form-control @error('religion') is-invalid @enderror" value="{{ old('religion')}}">
                           @error('religion')
                                <span class="invalid-feedback">
                                    {{$message}}
                                </span>
                            @enderror
                        </div>
                        
                    {{-- Required Status Perkawinan --}}
                  <div class="form-group mb-2">
                    <label for="material_status">Status Perkawinan</label>
                        <select name="material_status" id="material_status" class="form-control @error('material_status') is-invalid @enderror">
                            @foreach ([
                                (object) ["label" => "Belum Menikah", "value" => "single"],
                                (object) ["label" => "Sudah Menikah", "value" => "married"],
                                (object) ["label" => "Cerai", "value" => "divorced"],
                                (object) ["label" => "Janda/Duda", "value" => "widowed"],
                                ] as $item)
                                    <option value="{{ $item->value }}" @selected(old('material_status') == $item->value)>
                                        {{ $item->label }}
                                    </option>   
                            @endforeach
                        </select>
                            @error('material_status')
                                <span class="invalid-feedback">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>

                        {{-- Required Pekerjaan --}}
                        <div class="form-group mb-2">
                            <label for="occupation">Pekerjaan</label>
                            <input type="text" name="occupation" id="occupation" class="form-control @error('occupation') is-invalid @enderror" value="{{ old('occupation')}}">
                           @error('occupation')
                                <span class="invalid-feedback">
                                    {{$message}}
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-2">
                            <label for="phone">Nomor HP</label>
                            <input type="text" inputmode="numeric" name="phone" id="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone')}}">
                           @error('phone')
                                <span class="invalid-feedback">
                                    {{$message}}
                                </span>
                            @enderror
                        </div>

                      <div class="form-group mb-2">
    <label for="status">Status</label>
    <select name="status" id="status" class="form-control @error('status') is-invalid @enderror">
        @foreach ([
            (object) ["label" => "Aktif", "value" => "active"],
            (object) ["label" => "Pindah", "value" => "moved"],
            (object) ["label" => "Almarhum", "value" => "deceased"],
        ] as $item)
            <option value="{{ $item->value }}" @selected(old('status') == $item->value)>
                {{ $item->label }}
            </option>   
        @endforeach
    </select>
    @error('status')
        <span class="invalid-feedback">
            {{ $message }}
        </span>
    @enderror
</div>


                    <div class="card-footer">
                        <div class="d-flex justify-content-end" style="gap:10px;">
                            <a href="/resident" class="btn btn-outline-secondary">
                                Kembali
                            </a>
                            <button type="submit" class="btn btn-primary">
                                Simpan
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
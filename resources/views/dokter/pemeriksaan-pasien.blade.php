@extends('layouts.form')
@section('header', 'Pemeriksaan Pasien')

@section('content-form')
    <form method="POST" action="{{ url('/daftar-antrian/update/put/' . $data->no_medrec) }}">
        @csrf

        <div class="row">
            <div class="col-xl-6">
                <div class="form-group">
                    <label>No. Rekam Medis</label>
                    <input type="number" class="form-control" readonly value="{{ $data->no_medrec }}">
                </div>
            </div>

            <div class="col-xl-6">
                <div class="form-group">
                    <label>Umur</label>
                    <input type="number" class="form-control mb-3" readonly value="{{ $data->umur_pasien }}">
                </div>
            </div>
        </div>

        <div class="form-group">
            <label>Nama Lengkap</label>
            <input type="text" class="form-control mb-3" readonly value="{{ $data->nama }}">
        </div>

        <div class="row">
            <div class="col-xl-6">
                <div class="form-group">
                    <label>Tempat Lahir</label>
                    <input type="text" class="form-control" readonly value="{{ $data->tempat_lahir }}">
                </div>
            </div>

            <div class="col-xl-6">
                <div class="form-group">
                    <label>Tanggal Lahir</label>
                    <input type="text" class="form-control mb-3" readonly value="{{ $data->tanggal_lahir }}">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-6">
                <div class="form-group">
                    <label>Jenis Kelamin</label>
                    <input type="text" class="form-control" readonly value="{{ $data->jenis_kelamin }}">
                </div>
            </div>

            <div class="col-xl-6">
                <div class="form-group">
                    <label>No. Handphone</label>
                    <input type="tel" class="form-control mb-3" readonly value="{{ $data->no_telp }}">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12">
                <div class="form-group">
                    <label>Alamat</label>
                    <input type="text" class="form-control mb-3" readonly value="{{ $data->alamat }}">
                </div>
            </div>
        </div>

        <hr>

        <div class="row">
            <div class="col-xl-12">
                <div class="form-group">
                    <label for="diagnosa">Nama Diagnosa</label>
                    <select class="form-control mb-3" name="id_diagnosa">
                        @foreach ($diagnosa as $k => $v)
                            <option value="{{ $v->id_diagnosa }}">{{ $v->nama }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-xl-4">
                <div class="form-group">
                    <label for="kategori_obat">Kategori Obat</label>
                    <select class="form-control mb-3" name="id_kategoriobat" id="kategori_obat_input">
                        @foreach ($kategori_obat as $k => $v)
                            <option value="{{ $v->id_kategoriobat }}">{{ $v->nama }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-xl-4">
                <div class="form-group">
                    <label>Dosis</label>
                    <select class="form-control" name="id_dosis" id="dosis_input"></select>
                </div>
            </div>
            <div class="col-xl-4">
                <div class="form-group">
                    <label>Jangka Waktu</label>
                    <input type="number" class="form-control" id='jangka_waktu_input' name="jangka_waktu" min="1">
                </div>
            </div>
            <div class="col-xl-12" id="div_obat">
                <div class="form-group">
                    <label>Nama Obat</label>
                    <select class="form-control mb-3" name="id_obat" id="nama_obat_input"></select>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="form-group">
                <label>Catatan</label>
                <input type="text" class="form-control mb-5" name="catatan">
            </div>
        </div>

        <div class="row">
            <div class="col-xl-1 offset-xl-11">
                <button type="submit" class="btn btn-primary mb-5">Done</button>
            </div>
        </div>
    </form>
@endsection

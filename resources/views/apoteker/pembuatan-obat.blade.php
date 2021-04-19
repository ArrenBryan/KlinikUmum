@extends('layouts.form')
@section('header', 'Pembuatan Obat')

@section('content-form')
    <form method="POST" action="{{ url('/daftar-antrian/show/delete/' . $data->no_medrec) }}">
        @method('DELETE')
        @csrf

        <div class="row">
            <div class="col-xl-6">
                <div class="form-group">
                    <label>No. Rekam Medis</label>
                    <input type="number" class="form-control" readonly id="no_rekam_medis_input" value="{{ $data->no_medrec }}">
                </div>
            </div>

            <div class="col-xl-6">
                <div class="form-group">
                    <label>Umur</label>
                    <input type="number" class="form-control mb-3" readonly id="umur_input" value="{{ $data->umur }}">
                </div>
            </div>
        </div>

        <div class="form-group">
            <label>Nama Lengkap</label>
            <input type="text" class="form-control mb-3" readonly id="nama_input" value="{{ $data->nama_pasien }}">
        </div>

        <div class="row">
            <div class="col-xl-6">
                <div class="form-group">
                    <label>Tempat Lahir</label>
                    <input type="text" class="form-control" readonly id="tempat_lahir_input" value="{{ $data->tempat_lahir }}">
                </div>
            </div>

            <div class="col-xl-6">
                <div class="form-group">
                    <label>Tanggal Lahir</label>
                    <input type="text" class="form-control mb-3" readonly id="tanggal_lahir_input" value="{{ $data->tanggal_lahir }}">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-6">
                <div class="form-group">
                    <label>Jenis Kelamin</label>
                    <input type="text" class="form-control" readonly id="jenis_kelamin_input" value="{{ $data->jenis_kelamin }}">
                </div>
            </div>

            <div class="col-xl-6">
                <div class="form-group">
                    <label>No. Handphone</label>
                    <input type="tel" class="form-control mb-3" readonly id="no_telp_input" value="{{ $data->no_telp }}">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12">
                <div class="form-group">
                    <label>Alamat</label>
                    <input type="text" class="form-control mb-3" readonly id="alamat_input" value="{{ $data->alamat }}">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12">
                <div class="form-group">
                    <label>Nama Diagnosa</label>
                    <input type="text" class="form-control mb-3" readonly id="diagnosa_input" value="{{ $data->nama_diagnosa }}">
                </div>
            </div>
            <div class="col-xl-3">
                <div class="form-group">
                    <label>Kategori Obat</label>
                    <input type="text" class="form-control" readonly id="kategori_obat_input" value="{{ $data->kategori_obat }}">
                </div>
            </div>
            <div class="col-xl-3">
                <div class="form-group">
                    <label>Nama Obat</label>
                    <input type="text" class="form-control" readonly id="nama_obat_input" value="{{ $data->nama_obat }}">
                </div>
            </div>
            <div class="col-xl-3">
                <div class="form-group">
                    <label>Dosis</label>
                    <input type="text" class="form-control" readonly value="{{ $data->dosis }}">
                </div>
            </div>
            <div class="col-xl-3">
                <div class="form-group">
                    <label>Jangka Waktu</label>
                    <input type="text" class="form-control mb-3" readonly value="{{ $data->jangka_waktu }}">
                </div>
            </div>
            <div class="col-xl-12">
                <div class="form-group">
                    <label>Catatan</label>
                    <input type="text" class="form-control mb-5" readonly value="{{ $data->catatan }}">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-1 offset-xl-11">
                <button type="submit" class="btn btn-primary mb-5">Done</button>
            </div>
        </div>
    </form>
@endsection

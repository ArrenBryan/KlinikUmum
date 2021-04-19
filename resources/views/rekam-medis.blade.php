@extends('layouts.form')
@section('header', 'Medical Record Pasien')

@section('content-form')
    <form>
        @csrf

        <div class="row">
            <div class="col-xl-6">
                <div class="form-group">
                    <label>No. Rekam Medis</label>
                    <input type="number" class="form-control" placeholder="Masukkan Nomor Rekam Medis Pasien" maxlength="5" min="0" id="no_rekam_medis_input_full">
                    <div id="no_rekam_medis_input_error_full" class="text-center mt-1"></div>
                </div>
            </div>

            <div class="col-xl-6">
                <div class="form-group">
                    <label>Umur</label>
                    <input type="number" class="form-control mb-3" readonly id="umur_input">
                </div>
            </div>
        </div>

        <div class="form-group">
            <label>Nama Lengkap</label>
            <input type="text" class="form-control mb-3" readonly id="nama_input">
        </div>

        <div class="row">
            <div class="col-xl-6">
                <div class="form-group">
                    <label>Tempat Lahir</label>
                    <input type="text" class="form-control" readonly id="tempat_lahir_input">
                </div>
            </div>

            <div class="col-xl-6">
                <div class="form-group">
                    <label>Tanggal Lahir</label>
                    <input type="text" class="form-control mb-3" readonly id="tanggal_lahir_input">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-6">
                <div class="form-group">
                    <label>Jenis Kelamin</label>
                    <input type="text" class="form-control" readonly id="jenis_kelamin_input">
                </div>
            </div>

            <div class="col-xl-6">
                <div class="form-group">
                    <label>No. Handphone</label>
                    <input type="tel" class="form-control mb-3" readonly id="no_telp_input">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12">
                <div class="form-group">
                    <label>Alamat</label>
                    <input type="text" class="form-control mb-5" readonly id="alamat_input">
                </div>
            </div>
        </div>
    </form>

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Tanggal</th>
                <th scope="col">Nama Dokter</th>
                <th scope="col">Nama Diagnosa</th>
                <th scope="col">Nama Obat</th>
                <th scope="col">Dosis</th>
                <th scope="col">Catatan</th>
            </tr>
        </thead>
        <tbody id="rekam_medis_table">
        </tbody>
    </table>
@endsection

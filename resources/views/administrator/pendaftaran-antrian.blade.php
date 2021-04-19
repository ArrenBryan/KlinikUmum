@extends('layouts.form')
@section('header', 'Pendaftaran Antrian')

@section('content-form')
    <form method="POST" action="{{ url('/pendaftaran-antrian/submit') }}">
        @csrf

        <div class="row">
            <div class="col-xl-6">
                <div class="form-group">
                    <label>No. Rekam Medis</label>
                    <input type="number" class="form-control" placeholder="Masukkan Nomor Rekam Medis Pasien" maxlength="5" min="0" id="no_rekam_medis_input" name="no_medrec">
                    <div id="no_rekam_medis_input_error" class="text-center mt-1"></div>
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
                    <input type="text" class="form-control mb-3" readonly id="alamat_input">
                </div>
            </div>
        </div>

        <hr>
        <h2 class="mt-4 mb-3">Pemeriksaan Fisik</h2>

        <div class="row">
            <div class="col-xl-4">
                <div class="form-group">
                    <label>Tinggi Badan</label>
                    <input type="number" class="form-control mb-4" placeholder="Dalam satuan Centimeter (CM)"
                        maxlength="3" min="0" name="tinggi_badan">
                </div>
            </div>

            <div class="col-xl-4">
                <div class="form-group">
                    <label>Berat Badan</label>
                    <input type="number" class="form-control" placeholder="Dalam satuan Kilogram (KG)" maxlength="3"
                        min="0" name="berat_badan">
                </div>
            </div>

            <div class="col-xl-4">
                <div class="form-group">
                    <label>Suhu</label>
                    <input type="number" class="form-control" placeholder="Dalam satuan Celcius (C)" maxlength="3"
                        min="0" name="suhu">
                </div>
            </div>

            <div class="col-xl-4">
                <div class="form-group">
                    <label>Systole</label>
                    <input type="number" class="form-control" placeholder="Dalam satuan mmHg" maxlength="3" min="0" name="systole">
                </div>
            </div>

            <div class="col-xl-4">
                <div class="form-group">
                    <label>Diastole</label>
                    <input type="number" class="form-control" placeholder="Dalam satuan mmHg" maxlength="3" min="0" name="diastole">
                </div>
            </div>

            <div class="col-xl-4">
                <div class="form-group">
                    <label for="dokter">Nama Dokter</label>
                    <select class="form-control mb-3" name="NIP">
                        @foreach ($data as $k => $v)
                            <option value="{{ $v->nip }}">{{ $v->nama }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-1 offset-xl-11 mb-5">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection

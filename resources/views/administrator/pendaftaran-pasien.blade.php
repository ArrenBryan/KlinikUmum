@extends('layouts.form')
@section('header', 'Pendaftaran Pasien')

@section('content-form')
	<form method="POST" action="{{ url('/pendaftaran-pasien/submit') }}">
		@csrf

        <div class="form-group">
            <label>Nama Lengkap</label>
            <input type="text" class="form-control mb-3" placeholder="Masukkan Nama Lengkap Pasien" maxlength="50" name="nama">
        </div>

        <div class="row">
            <div class="col-xl-6">
                <div class="form-group">
                    <label>Tempat Lahir</label>
                    <input type="text" class="form-control" placeholder="Masukkan Tempat Lahir Pasien" maxlength="40" name="tempat_lahir">
                </div>
            </div>

            <div class="col-xl-6">
                <div class="form-group">
                    <label>Tanggal Lahir</label>
                    <input type="date" class="form-control mb-3" name="tanggal_lahir">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-6">
				<div class="form-group">
					<label for="sel1">Jenis Kelamin</label>
					<select class="form-control" id="sel1" name="jenis_kelamin">
					    <option value="Laki-laki">Laki-laki</option>
					    <option value="Perempuan">Perempuan</option>
					</select>
				</div>
            </div>

            <div class="col-xl-6">
                <div class="form-group">
                    <label>No. Handphone</label>
                    <input type="tel" class="form-control mb-3" placeholder="Masukkan No.HP Pasien" maxlength="20" name="no_telp">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12">
                <div class="form-group">
                    <label>Alamat</label>
                    <input type="text" class="form-control mb-3" placeholder="Masukkan Alamat Pasien" maxlength="100" name="alamat">
                </div>
            </div>

            <div class="col-xl-1 offset-xl-11">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection

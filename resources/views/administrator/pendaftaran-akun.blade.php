@extends('layouts.form')
@section('header', 'Pendaftaran Akun')

@section('content-form')
	<form method="POST" action="{{ url('/pendaftaran-akun/submit') }}">
		@csrf

        <div class="row">
            <div class="col-xl-6">
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" class="form-control" placeholder="Masukkan Username Karyawan" maxlength="30" name="username">
                </div>
            </div>

            <div class="col-xl-6">
                <div class="form-group">
                    <label>Password</label>
                    <input type="text" class="form-control mb-3" placeholder="Masukkan Password Karyawan" maxlength="30" name="password">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-6">
                <div class="form-group">
					<label for="roles">Role</label>
					<select class="form-control mb-3" id="roles" name="role">
					  <option value="Administrator">Administrator</option>
					  <option value="Dokter Umum">Dokter Umum</option>
					  <option value="Apoteker">Apoteker</option>
					  <option value="Penanggung Jawab Klinik">Penanggung Jawab Klinik</option>
					</select>
				</div>
            </div>
        </div>

        <div class="row" id="dokterField">
            <div class="col-xl-6">
                <div class="form-group">
                    <label for="namaField">Nama Dokter</label>
                    <input type="text" class="form-control mb-3" placeholder="Masukkan Nama Lengkap Dokter" maxlength="50" id="namaField" name="nama_dokter">
                </div>
			</div>
			
			<div class="col-xl-6">
                <div class="form-group">
                    <label for="dateField">Tanggal Dipekerjakan</label>
                    <input type="date" class="form-control" id="dateField" name="tanggal_dipekerjakan">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-1 offset-xl-11">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>    
@endsection

@extends('layouts.form')
@section('header', 'Laporan 10 Penyakit Terbanyak')

@section('content-form')
    <form>
        <div class="form-group">
            <input type="month" class= "mb-1" style="font-size: 20px; padding: 8px 10px" id="tanggal_diagnosa_input">
            <div id="tanggal_diagnosa_input_error"></div>
        </div>
    </form>

    <table class="table table-striped mt-4">
        <thead>
            <tr>
                <th scope="col">Kode Diagnosa</th>
                <th scope="col">Nama Diagnosa</th>
                <th scope="col">Jumlah</th>
            </tr>
        </thead>
        <tbody id="laporan_diagnosa_table">
        </tbody>
    </table>
@endsection

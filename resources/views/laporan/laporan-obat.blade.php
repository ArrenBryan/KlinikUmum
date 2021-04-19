@extends('layouts.form')
@section('header', 'Laporan Pengeluaran Obat')

@section('content-form')
    <form>
        <div class="form-group">
            <input type="month" class= "mb-1" style="font-size: 20px; padding: 8px 10px" id="tanggal_obat_input">
            <div id="tanggal_obat_input_error"></div>
        </div>
    </form>
    
    <table class="table table-striped mt-4">
        <thead>
            <tr>
                <th scope="col">Kategori Obat</th>
                <th scope="col">Nama Obat</th>
                <th scope="col">Jumlah</th>
            </tr>
        </thead>
        <tbody id="laporan_obat_table">
        </tbody>
    </table>
@endsection

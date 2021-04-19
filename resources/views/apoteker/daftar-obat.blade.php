@extends('layouts.form')
@section('header', 'Daftar Obat')

@section('content-form')
    <form method="POST" action="{{ url('/daftar-obat/submit') }}">
        @csrf

        <div class="row">
            <div class="col-xl-6">
                <div class="form-group">
                    <label for="kategori_obat">Kategori Obat</label>
                    <select class="form-control" id="kategori_obat" name="kategori_obat">
                        @foreach ($kategoriObat as $k => $v)
                            <option value="{{ $v->id_kategoriobat }}">{{ $v->nama }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-xl-6">
                <div class="form-group">
                    <label>Nama Obat</label>
                    <input type="text" class="form-control mb-4" placeholder="Masukkan Nama Obat" maxlength="50" name="nama_obat">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="form-group col-xl-3">
                <label>Stok Obat</label>
                <input type="number" class="form-control mb-4" placeholder="Masukkan Stok Obat" min="0" name="stok">
            </div>

            <div class="form-group col-xl-3">
                <label>Harga</label>
                <input type="number" class="form-control" placeholder="Masukkan Harga Obat" min="0" name="harga">
            </div>

            <div class="col-xl-1 offset-xl-5">
                <button type="submit" class="btn btn-primary mt-4 mb-4">Submit</button>
            </div>
        </div>
    </form>

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Kategori Obat</th>
                <th scope="col">Nama Obat</th>
                <th scope="col">Stok Obat</th>
                <th scope="col">Harga</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $k => $v)
            <tr>
                <th scope="row">{{ $v->nama_kategoriobat }}</th>
                <td>{{ $v->nama_obat }}</td>
                <td>{{ $v->stok }}</td>
                <td>{{ $v->harga }}</td>
                <td>
                    <!-- Button trigger modal -->
                    <button type="button" data-toggle="modal" data-target="#stokInputModal" onclick=showModal({{$v->id_obat}})>
                        <i class="fas fa-plus"></i>
                    </button>
                    
                    <!-- Modal -->
                    <form method="POST" action="{{ url('/daftar-obat/update_obat/' . $v->id_obat) }}">
                        @csrf

                        <div class="modal fade" {!! 'id= stokInputModal' . strval($v->id_obat) !!} tabindex="-1" role="dialog" aria-labelledby="stokInputModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" {!! 'id= stokInputModal' . strval($v->id_obat) !!}>Mengganti Stok Obat</h5>
                                    </div>
                                    <div class="modal-body">
                                        <label>Stok Obat Baru</label>
                                        <input type="number" class="form-control mt-2" placeholder="Masukkan Stok Obat" min="0" name="stok_obat_baru">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </td>
                <td>
                    <form method="POST" action="{{ url('/daftar-obat/delete/' . $v->id_obat) }}" onclick="confirmDelete(event)">
                        @method('DELETE')
                        @csrf

                        <button type="submit">
                            <i class="fas fa-times"></i>
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection



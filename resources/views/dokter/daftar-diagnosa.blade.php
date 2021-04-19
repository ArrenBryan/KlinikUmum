@extends('layouts.form')
@section('header', 'Daftar Diagnosa')

@section('content-form')
    <form method="POST" action="{{ url('/daftar-diagnosa/submit') }}">
        @csrf

        <div class="row">
            <div class="col-xl-6">
                <div class="form-group">
                    <label>Kode Diagnosa</label>
                    <input type="text" class="form-control" placeholder="Masukkan Kode Diagnosa" maxlength="10" name="kode_diagnosa">
                </div>
            </div>

            <div class="col-xl-6">
                <div class="form-group">
                    <label>Nama Diagnosa</label>
                    <input type="text" class="form-control mb-4" placeholder="Masukkan Nama Diagnosa" maxlength="50" name="nama_diagnosa">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-1 offset-xl-11">
                <button type="submit" class="btn btn-primary mb-4">Submit</button>
            </div>
        </div>
    </form>

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Kode Diagnosa</th>
                <th scope="col">Nama Diagnosa</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $k => $v)
                <tr>
                    <th scope="row">{{ $v->kode_diagnosa }}</th>
                    <td>{{ $v->nama }}</td>
                    <td>
                        <form method="POST" action="{{ url('/daftar-diagnosa/delete/' . $v->id_diagnosa) }}">
                            @method('DELETE')
                            @csrf

                            <button type="submit" onclick=confirmDelete(event)>
                                <i class="fas fa-times"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

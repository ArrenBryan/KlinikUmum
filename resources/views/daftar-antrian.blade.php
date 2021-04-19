@extends('layouts.form')
@section('header', 'Daftar Pasien Berobat')

@section('content-form')
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">No. Antrian</th>
                <th scope="col">No. Medrec</th>
                <th scope="col">Nama Pasien</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @switch(session('user')->role)
                @case('Administrator')
                    @foreach ($data as $k => $v)
                        <tr>
                            <th scope="row">{{ $v->no_antrian }}</th>
                            <td>{{ $v->no_medrec }}</td>
                            <td>{{ $v->nama_pasien }}</td>
                            <td>
                                <form method="POST" action="{{ url('daftar-antrian/delete/' . $v->no_medrec) }}" onclick="confirmDelete(event)">
                                    @method('DELETE')
                                    @csrf
                                    
                                    <button type="submit">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @break
                
                @case('Dokter Umum')
                    @foreach ($data as $k => $v)
                        <tr>
                            <th scope="row">{{ $v->no_antrian }}</th>
                            <td>{{ $v->no_medrec }}</td>
                            <td>{{ $v->nama_pasien }}</td>
                            <td>
                                <button type="submit">
                                    <a href="{{ url('/daftar-antrian/update/'. $v->no_medrec) }}">
                                        <i class="fas fa-eye" style="color: black"></i>
                                    </a>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                @break

                @case('Apoteker')
                    @foreach ($data as $k => $v)
                        <tr>
                            <th scope="row">{{ $v->no_antrian }}</th>
                            <td>{{ $v->no_medrec }}</td>
                            <td>{{ $v->nama_pasien }}</td>
                            <td>
                                <button type="submit">
                                    <a href="{{ url('daftar-antrian/show/' . $v->no_medrec) }}">
                                        <i class="fas fa-eye" style="color: black"></i>
                                    </a>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                @break
            @endswitch
        </tbody>
    </table>
@endsection

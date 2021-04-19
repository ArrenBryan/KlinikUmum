<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PasienController extends Controller
{
    public function index() {
        return view('administrator.pendaftaran-pasien', [
            'active' => 'pendaftaran-pasien'
        ]);
    }

    public function store(Request $request) {
        $tanggal_lahir = date("d-m-Y", strtotime($request->input('tanggal_lahir')));

        DB::statement("INSERT INTO pasien (nama, jenis_kelamin, tanggal_lahir, tempat_lahir, alamat, no_telp) VALUES (?, ?, TO_DATE(?, 'DD/MM/YYYY'), ?, ?, ?)", [
            $request->input('nama'),
            $request->input('jenis_kelamin'),
            $tanggal_lahir,
            $request->input('tempat_lahir'),
            $request->input('alamat'),
            $request->input('no_telp')
            ]
        );

        return redirect('/pendaftaran-pasien');
    }
}

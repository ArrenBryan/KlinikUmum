<?php

namespace App\Http\Controllers;

use App\Model\Dosis;
use App\Model\Kategori_Obat;
use App\Model\Obat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ObatController extends Controller
{
    public function index_daftar() {
        $kategoriObat = Kategori_Obat::get();

        $datas = Obat::get();
        
        return view('apoteker.daftar-obat', [
            'active' => 'daftar-obat',
            'data' => $datas,
            'kategoriObat' => $kategoriObat
        ]);
    }

    public function index_laporan() {
        return view('laporan.laporan-obat', [
            'active' => 'laporan-obat'
        ]);
    }

    public function store(Request $request)
    {
        DB::statement('INSERT INTO obat (id_kategoriobat, nama, stok, harga) VALUES (?, ?, ?, ?)
        ', [
                $request->input('kategori_obat'),
                $request->input('nama_obat'),
                $request->input('stok'),
                $request->input('harga'),
            ]
        );
        return redirect('/daftar-obat');
    }

    public function delete($id)
    {
        DB::statement('DELETE FROM obat WHERE id_obat = ?', [$id]);
        return redirect('/daftar-obat');
    }

    public function update($id_obat, Request $request)
    {
        DB::statement('UPDATE obat SET stok = ? WHERE id_obat = ?', [$request->input('stok_obat_baru'), $id_obat]);
        return redirect('/daftar-obat');
    }

    public function get_data_dosis($id_kategori_obat) {
        $datas = Dosis::get($id_kategori_obat);

        return response()->json($datas);
    }

    public function get_data_namaobat(Request $request) {
        $id_dosis = $request->input('id_dosis');
        $id_kategoriobat = $request->input('id_kategoriobat');
        $jangka_waktu = $request->input('jangka_waktu');

        $datas = DB::select('SELECT id_obat, nama FROM obat WHERE id_kategoriobat = ? AND stok >= menghitungKuantitasObat(?, ?, ?)', [$id_kategoriobat, $id_kategoriobat, $jangka_waktu, $id_dosis]);

        return response()->json($datas);
    }
}

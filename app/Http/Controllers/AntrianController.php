<?php

namespace App\Http\Controllers;

use App\Model\Antrian;
use App\Model\Diagnosa;
use App\Model\Dokter;
use App\Model\Kategori_Obat;
use App\Model\Pasien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AntrianController extends Controller
{
    public function index_pendaftaran()
    {
        $dokter = Dokter::get();
        
        return view('administrator.pendaftaran-antrian', [
            'active' => 'pendaftaran-antrian',
            'data' => $dokter
        ]);
    }

    public function index_list()
    {   
        if (session('user')->role == 'Apoteker') {
            $datas = Antrian::get_sudahDiperiksa();
        } else {
            $datas = Antrian::get_belumDiperiksa();
        }
        
        return view('daftar-antrian', [
            'active' => 'daftar-antrian',
            'data' => $datas,
        ]);
    }

    public function store(Request $request)
    {
        $currentDate = date("d-m-Y");

        DB::statement("INSERT INTO medical_record (tanggal, NIP, no_medrec, tinggi, berat, suhu, systole, diastole) VALUES (TO_DATE(?, 'DD-MM-YYYY'), ?, ?, ?, ?, ?, ?, ?)
        ", [
                $currentDate,
                $request->input('NIP'),
                $request->input('no_medrec'),
                $request->input('tinggi_badan'),
                $request->input('berat_badan'),
                $request->input('suhu'),
                $request->input('systole'),
                $request->input('diastole'),
            ]
        );

        DB::statement("INSERT INTO antrian (no_antrian, no_medrec, status) VALUES (menghitungAntrianTerakhir, ?, 'Belum diperiksa')
        ",  [
                $request->input('no_medrec'),
            ]
        );

        return redirect('/pendaftaran-antrian');
    }

    public function delete($id)
    {
        DB::statement('DELETE FROM antrian where no_medrec = ?', [$id]);
        return redirect('/daftar-antrian');
    }

    public function update($no_medrec)
    {
        $datas = Pasien::get($no_medrec);

        $diagnosa = Diagnosa::get();

        $kategori_obat = Kategori_Obat::get();

        return view('dokter.pemeriksaan-pasien', [
            'active' => '',
            'data' => $datas,
            'diagnosa' => $diagnosa,
            'kategori_obat' => $kategori_obat
        ]);
    }

    public function put($no_medrec, Request $request) {
        $id_dosis = $request->input('id_dosis');
        $id_kategoriobat = $request->input('id_kategoriobat');
        $jangka_waktu = $request->input('jangka_waktu');
        $currentDate = date("d-m-Y");

        DB::statement('UPDATE medical_record SET catatan = ? WHERE no_medrec = ?', [$request->input('catatan'), $no_medrec]);
        DB::statement("INSERT INTO medicalrecord_diagnosa (tanggal, no_medrec, id_diagnosa) VALUES (TO_DATE(?, 'DD-MM-YYYY'), ?, ?)", [$currentDate, $no_medrec, $request->input('id_diagnosa')]);
        
        DB::statement('INSERT INTO resep_obat (id_dosis, id_obat, jangka_waktu) VALUES (?, ?, ?)', [$id_dosis, $request->input('id_obat'), $jangka_waktu]);
        $lastResepID = DB::select('SELECT MAX(id_resepobat) AS id_resep FROM resep_obat');
        DB::statement("INSERT INTO medicalrecord_resepobat (tanggal, no_medrec, id_resepobat) VALUES (TO_DATE(?, 'DD-MM-YYYY'), ?, ?)", [$currentDate, $no_medrec, $lastResepID[0]->id_resep]);
        
        DB::statement("UPDATE antrian SET status = 'Sudah diperiksa' WHERE no_medrec = ?", [$no_medrec]);

        return redirect('/daftar-antrian');
    }
    
    public function show($id)
    {
        $datas = DB::select('
            select
                a.no_medrec as no_medrec,
                a.nama as nama_pasien,
                menghitungUmurPasien(?) as umur,
                a.tempat_lahir as tempat_lahir,
                a.tanggal_lahir as tanggal_lahir,
                a.jenis_kelamin as jenis_kelamin,
                a.no_telp as no_telp,
                a.alamat as alamat,
                b.nama as nama_diagnosa,
                c.nama as kategori_obat,
                d.nama as nama_obat,
                e.keterangan as dosis,
                i.jangka_waktu as jangka_waktu,
                f.catatan as catatan

            from pasien a
            join medical_record f
            on a.no_medrec = f.no_medrec
            join medicalrecord_diagnosa g
            on a.no_medrec = g.no_medrec
            join diagnosa b
            on g.id_diagnosa = b.id_diagnosa
            join medicalrecord_resepobat h
            on h.no_medrec = f.no_medrec
            join resep_obat i
            on i.id_resepobat = h.id_resepobat
            join obat d
            on d.id_obat = i.id_obat
            join kategori_obat c
            on c.id_kategoriobat = d.id_kategoriobat
            join dosis e
            on e.id_dosis = i.id_dosis
            where a.no_medrec = ?
        ', [$id, $id]);


        return view('apoteker.pembuatan-obat', [
            'active' => '',
            'data' => $datas[0]
        ]);
    }

    public function delete_antrian($no_medrec)
    {
        DB::statement('DELETE FROM antrian WHERE no_medrec = ?', [$no_medrec]);
        return redirect('/daftar-antrian');
    }
}

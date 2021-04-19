<?php

namespace App\Model;

use Illuminate\Support\Facades\DB;

class Pasien
{
    public $no_medrec;
    public $nama;
    public $tempat_lahir;
    public $jenis_kelamin;
    public $alamat;
    public $umur_pasien;
    public $tanggal_lahir;
    public $no_telp;

    public function __construct($no_medrec, $nama, $tempat_lahir, $jenis_kelamin, $alamat, $umur_pasien, $tanggal_lahir, $no_telp)
    {
        $this->no_medrec = $no_medrec;
        $this->nama = $nama;
        $this->tempat_lahir = $tempat_lahir;
        $this->jenis_kelamin = $jenis_kelamin;
        $this->alamat = $alamat;
        $this->umur_pasien = $umur_pasien;
        $this->tanggal_lahir = $tanggal_lahir;
        $this->no_telp = $no_telp;
    }

    public static function get(int $id): Pasien {
        $pasien = DB::select('SELECT no_medrec, nama, tempat_lahir, jenis_kelamin, alamat, menghitungUmurPasien(?) AS umur_pasien, tanggal_lahir, no_telp FROM pasien WHERE no_medrec = ?', [$id, $id]);
        
        return new Pasien (
            $pasien[0]->no_medrec,
            $pasien[0]->nama,
            $pasien[0]->tempat_lahir,
            $pasien[0]->jenis_kelamin,
            $pasien[0]->alamat,
            $pasien[0]->umur_pasien,
            $pasien[0]->tanggal_lahir,
            $pasien[0]->no_telp
        );
    }
}

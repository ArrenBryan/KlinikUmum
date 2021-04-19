<?php

namespace App\Model;

use Illuminate\Support\Facades\DB;

class Antrian
{
    public static function get_belumDiperiksa(): array {
        $antrian = DB::select("
            SELECT a.no_antrian, b.no_medrec, b.nama AS nama_pasien
            FROM antrian a
            JOIN pasien b
            ON a.no_medrec = b.no_medrec
            WHERE status = 'Belum diperiksa'
        ");
        return $antrian;
    }

    public static function get_sudahDiperiksa(): array {
        $antrian = DB::select("
            SELECT a.no_antrian, b.no_medrec, b.nama AS nama_pasien
            FROM antrian a
            JOIN pasien b
            ON a.no_medrec = b.no_medrec
            WHERE status = 'Sudah diperiksa'
        ");
        return $antrian;
    }
}

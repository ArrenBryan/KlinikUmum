<?php

namespace App\Model;

use Illuminate\Support\Facades\DB;

class Obat
{
    public static function get(): array {
        $obat = DB::select('
            SELECT a.nama AS nama_kategoriobat, b.id_obat, b.nama AS nama_obat, b.stok, b.harga
            FROM kategori_obat a
            JOIN obat b
            ON b.id_kategoriobat = a.id_kategoriobat
        ');
        return $obat;
    }
}

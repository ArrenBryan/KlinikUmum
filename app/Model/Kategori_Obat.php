<?php

namespace App\Model;

use Illuminate\Support\Facades\DB;

class Kategori_Obat
{
     public static function get(): array {
        $diagnosa = DB::select('SELECT * FROM kategori_obat');

        return $diagnosa;
    }
}

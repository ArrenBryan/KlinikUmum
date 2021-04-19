<?php

namespace App\Model;

use Illuminate\Support\Facades\DB;

class Dokter
{
    public static function get(): array {
        $dokter = DB::select('SELECT NIP, nama FROM dokter');

        return $dokter;
    }
}

<?php

namespace App\Model;

use Illuminate\Support\Facades\DB;

class Diagnosa
{
    public static function get(): array {
        $diagnosa = DB::select('SELECT * FROM diagnosa');

        return $diagnosa;
    }
}

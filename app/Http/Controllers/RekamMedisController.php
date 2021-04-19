<?php

namespace App\Http\Controllers;

use App\Model\Rekam_Medis;
use Illuminate\Support\Facades\DB;

class RekamMedisController extends Controller
{
    public function index() {
        return view('rekam-medis', [
            'active' => 'rekam-medis'
        ]);
    }

    public function get_data_full($no_medrec) {
        $lastNoMedrec = DB::select('SELECT max(no_medrec) as no_medrec FROM pasien');

        if ($no_medrec > $lastNoMedrec[0]->no_medrec) {
            return response()->json([
                'error_message' => 'Nomor Rekam Medis Tidak Ditemukan!'
            ], 400);
        }
        
        $data = Rekam_Medis::get_full($no_medrec);

        return response()->json($data);
    }

    public function get_data($no_medrec) {
        $lastNoMedrec = DB::select('SELECT max(no_medrec) as no_medrec FROM pasien');

        if ($no_medrec > $lastNoMedrec[0]->no_medrec) {
            return response()->json([
                'error_message' => 'Nomor Rekam Medis Tidak Ditemukan!'
            ], 400);
        }
        
        $data = Rekam_Medis::get($no_medrec);

        return response()->json($data);
    }
}

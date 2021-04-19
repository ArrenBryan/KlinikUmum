<?php

namespace App\Http\Controllers;

use App\Model\Diagnosa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DiagnosaController extends Controller
{
    public function index_daftar() {
        $datas = Diagnosa::get();

        return view('dokter.daftar-diagnosa', [
            'active' => 'daftar-diagnosa',
            'data' => $datas
        ]);
    }

    public function index_laporan() {
        return view('laporan.laporan-diagnosa', [
            'active' => 'laporan-diagnosa',
        ]);
    }

    public function store(Request $request) {
        DB::statement('INSERT INTO diagnosa (kode_diagnosa, nama) VALUES (
            ?, ?
        )', [
                $request->input('kode_diagnosa'),
                $request->input('nama_diagnosa')
            ]
        );
        return redirect('/daftar-diagnosa');
    }

    public function delete($id) {
        DB::statement('DELETE FROM diagnosa WHERE id_diagnosa = ?', [$id]);
        return redirect('/daftar-diagnosa');
    }

    public function get_data($tanggal) {
        $data = [
            '2021-01' => [
                [
                    'kode_diagnosa' => 'A100',
                    'nama_diagnosa' => 'Pusing',
                    'jumlah' => '322',
                ],
                [
                    'kode_diagnosa' => 'A100',
                    'nama_diagnosa' => 'Pusing',
                    'jumlah' => '322',
                ],
                [
                    'kode_diagnosa' => 'A100',
                    'nama_diagnosa' => 'Pusing',
                    'jumlah' => '322',
                ]
            ],
            '2021-02' => [
                [
                    'kode_diagnosa' => 'J440',
                    'nama_diagnosa' => 'Sakit Perut',
                    'jumlah' => '100',  
                ],
                [
                    'kode_diagnosa' => 'J440',
                    'nama_diagnosa' => 'Sakit Perut',
                    'jumlah' => '100',  
                ],
                [
                    'kode_diagnosa' => 'J440',
                    'nama_diagnosa' => 'Sakit Perut',
                    'jumlah' => '100',  
                ]
            ],
            '2021-03' => [
                [
                    'kode_diagnosa' => 'C22',
                    'nama_diagnosa' => 'Magh',
                    'jumlah' => '10',
                ],
                [
                    'kode_diagnosa' => 'C22',
                    'nama_diagnosa' => 'Magh',
                    'jumlah' => '10',
                ],
                [
                    'kode_diagnosa' => 'C22',
                    'nama_diagnosa' => 'Magh',
                    'jumlah' => '10',
                ]
            ],
            '2021-04' => [
                [
                    'kode_diagnosa' => 'A120',
                    'nama_diagnosa' => 'Jantungan',
                    'jumlah' => '2',
                ],
                [
                    'kode_diagnosa' => 'A120',
                    'nama_diagnosa' => 'Jantungan',
                    'jumlah' => '2',
                ],
                [
                    'kode_diagnosa' => 'A120',
                    'nama_diagnosa' => 'Jantungan',
                    'jumlah' => '2',
                ],
            ],
        ];

        if (!isset($data[$tanggal])) {
            return response()->json([
                'error_message' => 'Data Tidak Ditemukan!'
            ], 400);
        }

        return response()->json($data[$tanggal]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Model\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\MessageBag;

class UserController extends Controller
{
    public function index_login()
    {
        return view('login');
    }

    public function check(Request $request)
    {
        // validate input
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        // check if username and password is match
        $id = User::check(
            $request->username,
            $request->password
        );

        // if id is -1; credentials is invalid, either no records found or
        // password is not match
        if ($id == -1) {
            $messages = new MessageBag([
                'login' => 'Credentials is invalid',
            ]);
            return redirect('/login')->withErrors($messages);
        }

        // save the valid user object to session
        $user = User::get($id);
        session([
            'user' => $user,
        ]);

        // redirect to page based on role
        switch ($user->role) {
            case 'Administrator':
                return redirect('/pendaftaran-pasien');

            case 'Dokter Umum':
                return redirect('/daftar-antrian');
            
            case 'Apoteker':
                return redirect('/daftar-antrian');

            case 'Penanggung Jawab Klinik':
                return redirect('/rekam-medis');
        }

        return redirect('/login');
    }

    public function logout(Request $request)
    {
        $request->session()->remove('user');
        return redirect('/login');
    }

    public function index() {
        return view('administrator.pendaftaran-akun', [
            'active' => 'pendaftaran-akun'
        ]);
    }

    public function store(Request $request) {
        DB::statement('INSERT INTO akun (username, password, role) VALUES (?, ?, ?)', [
                $request->input('username'),
                $request->input('password'),
                $request->input('role')
            ]
        );

        if ($request->input('role') == "Dokter Umum") {
            $lastAkunID = DB::select('SELECT MAX(id_akun) AS id_akun FROM akun');
            $tanggal_dipekerjakan = date("d-m-Y", strtotime($request->input('tanggal_dipekerjakan')));
            // dd($tanggal_dipekerjakan);

            DB::statement("INSERT INTO dokter (nip, id_akun, nama, tanggal_dipekerjakan) VALUES (generateNIP(TO_DATE(?, 'DD/MM/YYYY'), SEQ_ID_DOKTER.NEXTVAL), ?, ?, TO_DATE(?, 'DD/MM/YYYY'))", [
                    $tanggal_dipekerjakan,
                    $lastAkunID[0]->id_akun,
                    $request->input('nama_dokter'),
                    $tanggal_dipekerjakan
                ]
            );
        }

        return redirect('/pendaftaran-akun');
    }
}

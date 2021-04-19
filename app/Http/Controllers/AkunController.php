<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AkunController extends Controller
{
    public function index() {
        return view('administrator.pendaftaran-akun', [
            'active' => 'pendaftaran-akun'
        ]);
    }

    public function store(Request $request) {
        dd($request);
    }
}

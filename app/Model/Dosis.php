<?php

namespace App\Model;

use Illuminate\Support\Facades\DB;

class Dosis
{
    public $id;
    public $username;
    public $role;

    public function __construct($id, $username, $role)
    {
        $this->id = $id;
        $this->name = $username;
        $this->role = $role;
    }

    public static function check(string $username, string $password): int {
        $users = DB::select('SELECT * FROM AKUN WHERE AKUN.username = ?', [$username]);
        if (count($users) == 0) {
            return -1;
        }

        if ($users[0]->password != $password) {
            return -1;
        }

        return $users[0]->id_akun;
    }

    public static function get($id): array {
        $diagnosa = DB::select('SELECT * FROM dosis WHERE id_kategoriobat = ?', [$id]);
        
        return $diagnosa;
    }
}

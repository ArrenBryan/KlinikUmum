<?php

namespace App\Model;

use Illuminate\Support\Facades\DB;

class User
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
        $users = DB::select('SELECT * FROM AKUN WHERE username = ?', [$username]);
        if (count($users) == 0) {
            return -1;
        }

        if ($users[0]->password != $password) {
            return -1;
        }

        return $users[0]->id_akun;
    }

    public static function get(int $id): User {
        $users = DB::select('SELECT * FROM AKUN WHERE id_akun = ?', [$id]);
        if (count($users) == 0) {
            return null;
        }

        return new User(
            $users[0]->id_akun,
            $users[0]->username,
            $users[0]->role
        );
    }
}

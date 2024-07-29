<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Authi extends Model
{
    use HasFactory;

    public function loginAct($email)
    {
        return DB::table('users AS a')
        ->join('hak_akses AS b', 'a.hak_akses_id', '=', 'b.id')
        ->select('a.*', 'b.hak_akses')
        ->where('a.email', $email)
        ->first();
    }

    public function bengkelAct($email)
    {
        return DB::table('bengkel')
        ->where('email', $email)
        ->first();
    }
    public function penggunaAct($email)
    {
        return DB::table('pengguna')
        ->where('email', $email)
        ->first();
    }
}

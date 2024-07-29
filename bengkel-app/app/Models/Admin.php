<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Admin extends Model
{
    use HasFactory;
    
    public function bengkel()
    {
        return DB::table('bengkel AS a')
        ->join('kec AS b', 'a.kec_id', '=', 'b.id')
        ->join('kel AS c', 'a.kel_id', '=', 'c.id')
        ->select('a.*', 'b.kec', 'c.kel')
        ->orderBy('a.id', 'DESC')
        ->get();
    }
    public function bengkelCount()
    {
        return DB::table('bengkel')
        ->count();
    }
    public function penggunaCount()
    {
        return DB::table('pengguna')
        ->count();
    }
    public function bengkelById($id)
    {
        return DB::table('bengkel')
        ->where('id', $id)
        ->first();
    }
    public function kec()
    {
        return DB::table('kec')
        ->get();
    }
    public function kel()
    {
        return DB::table('kel')
        ->get();
    }
    public function kelByIdKec($id)
    {
        return DB::table('kel')
        ->where('kec_id', $id)
        ->get();
    }
    public function administrator()
    {
        return DB::table('users AS a')
        ->join('hak_akses AS b', 'a.hak_akses_id', '=', 'b.id')
        ->select('a.*', 'b.hak_akses')
        ->orderBy('a.id', 'DESC')
        ->get();
    }
    public function pengguna()
    {
        return DB::table('pengguna AS a')
        ->join('kec AS b', 'a.kec_id', '=', 'b.id')
        ->join('kel AS c', 'a.kel_id', '=', 'c.id')
        ->select('a.*', 'b.kec', 'c.kel')
        ->orderBy('a.id', 'DESC')
        ->get();
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Bengkel extends Model
{
    use HasFactory;
    public function totalPesanan()
    {
        return DB::table('transaksi')
        ->selectRaw(
            "SUM(CASE WHEN status='0' THEN 1 ELSE 0 END) AS baru,".
            "SUM(CASE WHEN status='1' THEN 1 ELSE 0 END) AS proses,".
            "SUM(CASE WHEN status='2' THEN 1 ELSE 0 END) AS selesai,".
            "SUM(CASE WHEN status='99' THEN 1 ELSE 0 END) AS tolak"
        )
        ->where('bengkel_id', session('id'))
        ->first();
    }
    public function jasaBengkelById()
    {
        return DB::table('bengkel')
        ->where('id', session('id'))
        ->first();
    }
    public function jasa()
    {
        return DB::table('jasa')
        ->where('bengkel_id', session('id'))
        ->get();
    }
    public function profil()
    {
        return DB::table('bengkel')
        ->where('id', session('id'))
        ->first();
    }
    public function rating()
    {
        return DB::table('rating')
        ->where('bengkel_id', session('id'))
        ->get();
    }
    public function barang()
    {
        return DB::table('barang')
        ->where('bengkel_id', session('id'))
        ->orderBy('id', 'ASC')
        ->get();
    }
    public function transaksiById($id)
    {
        return DB::table('transaksi AS a')
        ->join('pengguna AS b', 'a.pengguna_id', '=', 'b.id')
        ->join('kec AS c', 'b.kec_id', '=', 'c.id')
        ->join('kel AS d', 'b.kel_id', '=', 'd.id')
        ->select('a.*', 'b.nama', 'b.hp', 'c.kec', 'd.kel')
        ->where('a.id', $id)
        ->first();
    }
    public function transaksiBaru()
    {
        return DB::table('transaksi AS a')
        ->join('pengguna AS b', 'a.pengguna_id', '=', 'b.id')
        ->select('a.*', 'b.nama','b.hp')
        ->where('a.bengkel_id', session('id'))
        ->where('a.status', '0')
        ->get();
    }
    public function transaksiProses()
    {
        return DB::table('transaksi AS a')
        ->join('pengguna AS b', 'a.pengguna_id', '=', 'b.id')
        ->select('a.*', 'b.nama','b.hp')
        ->where('a.bengkel_id', session('id'))
        ->where('a.status', '1')
        ->get();
    }
    public function transaksiSelesai()
    {
        return DB::table('transaksi AS a')
        ->join('pengguna AS b', 'a.pengguna_id', '=', 'b.id')
        ->select('a.*', 'b.nama','b.hp')
        ->where('a.bengkel_id', session('id'))
        ->where('a.status', '2')
        ->get();
    }
    public function transaksiTolak()
    {
        return DB::table('transaksi AS a')
        ->join('pengguna AS b', 'a.pengguna_id', '=', 'b.id')
        ->select('a.*', 'b.nama','b.hp')
        ->where('a.bengkel_id', session('id'))
        ->where('a.status', '99')
        ->get();
    }
}

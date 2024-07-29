<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Frontend extends Model
{
    use HasFactory;

    public function profil()
    {
        return DB::table('pengguna')
        ->where('id', session('id'))
        ->first();
    }
    public function bengkel()
    {
        return DB::table('bengkel AS a')
        ->join('kec AS b', 'a.kec_id', '=', 'b.id')
        ->join('kel AS c', 'a.kel_id', '=', 'c.id')
        ->select('a.*', 'b.kec', 'c.kel')
        ->get();
    }
    public function ratingCount($id)
    {
        return DB::table('rating')
        ->where('bengkel_id', $id)
        ->selectRaw(
            "SUM(rating) AS sumRating,".
            "COUNT(id) AS countRating"
        )
        ->first();
    }
    public function totalPesanan()
    {
        return DB::table('transaksi')
        ->selectRaw(
            "SUM(CASE WHEN status='0' THEN 1 ELSE 0 END) AS baru,".
            "SUM(CASE WHEN status='1' THEN 1 ELSE 0 END) AS proses,".
            "SUM(CASE WHEN status='2' THEN 1 ELSE 0 END) AS selesai,".
            "SUM(CASE WHEN status='99' THEN 1 ELSE 0 END) AS tolak"
        )
        ->where('pengguna_id', session('id'))
        ->first();
    }
    public function bengkelById($id)
    {
        return DB::table('bengkel AS a')
        ->join('kec AS b', 'a.kec_id', '=', 'b.id')
        ->join('kel AS c', 'a.kel_id', '=', 'c.id')
        ->leftJoin('rating AS d', 'a.id', '=', 'd.bengkel_id')
        ->select('a.*', 'b.kec', 'c.kel', 'd.rating', 'd.komentar', 'd.balasan_komentar', 'd.updated_at AS tgl_komentar')
        ->where('a.id', $id)
        ->first();
    }
    public function transaksiBaru()
    {
        return DB::table('transaksi AS a')
        ->join('bengkel AS b', 'a.bengkel_id', '=', 'b.id')
        ->select('a.*', 'b.nm_bengkel')
        ->where('a.pengguna_id', session('id'))
        ->where('a.status', '0')
        ->get();
    }
    public function transaksiProses()
    {
        return DB::table('transaksi AS a')
        ->join('bengkel AS b', 'a.bengkel_id', '=', 'b.id')
        ->select('a.*', 'b.nm_bengkel')
        ->where('a.pengguna_id', session('id'))
        ->where('a.status', '1')
        ->get();
    }
    public function transaksiSelesai()
    {
        return DB::table('transaksi AS a')
        ->join('bengkel AS b', 'a.bengkel_id', '=', 'b.id')
        ->leftJoin('rating AS c', 'b.id', '=', 'c.bengkel_id')
        ->select('a.*', 'b.nm_bengkel', 'c.rating', 'c.komentar', 'c.balasan_komentar')
        ->where('a.pengguna_id', session('id'))
        ->where('a.status', '2')
        ->get();
    }
    public function transaksiTolak()
    {
        return DB::table('transaksi AS a')
        ->join('bengkel AS b', 'a.bengkel_id', '=', 'b.id')
        ->select('a.*', 'b.nm_bengkel')
        ->where('a.pengguna_id', session('id'))
        ->where('a.status', '99')
        ->get();
    }
}

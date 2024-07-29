<?php
use Illuminate\Support\Facades\DB;

function master() {
    $data = DB::table('masters')->first();
    return $data;
}

function informasi() {
  $data = DB::table('info')
          ->where('status', 1)
          ->first();
  return $data;
}
function transaksiBaru() {
  $data = DB::table('transaksi')
  ->where('bengkel_id', session('id'))
  ->where('status', '0')
  ->count();
  return $data;
}
function transaksiProses() {
  $data = DB::table('transaksi')
  ->where('bengkel_id', session('id'))
  ->where('status', '1')
  ->count();
  return $data;
}
function rating() {
  $data = DB::table('rating')
          ->where('bengkel_id', session('id'))
          ->where('status', '0')
          ->count();
  return $data;
}
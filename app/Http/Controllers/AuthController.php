<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Auth;
use App\Models\Authi;

class AuthController extends Controller
{
    public function __construct() {
        $this->Authi = new Authi;
    }

    public function index()
    {
        return view('auth/login');
    }

    public function loginAct(Request $request)
    {
        $akun = $this->Authi->loginAct($request->email);
        $bengkel = $this->Authi->bengkelAct($request->email);
        $pengguna = $this->Authi->penggunaAct($request->email);
        if($akun) {
            $pass = Hash::check($request->password, $akun->password);
            if ($pass == 1) {
                session::put('id', $akun->id);
                session::put('hak_akses_id', $akun->hak_akses_id);
                session::put('hak_akses', $akun->hak_akses);
                session::put('nama', $akun->name);
                session::put('email', $akun->email);

                if($akun->hak_akses_id==1){
                    return redirect('admin/dashboard');
                }else{
                    return redirect('auth')->with('error','Hak akses dibatasi!');
                }
            }else{
                  return redirect('auth')->with('error','Email atau password anda salah!');
            }
        }elseif($bengkel){
            session::put('id', $bengkel->id);
            session::put('hak_akses_id', '2');
            session::put('nama', $bengkel->nm_bengkel);
            session::put('pemilik', $bengkel->pemilik);
            session::put('email', $bengkel->email);
            return redirect('bengkel/dashboard');
        }elseif($pengguna){
            $pass = Hash::check($request->password, $pengguna->password);
            if ($pass == 1) {
                session::put('id', $pengguna->id);
                session::put('hak_akses_id', '3');
                session::put('nama', $pengguna->nama);
                session::put('email', $pengguna->email);
                return redirect('app/dashboard');
            }else{
                return redirect('auth')->with('error','Email atau password anda salah!');
            }
        }
        else{
            return redirect('auth')->with('error','Akun anda tidak ditemui!');
        }
        
    }

    public function Logout()
    {
        Session::flush();
        return redirect('auth');
    }

}

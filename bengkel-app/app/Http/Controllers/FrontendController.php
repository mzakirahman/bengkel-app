<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Models\Frontend;
use App\Models\Admin;

class FrontendController extends Controller
{
    public function __construct() {
        $this->Frontend = new Frontend;
        $this->Admin = new Admin;
    }

    public function index()
    {
        $data['data'] = $this->Frontend->bengkel();
        $rate=[];
        foreach ($data['data'] as $key => $p) {
            $h=$this->Frontend->ratingCount($p->id);
            // print_r($h->sumRating);die;
            if($h->countRating!=0){
                $jm = $h->sumRating / $h->countRating;
            $rate[$p->id] = round($jm);
            }else{
                $rate[$p->id] = '0';
            }
        }
        // print_r($rate);die;
        $data['rate']=$rate;
        return view('frontend/pages/land/home', $data);
    }
    public function lokasiBengkel()
    {
        $data['data'] = $this->Frontend->bengkel();
        return view('frontend/pages/land/peta', $data);
    }    
    public function regis()
    {
        $data['kec'] = $this->Admin->kec();
        return view('auth/regis',$data);
    }
    public function regisAct(Request $request)
    {
        try {
            $fileName = time().'.'.$request->gambar->extension();
            $request->gambar->move(public_path('assets/backend/images/pengguna/'), $fileName );
            DB::table('pengguna')->insert(
                [
                    'nama'    => $request->nama,
                    'hp'    => $request->hp,
                    'email'         => $request->email,
                    'password'      => Hash::make($request->password),
                    'kec_id'        => $request->kec_id,
                    'kel_id'        => $request->kel_id,
                    'alamat'        => $request->alamat,
                    'gambar'        => $fileName
                ]
            );

            return redirect('/auth')->with('success', 'Registrasi berhasil!');
        } catch (\Throwable $th) {
            return redirect('/auth')->with('error', 'Registrasi gagal!');
        }
    }
    public function profil()
    {
        $data['p'] = $this->Frontend->profil();
        return view('frontend/pages/profil', $data);
    }  
    public function profilUpdate(Request $request)
    {
        try {
            if(!empty($request->password)){
                $pass = Hash::make($request->password);
            }else{
                $pass = $request->password2;
            }
            DB::table('pengguna')->where('id', $request->id)->update([
                'nama'    => $request->nama,
                'hp'   => $request->hp,
                'alamat'           => $request->alamat,
                'password'           => $pass,
            ]);
            return redirect('/app/profil')->with('success', 'Profil berhasil dirubah!');
        } catch (\Throwable $th) {
            return redirect('/app/profil')->with('error', 'Profil gagal dirubah!');
        }
    } 
    
    public function home()
    {
        
        $data['h'] = $this->Frontend->totalPesanan();
        $data['data'] = $this->Frontend->bengkel();
        return view('frontend/pages/home',$data);
    }
    
    public function pesan($id)
    {
        $data['data'] = $this->Frontend->bengkelById($id);
        return view('frontend/pages/pesan',$data);
    }
    public function pesanAct(Request $request)
    {
        try {
            $fileName = time().'.'.$request->gambar->extension();
            $request->gambar->move(public_path('assets/backend/images/transaksi/'), $fileName );
            DB::table('transaksi')->insert([
                'bengkel_id'    => $request->bengkel_id,
                'pengguna_id'   => session('id'),
                'ket'           => $request->ket,
                'lat'           => $request->lat,
                'lon'           => $request->lon,
                'gambar'        => $fileName
            ]);
            return redirect('/app/transaksi-baru/')->with('success', 'Pesan bersahsil dikirim, bengkel akan menanggapi permintaan anda!');
        } catch (\Throwable $th) {
            return redirect('/app/pesan/'.$request->bengkel_id)->with('error', 'Pesan gagal dikirim!');
        }
    }
    public function transaksiBaru()
    {
        $data['data'] = $this->Frontend->transaksiBaru();
        return view('frontend/pages/transaksi',$data);
    }
    public function transaksiProses()
    {
        $data['data'] = $this->Frontend->transaksiProses();
        return view('frontend/pages/transaksi',$data);
    }
    public function transaksiSelesai()
    {
        $data['data'] = $this->Frontend->transaksiSelesai();
        return view('frontend/pages/transaksi',$data);
    }
    public function transaksiTolak()
    {
        $data['data'] = $this->Frontend->transaksiTolak();
        return view('frontend/pages/transaksi',$data);
    }
    public function rating($id)
    {
        $data['data'] = $this->Frontend->bengkelById($id);
        return view('frontend/pages/rating',$data);
    }
    public function ratingAct(Request $request)
    {
        // print_r($request->rating);die;
        try {
            DB::table('rating')->updateOrInsert([
                'bengkel_id' => $request->bengkel_id, 'pengguna_id' => session('id')
            ],[
                'bengkel_id'    => $request->bengkel_id,
                'pengguna_id'   => session('id'),
                'rating'           => $request->rating,
                'komentar'           => $request->komentar,
            ]);
            return redirect('/app/transaksi-selesai')->with('success', 'Penilaian bersahsil dikirim!');
        } catch (\Throwable $th) {
            return redirect('/app/transaksi-selesai')->with('error', 'Penilaian gagal dikirim!');
        }
    }
}

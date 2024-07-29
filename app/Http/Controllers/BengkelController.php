<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpOffice\PhpWord\TemplateProcessor;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use PHPMailer\PHPMailer\PHPMailer;  
use PHPMailer\PHPMailer\Exception;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Pdf;

use App\Models\Bengkel;

class BengkelController extends Controller
{
    public function __construct() {
        $this->Bengkel = new Bengkel;
    }

    public function index()
    {
        $data['h'] = $this->Bengkel->totalPesanan();
        return view('backend/item/home', $data);
    }
    public function profil()
    {
        $data['p'] = $this->Bengkel->profil();
        return view('backend/bengkel/profil', $data);
    }
    public function rating()
    {
        $data['data'] = $this->Bengkel->rating();
        return view('backend/bengkel/rating', $data);
    }
    public function ratingUpdate(Request $request)
    {
        try {
            DB::table('rating')->where('id', $request->id)->update(
                [
                    'balasan_komentar'       => $request->balasan_komentar,
                    'status'                 => '1',
                ]
            );

            return redirect('bengkel/rating')->with('success', 'Balasan berhasil dikirim!');
        } catch (\Throwable $th) {
            return redirect('bengkel/rating')->with('error', 'Balasan gagal dikirim!');
        }
    }
    public function barang()
    {
        $data['data'] = $this->Bengkel->barang();
        return view('backend/bengkel/barang', $data);
    }
    public function barangAct(Request $request)
    {
        try {
            DB::table('barang')->insert(
                [
                    'bengkel_id'    => session('id'),
                    'nm_barang'       => $request->nm_barang
                ]
            );

            return redirect('bengkel/barang')->with('success', 'Data berhasil disimpan!');
        } catch (\Throwable $th) {
            return redirect('bengkel/barang')->with('error', 'Data gagal disimpan!');
        }
    }
    public function barangUpdate(Request $request)
    {
        try {
            DB::table('barang')->where('id', $request->id)->update(
                [
                    'nm_barang'       => $request->nm_barang,
                ]
            );

            return redirect('bengkel/barang')->with('success', 'Data berhasil disimpan!');
        } catch (\Throwable $th) {
            return redirect('bengkel/barang')->with('error', 'Data gagal disimpan!');
        }
    }
    public function transaksiBaru()
    {
        $data['data'] = $this->Bengkel->transaksiBaru();
        return view('backend/bengkel/transaksi', $data);
    }
    public function transaksiProses()
    {
        $data['data'] = $this->Bengkel->transaksiProses();
        return view('backend/bengkel/transaksi', $data);
    }
    public function transaksiSelesai()
    {
        $data['data'] = $this->Bengkel->transaksiSelesai();
        return view('backend/bengkel/transaksi', $data);
    }
    public function transaksiTolak()
    {
        $data['data'] = $this->Bengkel->transaksiTolak();
        return view('backend/bengkel/transaksi', $data);
    }
    public function transaksiById($id)
    {
        $data['data'] = $this->Bengkel->transaksiById($id);
        return view('backend/bengkel/detail', $data);
    }
    public function transaksiAct(Request $request)
    {
        try {
            if($request->proses!='selesai'){
                if($request->proses=='proses'){
                    $status = '1';
                }else{
                    $status = '99';
                }
                DB::table('transaksi')->where('id', $request->id)->update(
                    [
                        'balas'       => $request->balas,
                        'status'       => $status
                    ]
                );
            }else{
                DB::table('transaksi')->where('id', $request->id)->update(
                    [
                        'balas'       => $request->balas,
                        'biaya'       => $request->biaya,
                        'status'       => '2'
                    ]
                );
            }

            return redirect('bengkel/transaksi-proses')->with('success', 'Data berhasil diproses!');
        } catch (\Throwable $th) {
            return redirect('bengkel/transaksi-proses')->with('error', 'Data gagal diproses!');
        }
    }
    public function jasa()
    {
        // $data['data'] = $this->Bengkel->jasa();
        $data['data'] = $this->Bengkel->jasaBengkelById();
        return view('backend/bengkel/jasa', $data);
    }
    public function jasaInsert(Request $request)
    {
        try {
            DB::table('jasa')->insert(
                [
                    'bengkel_id'    => session('id'),
                    'nm_jasa'       => $request->nm_jasa,
                    'status'        => $request->status
                ]
            );

            return redirect('bengkel/jasa')->with('success', 'Data berhasil disimpan!');
        } catch (\Throwable $th) {
            return redirect('bengkel/jasa')->with('error', 'Data gagal disimpan!');
        }
    }
    public function jasaUpdate(Request $request)
    {
        try {
            DB::table('bengkel')->where('id', $request->id)->update(
                [
                    'service'       => $request->service,
                ]
            );

            return redirect('bengkel/jasa')->with('success', 'Data berhasil disimpan!');
        } catch (\Throwable $th) {
            return redirect('bengkel/jasa')->with('error', 'Data gagal disimpan!');
        }
    }
    public function jasaDelete($id)
    {
        try {
            DB::table('jasa')->where('id', $id)->delete();

            return redirect('bengkel/jasa')->with('success', 'Data berhasil dihapus!');
        } catch (\Throwable $th) {
            return redirect('bengkel/jasa')->with('error', 'Data gagal dihapus!');
        }
    }
}

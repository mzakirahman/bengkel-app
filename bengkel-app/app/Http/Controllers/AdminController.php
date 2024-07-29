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
use Pdf;
use Excel;
use Image;
use Response;

use App\Models\Admin;
use App\Imports\PenerimaImport;

class AdminController extends Controller
{
    public function __construct() {
        $this->Admin = new Admin;
    }

    public function index()
    {
        $data['kec'] = $this->Admin->kec();
        $data['bengkel'] = $this->Admin->bengkelCount();
        $data['pengguna'] = $this->Admin->penggunaCount();
        return view('backend/item/home', $data);
    }
    public function kelByIdKec($id)
    {
        $data = $this->Admin->kelByIdKec($id);
        return response()->json($data);
    }
    public function bengkel()
    {
        $data['data'] = $this->Admin->bengkel();
        $data['kec'] = $this->Admin->kec();
        return view('backend/pages/bengkel', $data);
    }
    public function bengkelInsert(Request $request)
    {
        try {
            $fileName = time().'.'.$request->gambar->extension();
            $request->gambar->move(public_path('assets/backend/images/bengkel/'), $fileName );
            DB::table('bengkel')->insert(
                [
                    'nm_bengkel'    => $request->nm_bengkel,
                    'pemilik'       => $request->pemilik,
                    'hp'       => $request->hp,
                    'email'         => $request->email,
                    'password'      => Hash::make($request->password),
                    'kec_id'        => $request->kec_id,
                    'kel_id'        => $request->kel_id,
                    'alamat'        => $request->alamat,
                    'gambar'        => $fileName,
                    'lat'           => $request->lat,
                    'lon'           => $request->lon,
                    'status'        => $request->status
                ]
            );

            return redirect('admin/bengkel')->with('success', 'Data berhasil disimpan!');
        } catch (\Throwable $th) {
            return redirect('admin/bengkel')->with('error', 'Data gagal disimpan!');
        }
    }

    public function bengkelUpdate(Request $request)
    {
        try {
            if(!empty($request->password)){
                $pass = Hash::make($request->password);
            }else{
                $pass = $request->password2;
            }
            if(!empty($request->gambar)){
                $fileName = time().'.'.$request->gambar->extension();
                $request->gambar->move(public_path('assets/backend/images/bengkel/'), $fileName );
            }else{
                $fileName = $request->gambar2;
            }
            DB::table('bengkel')->where('id', $request->id)->update(
                [
                    'nm_bengkel'    => $request->nm_bengkel,
                    'pemilik'       => $request->pemilik,
                    'hp'       => $request->hp,
                    'password'      => $pass,
                    'kec_id'        => $request->kec_id,
                    'kel_id'        => $request->kel_id,
                    'alamat'        => $request->alamat,
                    'gambar'        => $fileName,
                    'lat'           => $request->lat,
                    'lon'           => $request->lon,
                    'status'        => $request->status
                ]
            );

            return redirect('admin/bengkel')->with('success', 'Data berhasil disimpan!');
        } catch (\Throwable $th) {
            return redirect('admin/bengkel')->with('error', 'Data gagal disimpan!');
        }
    }

    public function bengkelDelete(Request $request)
    {
        try {

            $data = $this->Admin->bengkelById($request->id);
            $image_path = public_path('assets/backend/images/bengkel/'.$data->gambar);
            if(File::exists($image_path)) {
                File::delete($image_path);
            }
            DB::table('bengkel')->where('id', $data->id)->delete();

            return redirect('admin/bengkel')->with('success', 'Data berhasil disimpan!');
        } catch (\Throwable $th) {
            return redirect('admin/bengkel')->with('error', 'Data gagal disimpan!');
        }
    }
    public function administrator()
    {
        $data['data'] = $this->Admin->administrator();
        return view('backend/pages/admin', $data);
    }
    public function pengguna()
    {
        $data['data'] = $this->Admin->pengguna();
        return view('backend/pages/pengguna', $data);
    }
}

<?php

namespace App\Imports;

use App\Models\Admin;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;

class PenerimaImport implements ToModel
{
    private $jenis;
    private $kate;
    private $kec;
    private $kel;
    private $tahun;

public function __construct($jenis, $kate, $kec, $kel,$tahun)
{
    $this->jenis = $jenis;
    $this->kate = $kate;
    $this->kec = $kec;
    $this->kel = $kel;
    $this->tahun = $tahun;
}
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        if($this->kate == '4'){
            // print_r($this->jenis);die;
            return new Admin([
                'kategori_id'       => $this->kate,
                'id_p3ke'       => $row[0],
                'nik'           => $row[7],
                'nama'          => $row[6],
                'kota'          => $row[1],
                'kec_id'        => $this->kec,
                'kel_id'        => $this->kel,
                'alamat'       => $row[4],
                'rt'            => $row[5],
                'qrcode'       => $row[8],
                'tahun'       => $this->tahun,
                'jenis_dana'       => $this->jenis
            ]);
        }else{
            // print_r($row[5]);die;
            return new Admin([
                'kategori_id'   => $this->kate,
                'id_p3ke'       => '',
                'no_kk'         => $row[6],
                'nik'           => $row[5],
                'nama'          => $row[4],
                'kota'          => 'KOTA DUMAI',
                'kec_id'        => $this->kec,
                'kel_id'        => $this->kel,
                'alamat'       => $row[2],
                'rt'            => $row[3],
                'qrcode'       => $row[7],
                'tahun'       => $this->tahun,
                'jenis_dana'       => $this->jenis
            ]);
        }
        
    }
}

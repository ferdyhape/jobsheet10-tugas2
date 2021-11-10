<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use resources\views;
use Illuminate\Support\Facades\DB;
use App\Models\matakuliah;
use App\Models\mahasiswa;
use App\Models\mahasiswa_matakuliah;

class KRSController extends Controller
{
    // public function index()
    // {
    //     $matakuliah = Matakuliah::all();
    //     return view('mahasiswas.cekKRS', ['matkul' => $matakuliah]);
    // }
    public function index()
    {
        $mahasiswa_matkul = mahasiswa_matakuliah::all();
        // return $mahasiswa_matkul;
        return view('mahasiswas.cekKRS', compact($mahasiswa_matkul));
        // return view('mahasiswas.cekKRS', ['mahasiswa_matkul' => $mahasiswa_matkul]);
    }
}

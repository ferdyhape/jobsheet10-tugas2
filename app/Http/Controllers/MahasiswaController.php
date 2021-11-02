<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use resources\views;
use Illuminate\Support\Facades\DB;
use App\Models\Kelas;

class MahasiswaController extends Controller
{
    public function index()
    {
        //fungsi eloquent menampilkan data menggunakan pagination
        //$mahasiswas = Mahasiswa::all(); // Mengambil semua isi tabel
        //$posts = Mahasiswa::orderBy('Nim', 'desc')->paginate(5);
        //return view('mahasiswas.index', compact('mahasiswas'));
        //with('i', (request()->input('page', 1) - 1) * 5);

        $mahasiswa = Mahasiswa::with('kelas')->get(); // Mengambil semua isi tabel
        $paginate = Mahasiswa::orderBy('nim', 'asc')->paginate(3);
        return view('mahasiswas.index', ['mahasiswa' => $mahasiswa, 'paginate' => $paginate]);
        

        // mengambil data dari table mahasiswa
        //$mahasiswas = DB::table('mahasiswa')->paginate(5);
        //return view('mahasiswas.index', compact('mahasiswas'));
    }

    public function create()
    {
        //return view('mahasiswas.create');
        $kelas = Kelas::all();//mendapatkan data dari tabel kelas
        return view('mahasiswas.create', ['kelas' => $kelas]);
    }

    public function store(Request $request)
    {
        //melakukan validasi data
        $request->validate([
            'Nim' => 'required',
            'Nama' => 'required',
            'Kelas' => 'required',
            'Jurusan' => 'required',
            'No_Handphone' => 'required',
            'Email' => 'required',
            'Tanggal_Lahir' => 'required',
        ]);
        //fungsi eloquent untuk menambah data
        //Mahasiswa::create($request->all());
        $mahasiswa = new Mahasiswa;
        $mahasiswa->nim = $request->get('Nim');
        $mahasiswa->nama = $request->get('Nama');
        $mahasiswa->jurusan = $request->get('Jurusan');
        $mahasiswa->No_Handphone = $request->get('No_Handphone');
        $mahasiswa->Email = $request->get('Email');
        $mahasiswa->Tanggal_Lahir = $request->get('Tanggal_Lahir');
        $mahasiswa->save();

        $kelas = new Kelas;
        $kelas->id = $request->get('Kelas');

        //fungsi eloquent untuk menambah data dengan relasi belongsTo
        $mahasiswa->kelas()->associate($kelas);
        $mahasiswa->save();
        
        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('mahasiswas.index')
        ->with('success', 'Mahasiswa Berhasil Ditambahkan');
       
    }

    public function show($Nim)
    {
        //menampilkan detail data dengan menemukan/berdasarkan Nim Mahasiswa
        //$Mahasiswa = Mahasiswa::find($Nim);
        //return view('mahasiswas.detail', compact('Mahasiswa'));

        $mahasiswa = Mahasiswa::with('kelas')->where('nim', $Nim)->first();
        return view('mahasiswas.detail', ['Mahasiswa' => $mahasiswa]);

    }

    public function edit($Nim)
    {
        //menampilkan detail data dengan menemukan berdasarkan Nim Mahasiswa untuk diedit
        //$Mahasiswa = Mahasiswa::find($Nim);
        //return view('mahasiswas.edit', compact('Mahasiswa'));

        $Mahasiswa = Mahasiswa::with('kelas')->where('nim', $Nim)->first();
        $kelas - Kelas::all(); //mendapatkan data dari tabel kelas
        return view('mahasiswas.edit', compact('mahasiswa', 'kelas'));
    }

    public function update(Request $request, $id)
    {
       //melakukan validasi data
       $request->validate([
        'Nim' => 'required',
        'Nama' => 'required',
        'Kelas' => 'required',
        'Jurusan' => 'required',
        'No_Handphone' => 'required',
        'Email' => 'required',
        'Tanggal_Lahir' => 'required',
        ]);
        //fungsi eloquent untuk menambah data
        //Mahasiswa::create($request->all());
        $mahasiswa = Mahasiswa::with('kelas')->where('nim', $Nim)->first();
        $mahasiswa->nim = $request->get('Nim');
        $mahasiswa->nama = $request->get('Nama');
        $mahasiswa->jurusan = $request->get('Jurusan');
        $mahasiswa->No_Handphone = $request->get('No_Handphone');
        $mahasiswa->Email = $request->get('Email');
        $mahasiswa->Tanggal_Lahir = $request->get('Tanggal_Lahir');
        $mahasiswa->save();

        $kelas = new Kelas;
        $kelas->id = $request->get('Kelas');

        //fungsi eloquent untuk menambah data dengan relasi belongsTo
        $mahasiswa->kelas()->associate($kelas);
        $mahasiswa->save();
        
        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('mahasiswas.index')
        ->with('success', 'Mahasiswa Berhasil Diupdate');


    }

    public function destroy($Nim)
    {
        //jika data berhasil diupdate, akan kembali ke halaman utama
        return redirect()->route('mahasiswas.index')
        ->with('success', 'Mahasiswa Berhasil Diupdate');
    }
    public function search(Request $request)
        {
            // menangkap data dari user
            $keyword = $request->seacrh;
            // melakukan pencarian data
            $mahasiswa = Mahasiswa::where('nama', 'like', '%'.$keyword.'%')->paginate(5);
            // mengirim data ke view index
            return view('mahasiswas.index', compact('mahasiswas'));
        }
}

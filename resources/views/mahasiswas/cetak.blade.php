@extends('mahasiswas.layout')
<head>
    <title>Cetak Daftar Mahasiswa</title>
</head>
@section('content')
    <center style="margin-top: 50px; margin-bottom: 50px">MAHASISWA JURUSAN TEKNOLOGI INFORMASI</center>
        <table class="table table-bordered">
            <tr>
                <th>Nim</th>
                <th>Nama</th>
                <th>Kelas</th>
                <th>Jurusan</th>
            </tr>
            @foreach ($mahasiswa as $mhs)
                <tr>
                    <td>{{ $mhs->Nim }}</td>
                    <td>{{ $mhs->Nama }}</td>
                    <td>{{ $mhs->Kelas->nama_kelas }}</td>
                    <td>{{ $mhs->Jurusan }}</td>
                @endforeach
            </tr>
        </table>
    </div>
@endsection
@extends('mahasiswas.layout')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left mt-2">
                <h2>JURUSAN TEKNOLOGI INFORMASI-POLITEKNIK NEGERI MALANG</h2>
            </div>
            <div class="float-right my-2">
                <a class="btn btn-success" href="{{ route('mahasiswas.create') }}"> Input Mahasiswa</a>
            </div>
        </div>
    </div>
 
 @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
 @endif
    <form action="{{ route('search') }}" method="GET">
        <input type="text" name="search" placeholder="Cari Mahasiswa .." value="{{ old('search') }}">
        <input type="submit" value="cari">
    </form>
    <table class="table table-bordered">
        <tr>
            <th>Nim</th>
            <th>Nama</th>
            <th>Kelas</th>
            <th>Jurusan</th>
            <th>No_Handphone</th>
            <th>Email</th>
            <th>Tanggal_Lahir</th>
            <th width="280px">Action</th>
        </tr>
    @foreach ($paginate as $mhs)
        <tr>
        
            <td>{{ $mhs->Nim }}</td>
            <td>{{ $mhs->Nama }}</td>
            <td>{{ $mhs->Kelas->nama_kelas }}</td>
            <td>{{ $mhs->Jurusan }}</td>
            <td>{{ $mhs->No_Handphone }}</td>
            <td>{{ $mhs->Email }}</td>
            <td>{{ $mhs->Tanggal_Lahir }}</td>
            <td>
                <form action="{{ route('mahasiswas.destroy',$Mahasiswa->Nim) }}" method="POST">
                
                    <a class="btn btn-info" href="{{ route('mahasiswas.show',$Mahasiswa->Nim) }}">Show</a>
                    <a class="btn btn-primary" href="{{ route('mahasiswas.edit',$Mahasiswa->Nim) }}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" href="{{ route('mahasiswas.destroy',$Mahasiswa->Nim) }}">Delete</button>
                </form>
            </td>
        </tr>
    @endforeach
    </table>
    
    
@endsection


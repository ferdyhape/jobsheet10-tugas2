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
            <div class="float-right my-2">
                <a class="btn btn-primary" href="mahasiswa/cetak_mahasiswa">Cetak</a>
            </div>
            
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <table class="table table-bordered">
        <tr>
            <th>Nim</th>
            <th>Nama</th>
            <th>Foto</th>
            <th>Kelas</th>
            <th>Jurusan</th>
            {{--  <th>No_Handphone</th>
            <th>Email</th>
            <th>Tanggal_Lahir</th>  --}}
            <th width="280px">Action</th>
        </tr>

        <form action="{{ route('search') }}" method="GET">
            <input type="text" name="search" placeholder="Cari Mahasiswa .." value="{{ old('search') }}">
            <input type="submit" value="cari">
            </form>

        @foreach ($mahasiswas as $Mahasiswa)
        <tr>
            
            <td>{{ $Mahasiswa->Nim }}</td>
            <td>{{ $Mahasiswa->Nama }}</td>
            <td>
                <img width="80px" src="{{asset('storage/'.$Mahasiswa->Foto)}}">
            </td>
            <td>{{ $Mahasiswa->kelas->nama_kelas }}</td>
            <td>{{ $Mahasiswa->Jurusan }}</td>
            {{--  <td>{{ $Mahasiswa->No_Handphone }}</td>
            <td>{{ $Mahasiswa->Email }}</td>
            <td>{{ $Mahasiswa->Tanggal_Lahir }}</td>  --}}
            <td>
        
            
            <form action="{{ route('mahasiswas.destroy',$Mahasiswa->Nim) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('mahasiswas.show',$Mahasiswa->Nim) }}">Show</a>

                    <a class="btn btn-primary" href="{{ route('mahasiswas.edit',$Mahasiswa->Nim) }}">Edit</a>

                    
                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger">Delete</button>
                    <button type="submit" class="btn btn-warning">Nilai</button>
            </form>
            
            </td>
            
        @endforeach
        </tr>
    </table>
            Halaman : {{ $mahasiswas->currentPage() }} <br/>
            Jumlah Data : {{ $mahasiswas->total() }} <br/>
            Data Per Halaman : {{ $mahasiswas->perPage() }} <br/>
            <br/>
            {{ $mahasiswas->links() }}
@endsection


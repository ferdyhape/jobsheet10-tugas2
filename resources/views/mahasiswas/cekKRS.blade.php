<ul>
    @foreach($mahasiswa_matkul as $mm)
		<li>{{ "Id matkul: ". $mm->id}}</li>
    <li>{{ "Nama Matkul: " . $mm->mahasiswa_id }}</li>
    @endforeach
</ul>
{{--  
@foreach($mahasiswa as $mk)
		{{ "Id matkul: ". $mk->Nama . ' Nama Matkul : ' . $mk->Jurusan }}
@endforeach  --}}
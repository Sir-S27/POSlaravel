<h1>Ini Halaman Kategori</h1><br>
@if (session('success'))
    <h4 style="color: green"> {{ session('success') }}
    </h4>
@endif
@if (session('error'))
    <h4 style="color: red"> {{ session('error') }}
    </h4>
@endif
<a href="{{ route('kategori.create') }}">Tambah Kategori</a>

<br><br>
<form method="GET" action="{{ route('kategori.index') }}">
    <input type="text" name="nama_kategori" value="{{ request('nama_kategori') }}">
    <button>Cari</button>
</form>
<table border="1">
    <tr>
        <th>No</th>
        <th>Nama Kategori</th>
        <th>Aksi</th>
    </tr>
    <tbody>
        @foreach ($kategori as $k)
            <tr>
                <th>{{ $loop->iteration }}</th>
                <th>{{ $k->nama_kategori }}</th>
                <th>
                    <a href="{{ route('kategori.edit', ['id' => $k->id]) }}">Edit</a> |
                    <form action="{{ route('kategori.destroy', ['id' => $k->id]) }}" method="POST" style="display: inline;"
                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus kategori ini?')">
                        @csrf
                        @method('DELETE')
                        
                        <button type="submit" style="background: none; border: none; cursor: pointer">Hapus</button>
                    </form>
                </th>
            </tr>
        @endforeach
    </tbody>
</table>
{{$kategori->links()}}
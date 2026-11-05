<h1>Ini Halaman Produk</h1> <br>
<a href="{{ route('produk.create') }}">Tambah stok</a>

@if (session('success'))
    <h4 style="color: green">{{ session('success') }}</h4>
@endif
@if (session('error'))
    <h4 style="color: red">{{ session('error') }}</h4>
@endif
<form method="GET" action="{{ route('produk.index') }}">
    <input type="text" name="nama_produk" value="{{ request('nama_produk') }}">
    <select name="id_kategori" id="">
        <option value="">-- Pilih Kategori --</option>
        @foreach ($kategori as $k)
            <option value="{{ $k->id }}" {{ request('id_kategori') == $k->id ? 'selected' : '' }}>
                {{ $k->nama_kategori }}
            </option>
        @endforeach
    </select>
    <button>Cari</button>
</form>
<br><br>
<table border="1" cellpadding="8" cellspacing="0">
    <tr>
        <th>No</th>
        <th>Kode</th>
        <th>Nama Produk</th>
        <th>Kategori</th>
        <th>Harga</th>
        <th>Stok</th>
        <th>Aksi</th>
    </tr>
    <tbody>
        @foreach ($produk as $p)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $p->kode_produk }}</td>
                <td>{{ $p->nama_produk }}</td>
                <td>{{ $p->nama_kategori ?? '-' }}</td>
                <td>{{ $p->harga }}</td>
                <td>{{ $p->stok }}</td>
                <td>
                    <a href="{{ route('produk.edit', ['id' => $p->id]) }}">Edit</a> |
                    <form action="{{ route('produk.destroy', ['id' => $p->id]) }}" method="POST"
                        style="display: inline;"
                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" style="background: none; border: none; cursor: pointer">Hapus</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
{{$produk->links()}}
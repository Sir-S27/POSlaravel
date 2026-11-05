<h1>Ini Halaman Suplier</h1><br>
{{-- <a href="{{route('produk.edit', ['id->10'])}}">halaman edit</a> --}}
<a href="{{ route('suplier.create') }}">Tambah Suplier</a>

<br><br>
<table border="1" cellpadding="8" cellspacing="0">
    <tr>
        <th>No</th>
        <th>Kode</th>
        <th>Nama Suplier</th>
        <th>Alamat</th>
        <th>No Telepon</th>
    </tr>
    <tbody>
        <tr>
            <th>1</th>
            <th>SUP001</th>
            <th>PT. Jaya Makmur</th>
            <th>Jl. Raya No. 123</th>
            <th>08123456789</th>
            <th>
                <a href="{{ route('suplier.edit', ['id' => 1]) }}">Edit</a> |
                <a href="">Hapus</a>
            </th>
        </tr>
    </tbody>

</table>

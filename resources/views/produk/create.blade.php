<h1>Tambah Produk</h1>

<form method="POST" action="{{ route('produk.store') }}">
    @csrf
    <table>
        <tr>
            <td>Kode</td>
            <td><input type="text" name="kode_produk" value="{{ old('kode_produk') }}"></td>
        </tr>
        <tr>
            <td>Nama Produk</td>
            <td><input type="text" name="nama_produk" value="{{ old('nama_produk') }}"></td>
        </tr>
        <tr>
            <td>Harga</td>
            <td><input type="number" name="harga" value="{{ old('harga') }}"></td>
        </tr>
        <tr>
            <td>Stok</td>
            <td><input type="number" name="stok" value="{{ old('stok') }}"></td>
        </tr>
        <tr>
            <td>Kategori</td>
            <td>
                <select name="id_kategori">
                    <option value="">-- Pilih Kategori --</option>
                    @foreach ($kategori as $k)
                        <option value="{{ $k->id }}" {{ old('id_kategori') == $k->id ? 'selected' : '' }}>
                            {{ $k->nama_kategori }}
                        </option>
                    @endforeach
                </select>
            </td>
        </tr>
    </table>
    <div class="form-group">
        <button type="submit">Simpan</button>
        <button type="reset">Reset</button>
    </div>
</form>
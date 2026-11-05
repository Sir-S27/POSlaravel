<h1>Edit Produk</h1>

<form method="POST" action="{{ route('produk.update', ['id' => $produk->id]) }}">
    @csrf
    @method('PUT')
    <table>
        <tr>
            <td>Kode</td>
            <td><input type="text" name="kode_produk" value="{{ $produk->kode_produk }}"></td>
        </tr>
        <tr>
            <td>Nama Produk</td>
            <td><input type="text" name="nama_produk" value="{{ $produk->nama_produk }}"></td>
        </tr>
        <tr>
            <td>Harga</td>
            <td><input type="number" name="harga" value="{{ $produk->harga }}"></td>
        </tr>
        <tr>
            <td>Stok</td>
            <td><input type="number" name="stok" value="{{ $produk->stok }}"></td>
        </tr>
        <tr>
            <td>Kategori</td>
            <td>
                <select name="id_kategori">
                    <option value="">-- Pilih Kategori --</option>
                    @foreach ($kategori as $k)
                        <option value="{{ $k->id }}" {{ $produk->id_kategori == $k->id ? 'selected' : '' }}>
                            {{ $k->nama_kategori }}
                        </option>
                    @endforeach
                </select>
            </td>
        </tr>
    </table>
    <div class="form-group">
        <button type="submit">Update</button>
        <a href="{{ route('produk.index') }}">Kembali</a>
    </div>
</form>
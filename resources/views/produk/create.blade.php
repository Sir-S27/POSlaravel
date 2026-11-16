<h1>Tambah Produk</h1>

<form method="POST" action="{{ route('produk.store') }}">
    @csrf
    <table>
        <tr>
            <td>Kode</td>
            <td><input type="text" name="kode_produk" required value="{{old('kode_produk')}}">
            @error('kode_produk')
                <div class="error" style="color: red;">{{ $message }}</div>
            @enderror
        </td>
        </tr>
        <tr>
            <td>Nama Produk</td>
            <td><input type="text" name="nama_produk" required value="{{old('nama_produk')}}">
            @error('nama_produk')
                <div class="error" style="color: red;">{{ $message }}</div>
            @enderror
        </td>
        </tr>
        <tr>
            <td>Harga</td>
            <td><input type="number" name="harga" required value="{{old('harga')}}">
            @error('harga')
                <div class="error" style="color: red;">{{ $message }}</div>
            @enderror
        </td>
        </tr>
        <tr>
            <td>Stok</td>
            <td><input type="number" name="stok" required value="{{old('stok')}}">
            @error('stok')
                <div class="error" style="color: red;">{{ $message }}</div>
            @enderror
        </td>
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
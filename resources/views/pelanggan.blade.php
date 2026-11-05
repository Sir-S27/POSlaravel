<h1>Ini Halaman Pelanggan</h1>
{{ route('produk.edit', ['id' => 1]) }}" onclick="return confirm('Apakah Anda yakin ingin menghapus produk ini?')"




<form>
    <table cellpadding="6">
        <tr>
            <td>Kode</td>
            <td><input type="text" name="kode" placeholder="PRD-004"></td>
        </tr>
        <tr>
            <td>Nama Produk</td>
            <td><input type="text" name="nama"></td>
        </tr>
        <tr>
            <td>Harga</td>
            <td><input type="number" name="harga"></td>
        </tr>
        <tr>
            <td></td>
            <td>
                <button type="submit">Simpan</button>
                <a href="{{ route('produk.index') }}">Kembali</a>
            </td>
        </tr>
    </table>
</form>
<h1>Tambah Kategori</h1>
<form method="POST" action="{{ route('kategori.store') }}">
    <table>
        <tr>
            <td>Nama Kategori</td>
            <td><input type="text" name="nama_kategori"></td>
        </tr>
    </table>
    <div class="form-group">
        <button type="submit">Simpan</button>
        <button type="reset">Reset</button>
    </div>
</form>
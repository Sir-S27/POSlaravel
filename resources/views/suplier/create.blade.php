<h1>Tambah Suplier</h1>
<form method="POST" action="{{ route('suplier.store') }}">
    <table>
        <tr>
            <td>Kode</td>
            <td><input type="text" name="kode_suplier"></td>
        </tr>
        <tr>
            <td>Nama Suplier</td>
            <td><input type="text" name="nama_suplier"></td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td><input type="text" name="alamat"></td>
        </tr>
        <tr>
            <td>No Telepon</td>
            <td><input type="number" name="telepon"></td>
        </tr>
    </table>
    <div class="form-group">
        <button type="submit">Simpan</button>
        <button type="reset">Reset</button>
    </div>
</form>
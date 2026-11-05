<h1>Edit Kategori</h1>

<form method="POST" action="{{ route('kategori.update', ['id' => $kategori->id]) }}">
    @csrf 
    @method('PUT')
    <table>
        <tr>
            <td>Nama Kategori</td>
            <td><input type="text" name="nama_kategori" value="{{ $kategori->nama_kategori }}"></td>
        </tr>
    </table>
    <div class="form-group">
        <button type="submit">Simpan</button>
        <button type="reset">Reset</button>
    </div>
</form>
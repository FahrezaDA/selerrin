<div class="modal fade" id="add-produk" tabindex="-1" role="dialog" aria-labelledby="editUserModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="editUserModalLabel">Tambah Barang</h5>
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <!-- Form for editing user data -->
           <!-- Form for editing user data -->
           <form action="{{ route('add-produk') }}" class="needs-validation" novalidate="" method="POST" enctype="multipart/form-data">
            @csrf
            @method('POST')
    <div class="form-group">
        <label for="edit-name">Nama</label>
        <input type="text" name="nama_produk" class="form-control"  placeholder="Enter name">
    </div>
    <div class="form-group">
        <label for="edit-email">Foto</label>
        <input type="file" name="foto_produk" class="form-control"  placeholder="Enter email">
    </div>
    <div class="form-group">
        <label for="edit-area">Harga</label>
        <input type="number" name="harga_produk" class="form-control"  placeholder="Masukkan Harga">
    </div>
    <div class="form-group">
        <label for="edit-phone">Stok Produk</label>
        <input type="number" name="stok_produk" class="form-control"  placeholder="Enter Stok Produk">
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Tambah</button>
    </div>
</form>

        </div>

    </div>
</div>
</div>

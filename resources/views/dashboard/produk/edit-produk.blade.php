<!-- Modal Edit Data -->


<script>
    document.querySelectorAll('.edit-button').forEach(button => {
    button.addEventListener('click', function() {
        // Mendapatkan data dari atribut data pada tombol edit
        const id_produk = this.getAttribute('data-id_produk');
        const nama = this.getAttribute('data-nama');
        const foto = this.getAttribute('data-foto');
        const harga = this.getAttribute('data-harga');
        const stok = this.getAttribute('data-stok');

        // Mengisi nilai-nilai tersebut ke dalam form modal
        document.getElementById('edit-user-form').setAttribute('action', '/update-produk/' + id_produk); // Sesuaikan URL action form dengan URL Anda
        document.getElementById('edit-nama').value = nama;
        // document.getElementById('edit-foto').value = foto;
        document.getElementById('edit-harga').value = harga; // Mengisi nilai harga
        document.getElementById('edit-stok').value = stok; // Mengisi nilai stok

        // Menampilkan modal
        const modal = new bootstrap.Modal(document.getElementById('edit-produk'));
        modal.show();
    });
});

</script>




<div class="modal fade" id="edit-produk" tabindex="-1" role="dialog" aria-labelledby="editUserModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="editUserModalLabel">Edit Produk</h5>
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <!-- Form for editing user data -->
            @if ($data->count() == 0)
            <p>data kosong</p>
        @else
            <form action="{{route('update-produk',$data->id_produk)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="edit-nama">Name</label>
                    <input type="text" name="nama_produk"  class="form-control" id="edit-nama" placeholder="Enter name">
                </div>
                <div class="form-group">
                    <label for="edit-foto">Foto</label>
                    <input type="file" name="foto_produk" class="form-control" id="edit-foto" aria-describedby="emailHelp" placeholder="Enter email">

                </div>
                <div class="form-group">
                    <label for="edit-harga">Harga</label>
                    <input type="text" name="harga_produk" class="form-control" id="edit-harga" placeholder="Enter harga">
                </div>
                <div class="form-group">
                    <label for="edit-stok">Stok</label>
                    <input type="text" name="stok_produk" class="form-control" id="edit-stok" placeholder="Enter stok barang">
                </div>



                <!-- Tombol Submit untuk mengirimkan formulir -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
            @endif
        </div>
    </div>
</div>
</div>

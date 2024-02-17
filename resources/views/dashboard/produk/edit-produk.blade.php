<!-- Modal Edit Data -->



<script>
    $(document).ready(function() {
        $('.edit-button').on('click', function(event) {
            var id_produk = $(this).data('id_produk');
            var nama_produk = $(this).data('nama_produk');
            var harga_produk = $(this).data('harga_produk');
            var foto_produk = $(this).data('foto_produk');
            var stok_produk = $(this).data('stok_produk');

            var modal = $('#edit-produk');
            modal.find('.modal-body #id_produk').val(id_produk);
            modal.find('.modal-body #nama').val(nama_produk);
            modal.find('.modal-body #harga').val(harga_produk);
            // modal.find('.modal-body #foto_produk').val(foto_produk); // Ini tidak bisa di-set secara langsung karena input tipe file
            modal.find('.modal-body #stok').val(stok_produk);

            modal.modal('show');
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
            <form  action="{{route('update-produk',$data->id_produk)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="edit-nama">Name</label>
                    <input type="text" name="nama_produk"  class="form-control" id="nama" placeholder="Enter name">
                </div>
                <div class="form-group">
                    <label for="edit-foto">Foto</label>
                    <input type="file" name="foto_produk" class="form-control" id="foto" aria-describedby="emailHelp" placeholder="Enter email">

                </div>
                <div class="form-group">
                    <label for="edit-harga">Harga</label>
                    <input type="text" name="harga_produk" class="form-control" id="harga" placeholder="Enter harga">
                </div>
                <div class="form-group">
                    <label for="edit-stok">Stok</label>
                    <input type="text" name="stok_produk" class="form-control" id="stok" placeholder="Enter stok barang">
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

<div class="modal fade" id="add-produk-to-admin" tabindex="-1" role="dialog" aria-labelledby="editUserModalLabel"
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
           <form action="{{ route('kirim-reseller') }}" class="needs-validation" novalidate="" method="POST" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <div class="form-group">
                <label for="edit-area">Pilih Produk untuk Admin</label>
                <select name="id_user[]" class="form-control">
                    @foreach($dataUser as $user)
                    @if($user->kelas == 'admin')
                        <option value="{{ $user->id_user }}">{{ $user->name}}</option>
                    @endif
                @endforeach

                </select>
            </div>

    <div class="form-group">
        <label for="edit-area">Pilih Produk</label>
        <select name="id_produk[]" class="form-control">
            @foreach($dataProduk as $product)
                <option value="{{ $product->id_produk}}">{{ $product->nama_produk}}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="edit-email">Jumlah Produk</label>
        <input type="text" name="jumlah_produk[]" class="form-control"  placeholder="Jumlah Produk">
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<div class="modal fade" id="add-user" tabindex="-1" role="dialog" aria-labelledby="editUserModalLabel"
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
    <div class="form-group">
        <label for="edit-name">Name</label>
        <input type="text" name="name" class="form-control" id="edit-name" placeholder="Enter name">
    </div>
    <div class="form-group">
        <label for="edit-email">Email address</label>
        <input type="email" name="email" class="form-control" id="edit-email" aria-describedby="emailHelp" placeholder="Enter email">
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
    <div class="form-group">
        <label for="edit-area">Area</label>
        <input type="text" name="area" class="form-control" id="edit-area" placeholder="Enter area">
    </div>
    <div class="form-group">
        <label for="edit-phone">Phone Number</label>
        <input type="tel" name="no_hp" class="form-control" id="edit-phone" placeholder="Enter phone number">
    </div>
    <div class="form-group">
        <label for="edit-status">Status</label>
        <select id="kelas" class="form-control @error('kelas') is-invalid @enderror" name="kelas" required>
            @foreach(\App\Models\User::getKelasOptions('kelas') as $kelasOption)
                <option value="{{ $kelasOption }}" {{ old('kelas') == $kelasOption ? 'selected' : '' }}>
                    {{ ucfirst($kelasOption) }}
                </option>
            @endforeach
        </select>
    </div>
</form>

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
        </div>
    </div>
</div>
</div>

<!-- jQuery -->


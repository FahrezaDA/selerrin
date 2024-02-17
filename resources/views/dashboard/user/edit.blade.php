

<script>
    $(document).ready(function() {
        $('.edit-button').on('click', function(event) {
            var id_user = $(this).data('id_user');
            var name = $(this).data('name');
            var email = $(this).data('email');
            var foto = $(this).data('foto');
            var area = $(this).data('area');
            var no_hp = $(this).data('no_hp');
            var kelas = $(this).data('kelas');

            var modal = $('#edit-user');
            modal.find('.modal-body #id_user').val(id_user);
            modal.find('.modal-body #name').val(name);
            modal.find('.modal-body #email').val(email);
            modal.find('.modal-body #foto').val(foto);
            modal.find('.modal-body #area').val(area);
            modal.find('.modal-body #no_hp').val(no_hp);
            // modal.find('.modal-body #kelas').val(kelas); // Tidak perlu diatur, karena Anda menggunakan loop di bawah ini untuk mengatur opsi kelas

            // Atur opsi kelas yang dipilih
            modal.find('.modal-body #kelas option').each(function() {
                if ($(this).val() == kelas) {
                    $(this).prop('selected', true);
                }
            });

            // Tampilkan modal
            modal.modal('show');
        });
    });
</script>



<div class="modal fade center-modal" id="edit-user" tabindex="-1"  role="" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Kegiatan</h5>
                <button type="button"  data-backdrop="static" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Form for editing user data -->
                @if ($dataUser->count() == 0)
                    <p>data kosong</p>
                @else
                    <form id="edit-user-form" action="{{route('update-user',$data->id_user)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="edit-name">Name</label>
                            <input type="text" name="name" value="{{old('name')}}" class="form-control" id="name" placeholder="Enter name">
                        </div>
                        <div class="form-group">
                            <label for="edit-email">Email address</label>
                            <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">
                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                        </div>
                        <div class="form-group">
                            <label for="edit-area">Area</label>
                            <input type="text" name="area" class="form-control" id="area" placeholder="Enter area">
                        </div>
                        <div class="form-group">
                            <label for="edit-phone">Phone Number</label>
                            <input type="tel" name="no_hp" class="form-control" id="no_hp" placeholder="Enter phone number">
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


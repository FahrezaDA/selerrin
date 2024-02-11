<!-- Modal Edit Data -->


<script>
    document.querySelectorAll('.edit-button').forEach(button => {
        button.addEventListener('click', function() {
            // Mendapatkan data dari atribut data pada tombol edit
            const id_user = this.getAttribute('data-id_user');
            const name = this.getAttribute('data-name');
            const email = this.getAttribute('data-foto');
            const area = this.getAttribute('data-area');
            const no_hp = this.getAttribute('data-no_hp');
            const kelas = this.getAttribute('data-kelas');

            // Mengisi nilai-nilai tersebut ke dalam form modal
            document.getElementById('edit-user-form').setAttribute('action', '/update-user/' + id_user); // Sesuaikan URL action form dengan URL Anda
            document.getElementById('edit-name').value = name;
            document.getElementById('edit-email').value = email;
            document.getElementById('edit-area').value = area;
            document.getElementById('edit-no_hp').value = no_hp;

            // Memilih nilai kelas pada dropdown select
            const selectKelas = document.getElementById('kelas');
            for (let i = 0; i < selectKelas.options.length; i++) {
                if (selectKelas.options[i].value === kelas) {
                    selectKelas.selectedIndex = i;
                    break;
                }
            }

            // Menampilkan modal
            const modal = new bootstrap.Modal(document.getElementById('edit-user'));
            modal.show();
        });
    });
</script>



<div class="modal fade center-modal" id="edit-user" tabindex="-1"  aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                            <input type="text" name="name" value="{{old('name')}}" class="form-control" id="edit-name" placeholder="Enter name">
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
                            <input type="tel" name="no_hp" class="form-control" id="edit-no_hp" placeholder="Enter phone number">
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


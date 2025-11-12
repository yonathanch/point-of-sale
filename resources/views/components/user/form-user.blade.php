<div>
    <button type="button" class="btn {{ $id ? 'btn-warning' : 'btn-primary' }}" data-toggle="modal"
        data-target="#formUser{{ $id ?? '' }}">
        {{-- {{ $id ? 'Edit' : 'Tambah Produk' }} --}}
        @if ($id)
            <i class="far fa-edit"></i>
        @else
            Tambah User
        @endif
    </button>
    <div class="modal fade" id="formUser{{ $id ?? '' }}">
        <form action="{{ route('users.store') }}" method="POST">
            @csrf
            <input type="hidden" name="id" value="{{ $id ?? '' }}">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">{{ $id ? 'Form Edit User' : 'Form Tambah User' }}</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="email" name="email" id="email" class="form-control"
                                value="{{ $id ? $email : old('email') }}">
                        </div>
                        <div class="form-group">
                            <label for="">Nama</label>
                            <input type="text" name="name" id="name" class="form-control"
                                value="{{ $id ? $name : old('name') }}">
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
        </form>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
</div>

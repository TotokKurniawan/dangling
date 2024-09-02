@extends('admin.layout.app')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                        <h6>Tambah Mitra</h6>
                    </div>
                    <div class="card-body px-4 pt-4 pb-2">
                        <form action="" method="POST">
                            @csrf <!-- Tambahkan CSRF protection jika belum ada -->

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nama" class="form-label">Nama</label>
                                        <input type="text" class="form-control" id="nama" name="nama"
                                            placeholder="Masukkan nama" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nama" class="form-label">email</label>
                                        <input type="email" class="form-control" id="email" name="email"
                                            placeholder="Masukkan nama" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="perusahaan" class="form-label">Password</label>
                                        <input type="text" class="form-control" id="perusahaan" name="perusahaan"
                                            placeholder="Masukkan perusahaan" required>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        @include('admin.layout.footer')
    </div>
@endsection

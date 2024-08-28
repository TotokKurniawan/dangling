@extends('admin.layout.app')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                        <h6>Table Pedagang</h6>
                    </div>
                    <div class="card-body px-4">
                        <!-- Form Filter Laporan -->
                        <form action="" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="tglawal" class="form-label">Tanggal Awal</label>
                                    <input type="date" name="tglawal" id="tglawal" class="form-control">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="tglakhir" class="form-label">Tanggal Akhir</label>
                                    <input type="date" name="tglakhir" id="tglakhir" class="form-control">
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Cetak Laporan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('admin.layout.footer')
@endsection

@extends('layouts.admin')

@section('content')
    <div class="page-breadcrumb">
        <div class="row align-items-center">
            <div class="col-md-6 col-8 align-self-center">
                <h3 class="page-title mb-0 p-0">Input Paket</h3>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Input Paket</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <!-- Row -->
        <div class="row">
            <!-- Column -->
            <div class="col-12">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="card shadow">
                    <div class="card-body">
                        <form class="form-horizontal form-material mx-2" action="{{ route('tambah-paket') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label class="col-sm-12" for="SKPD">Nama SKPD</label>
                                <div class="col-sm-12 border-bottom">
                                    <select name="skpd_id" id="skpd_id"
                                        class="form-select shadow-none border-0 ps-0 form-control-line" required>
                                        <option value="">Pilih SKPD</option>
                                        @foreach ($skpd as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-12" for="tahun">Tahun</label>
                                <div class="col-sm-12 border-bottom">
                                    <select class="form-select shadow-none border-0 ps-0 form-control-line" name="tahun"
                                        value="{{ old('tahun') }}" required>
                                        <option selected>Pilih Tahun</option>
                                        <option>2021</option>
                                        <option>2022</option>
                                        <option>2023</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-12" for="pilih">Tender/Non Tender</label>
                                <div class="col-sm-12 border-bottom">
                                    <select class="form-select shadow-none border-0 ps-0 form-control-line" name="pilih"
                                        value="{{ old('pilih') }}" required>
                                        <option selected>Pilih</option>
                                        <option>Tender</option>
                                        <option>Non Tender</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12 mb-0" for="namaPaket">Nama Paket</label>
                                <div class="col-md-12">
                                    <input type="text" placeholder="Masukkan Nama Paket"
                                        class="form-control ps-0 form-control-line" name="namaPaket"
                                        value="{{ old('namaPaket') }}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12 mb-0" for="namaPenyedia">Nama Penyedia</label>
                                <div class="col-md-12">
                                    <input type="text" placeholder="Masukkan Nama Penyedia"
                                        class="form-control ps-0 form-control-line" name="namaPenyedia"
                                        value="{{ old('namaPenyedia') }}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12 mb-0" for="nomorKontrak">Nomor Kontrak</label>
                                <div class="col-md-12">
                                    <input type="text" placeholder="Masukkan Nomor Kontrak"
                                        class="form-control ps-0 form-control-line" name="nomorKontrak"
                                        value="{{ old('nomorKontrak') }}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12 mb-0" for="awalPelaksanaan">Awal Pelaksanaan</label>
                                <div class="col-md-12">
                                    <input type="date" placeholder="Masukkan Awal Pelaksanaan"
                                        class="form-control ps-0 form-control-line" name="awalPelaksanaan"
                                        value="{{ old('awalPelaksanaan') }}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12 mb-0" for="akhirPelaksanaan">Akhir Pelaksanaan</label>
                                <div class="col-md-12">
                                    <input type="date" placeholder="Masukkan Akhir Pelaksanaan"
                                        class="form-control ps-0 form-control-line" name="akhirPelaksanaan"
                                        value="{{ old('akhirPelaksanaan') }}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12 mb-0" for="paguAnggaran">Pagu Anggaran</label>
                                <div class="col-md-12">
                                    <input type="number" placeholder="Masukkan Pagu Anggaran"
                                        class="form-control ps-0 form-control-line" name="paguAnggaran"
                                        value="{{ old('paguAnggaran') }}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12 mb-0" for="nilaiKontrak">Nilai Kontrak</label>
                                <div class="col-md-12">
                                    <input type="number" placeholder="Masukkan Nilai Kontrak"
                                        class="form-control ps-0 form-control-line" name="nilaiKontrak"
                                        value="{{ old('nilaiKontrak') }}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12 mb-0" for="nilaiHps">Nilai HPS</label>
                                <div class="col-md-12">
                                    <input type="number" placeholder="Masukkan Nilai HPS"
                                        class="form-control ps-0 form-control-line" name="nilaiHps"
                                        value="{{ old('nilaiHps') }}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12 mb-0" for="efisiensi">Efisiensi</label>
                                <div class="col-md-12">
                                    <input type="number" placeholder="Masukkan Efisiensi"
                                        class="form-control ps-0 form-control-line" name="efisiensi"
                                        value="{{ old('efisiensi') }}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12 d-flex">
                                    <button class="btn btn-success mx-auto mx-md-0 text-white" type="submit">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Column -->
        </div>
        <!-- Row -->
        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right sidebar -->
        <!-- ============================================================== -->
        <!-- .right-sidebar -->
        <!-- ============================================================== -->
        <!-- End Right sidebar -->
        <!-- ============================================================== -->
    </div>
@endsection

@extends('layouts.admin')

@section('content')
    <div class="page-breadcrumb">
        <div class="row align-items-center">
            <div class="col-md-6 col-8 align-self-center">
                <h3 class="page-title mb-0 p-0">Edit Paket</h3>
                <h3 class="page-title mb-0 p-0">{{$item->skpd->name}}</h3>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{route('input-paket')}}">Laporan</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Paket</li>
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
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <div class="card shadow">
                    <div class="card-body">
                        <form class="form-horizontal form-material mx-2" action="{{route('edit-paket', $item->id)}}" method="POST">
                            @method('PUT')
                            @csrf
                            <div class="form-group">
                                <label class="col-sm-12" for="tahun">Tahun</label>
                                <div class="col-sm-12 border-bottom">
                                    <select class="form-select shadow-none border-0 ps-0 form-control-line" name="tahun" value="{{$item->tahun}}">
                                        <option selected>{{$item->tahun}}</option>
                                        <option>2021</option>
                                        <option>2022</option>
                                        <option>2023</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-12" for="pilih">Tender/Non Tender</label>
                                <div class="col-sm-12 border-bottom">
                                    <select class="form-select shadow-none border-0 ps-0 form-control-line" name="pilih" value="{{$item->pilih}}">
                                        <option selected>{{$item->pilih}}</option>
                                        <option>Tender</option>
                                        <option>Non Tender</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12 mb-0" for="namaPaket">Nama Paket</label>
                                <div class="col-md-12">
                                    <input type="text" placeholder="Masukkan Nama Paket"
                                        class="form-control ps-0 form-control-line" name="namaPaket" value="{{$item->namaPaket}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12 mb-0" for="namaPenyedia">Nama Penyedia</label>
                                <div class="col-md-12">
                                    <input type="text" placeholder="Masukkan Nama Penyedia"
                                        class="form-control ps-0 form-control-line" name="namaPenyedia" value="{{$item->namaPaket}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12 mb-0" for="paguAnggaran">Pagu Anggaran</label>
                                <div class="col-md-12">
                                    <input type="number" placeholder="Masukkan Pagu Anggaran"
                                        class="form-control ps-0 form-control-line" name="paguAnggaran" value="{{$item->paguAnggaran}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12 mb-0" for="nilaiKontrak">Nilai Kontrak</label>
                                <div class="col-md-12">
                                    <input type="number" placeholder="Masukkan Nilai Kontrak"
                                        class="form-control ps-0 form-control-line" name="nilaiKontrak" value="{{$item->nilaiKontrak}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12 mb-0" for="nilaiHps">Nilai HPS</label>
                                <div class="col-md-12">
                                    <input type="number" placeholder="Masukkan Nilai HPS"
                                        class="form-control ps-0 form-control-line" name="nilaiHps" value="{{$item->nilaiHps}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12 mb-0" for="efisiensi">Efisiensi</label>
                                <div class="col-md-12">
                                    <input type="number" placeholder="Masukkan Efisiensi"
                                        class="form-control ps-0 form-control-line" name="efisiensi" value="{{$item->efisiensi}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12 d-flex">
                                    <button class="btn btn-success mx-auto mx-md-0 text-white" type="submit">Edit</button>
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

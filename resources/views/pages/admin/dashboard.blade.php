@extends('layouts.admin')

@section('content')
    <!-- Page wrapper  -->
    <!-- ============================================================== -->

    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row align-items-center">
            <div class="col-md-6 col-8 align-self-center">
                <h3 class="page-title mb-0 p-0">Dashboard</h3>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- Table -->
        <!-- ============================================================== -->
        {{-- <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <h1 class="text-center">SELAMAT DATANG</h1>
                        <img src="{{ url('../backend/assets/images/logo-kab.png') }}" class="dark-logo mx-auto d-block"
                            height="250 px">
                        <h1 class="text-center"><b>SIMBAJA</b></h1>
                        <h2 class="text-center">SISTEM MONITORING PENGADAAN BARANG DAN JASA</h2>
                        <h2 class="text-center">KABUPATEN BANTAENG</h2>
                    </div>
                </div>
            </div>
        </div> --}}
        <div class="row">
            <!-- Column -->
            <div class="col-sm-3">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Total SKPD/OPD</h4>
                        <div class="text-end">
                            <h2 class="font-light mb-0">{{ $skpd }}</h2>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="col-sm-3">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Total Laporan 2021</h4>
                        <div class="text-end">
                            <h2 class="font-light mb-0">{{ $tahun_2021 }}</h2>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <div class="col-sm-3">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Total Laporan 2022</h4>
                        <div class="text-end">
                            <h2 class="font-light mb-0">{{ $tahun_2022 }}</h2>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <div class="col-sm-3">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Total Laporan 2023</h4>
                        <div class="text-end">
                            <h2 class="font-light mb-0">{{ $tahun_2023 }}</h2>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->

        </div>
        <!-- ============================================================== -->
        <!-- Table -->
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->

    <!-- ============================================================== -->
    <!-- End Page wrapper  -->
@endsection

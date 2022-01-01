@extends('layouts.admin')

@section('content')

    <div class="page-breadcrumb">
        <div class="row align-items-center">
            <div class="col-md-6 col-8 align-self-center">
                <h3 class="page-title mb-0 p-0">Laporan</h3>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Laporan</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">

        <!-- Table -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-12">
                <div class="card shadow">
                    <div class="card-body">
                        <div class="d-md-flex">
                            <h4 class="card-title col-md-10 mb-md-0 mb-3 align-self-center">PEMERINTAH KABUPATEN BANTAENG
                            </h4>
                            <div class="dropdown">
                                <button class="btn btn-info dropdown-toggle m-1" type="button" id="dropdownMenuButton"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Pilih Tahun
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item"
                                        href="{{ route('input-paket', ['date' => '2021']) }}">2021</a>
                                    <a class="dropdown-item"
                                        href="{{ route('input-paket', ['date' => '2022']) }}">2022</a>
                                    <a class="dropdown-item"
                                        href="{{ route('input-paket', ['date' => '2023']) }}">2023</a>
                                </div>
                            </div>
                            @if (Request::get('date'))
                                <a target="_blank" href="{{ route('skpd.print', ['date' => Request::get('date')]) }}"
                                    class="btn btn-warning btn-sm m-1"> <i class="fas fa-print"></i>Download</a>
                            @endif
                        </div>
                        <h4 class="card-title col-md-10 mb-md-0 mb-3 align-self-center">SEKRETARIAT DAERAH</h4>
                        <h4 class="card-title col-md-10 mb-md-0 mb-3 align-self-center">BAGIAN PENGADAAN BARANG DAN JASA
                        </h4>
                        <div class="table-responsive mt-5">
                            <table class="table stylish-table">
                                <thead>
                                    <tr>
                                        <th class="border-top-0">No</th>
                                        <th class="border-top-0">Nama SKPD/OPD</th>
                                        <th class="border-top-0">Jumlah Paket</th>
                                        <th class="border-top-0">Total Pagu Anggaran</th>
                                        <th class="border-top-0">Total Nilai Kontrak</th>
                                        <th class="border-top-0">Total Efisiensi</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (Request::get('date'))
                                        @foreach ($skpd as $key => $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->inputPakets->count() }}</td>
                                                <td>Rp.
                                                    {{ number_format($item->inputPakets->sum('paguAnggaran'), 0, ',', '.') }}
                                                </td>
                                                <td>Rp.
                                                    {{ number_format($item->inputPakets->sum('nilaiKontrak'), 0, ',', '.') }}
                                                </td>
                                                <td>Rp.
                                                    {{ number_format($item->inputPakets->sum('efisiensi'), 0, ',', '.') }}
                                                </td>
                                                <td>
                                                    <a href="{{ route('tampilkan-paket', ['id' => $item->id]) . '?tahun=' . Request::get('date') }}"
                                                        class="btn btn-primary btn-sm mr-1"> <i class="fas fa-eye"></i>
                                                    </a>
                                                    {{-- <a target="_blank" href="{{route('skpd.print',['date'=>Request::get('date')])}}" class="btn btn-info btn-sm"> <i class="fas fa-print"></i> </a> --}}
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <td colspan="7" class="text-center">
                                            Silahkan Pilih Tahun
                                        </td>
                                    @endif

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Table -->
@endsection

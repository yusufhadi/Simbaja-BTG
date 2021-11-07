@extends('layouts.admin')

@section('content')
    <div class="page-breadcrumb">
        <div class="row align-items-center">
            <div class="col-md-6 col-8 align-self-center">
                <h3 class="page-title mb-0 p-0">Laporan</h3>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{route('input-paket')}}">Laporan</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Detail</li>
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
                <div class="card">
                    <div class="card-body">
                        <div class="d-md-flex">
                            <h4 class="card-title col-md-10 mb-md-0 mb-3 align-self-center">PEMERINTAH KABUPATEN BANTAENG</h4>
                            <div class="dropdown">
                                <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  Pilih
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                  <a class="dropdown-item" href="{{route('tampilkan-paket',['id' => Request::segment(3), 'pilih' =>"tender"])}}">Tender</a>
                                  <a class="dropdown-item" href="{{route('tampilkan-paket',['id' => Request::segment(3),'pilih' =>"non tender"])}}">Non Tender</a>
                                </div>
                            </div>
                        </div>
                        <h4 class="card-title col-md-10 mb-md-0 mb-3 align-self-center">SEKRETARIAT DAERAH</h4>
                        <h4 class="card-title col-md-10 mb-md-0 mb-3 align-self-center">{{$title}}</h4>
                        <div class="table-responsive mt-5">
                            <table class="table stylish-table">
                                <thead>
                                    <tr>
                                        <th class="border-top-0">Nama Paket</th>
                                        <th class="border-top-0">Nama Penyedia</th>
                                        <th class="border-top-0">Tahun</th>
                                        <th class="border-top-0">Pagu Anggaran</th>
                                        <th class="border-top-0">Nilai Kontrak</th>
                                        <th class="border-top-0">Nilai HPS</th>
                                        <th class="border-top-0">Total Efisiensi</th>
                                        <th class="border-top-0">Mekanisme Pelaksanaan</th>
                                        <th class="border-top-0">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($items as $item)
                                        <tr>
                                            <td class="border-top-0">{{ $item->namaPaket }}</td>
                                            <td class="border-top-0">{{ $item->namaPenyedia }}</td>
                                            <td class="border-top-0">{{ $item->tahun }}</td>
                                            <td class="border-top-0">Rp.{{ number_format($item->paguAnggaran,0,',', '.')}}</td>
                                            <td class="border-top-0">Rp.{{number_format($item->nilaiKontrak,0,',', '.') }}</td>
                                            <td class="border-top-0">Rp.{{ number_format($item->nilaiHps,0,',', '.') }}</td>
                                            <td class="border-top-0">Rp.{{ number_format($item->efisiensi,0,',', '.') }}</td>
                                            <td class="border-top-0">{{ $item->pilih }}</td>
                                            <td class="border-top-0">
                                                @if (Auth::user()->role == 'admin')
                                                <a href="{{route('edit-paket', $item->id)}}" class="btn btn-warning btn-sm">
                                                    <i class="fa fa-pencil-alt"></i>
                                                </a>
                                                @endif
                                                {{-- {{ route('routeName', ['id'=>1]) }} --}}
                                                <a href="{{route('download-paket', $item->id)}}" class="btn btn-info btn-sm">
                                                    <i class="fas fa-print"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @empty
                                    <tr>
                                        <td colspan="10" class="text-center">
                                            Data Kosong
                                        </td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Table -->
    </div>
@endsection
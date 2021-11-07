@extends('layouts.admin')

@section('content')
    
    <div class="page-breadcrumb">
        <div class="row align-items-center">
            <div class="col-md-6 col-8 align-self-center">
                <h3 class="page-title mb-0 p-0">Daftar SKPD</h3>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Daftar SKPD</li>
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
                        <h4 class="card-title col-md-10 mb-md-0 mb-3 align-self-center">DAFTAR SKPD</h4>
                            <a href="{{route('skpd.create')}}" class="btn btn-info" >
                              Tambahkan SKPD
                            </a>
                    </div>
                    <div class="table-responsive mt-5">
                        <table class="table stylish-table">
                            <thead>
                                <tr>
                                    <th class="border-top-0">No</th>
                                    <th class="border-top-0">Nama SKPD/OPD</th>
                                    <th class="border-top-0">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($skpd as $item)
                                <tr>
                                    {{-- <td colspan="6" class="text-center">
                                        Silahkan Pilih Tahun
                                    </td> --}}
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$item->name}}</td>
                                        <td>
                                            <a href="#" class="btn btn-warning btn-sm">
                                                    <i class="fa fa-pencil-alt"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
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

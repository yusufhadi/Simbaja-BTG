@extends('layouts.admin')

@section('content')
    <div class="page-breadcrumb">
        <div class="row align-items-center">
            <div class="col-md-6 col-8 align-self-center">
                <h3 class="page-title mb-0 p-0">Input Paket</h3>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
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
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <div class="card shadow">
                    <div class="card-body">
                        <form class="form-horizontal form-material mx-2" action="{{route('tambah-paket')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label class="col-sm-12" for="SKPD">Nama SKPD</label>
                                <div class="col-sm-12 border-bottom">
                                    {{-- <select class="form-select shadow-none border-0 ps-0 form-control-line" name="SKPD" value="{{old('SPKD')}}">
                                        <option selected>Pilih SKPD</option>
                                        <option>Dinas Kependudukan dan Pencatatan Sipil</option>
                                        <option>Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu</option>
                                        <option>Dinas Pendidikan dan Kebudayaan</option>
                                        <option>Dinas Pertanian</option>
                                        <option>Dinas Pemberdayaan Masyarakat dan Desa, Pemberdayaan Perempuan dan Perlindungan Anak</option>
                                        <option>Dinas Satuan Polisi Pamong Praja dan Pemadam Kebakaran</option>
                                        <option>Dinas PU dan Penataan Ruang</option>
                                        <option>Dinas Perpustakaan dan Kearsipan</option>
                                        <option>Dinas Pariwisata</option>
                                        <option>Dinas Sosial</option>
                                        <option>Dinas Perikanan dan Kelautan</option>
                                        <option>Dinas Kesehatan</option>
                                        <option>Dinas Lingkungan Hidup</option>
                                        <option>Dinas Komunikasi Informasi Statistika dan Persandian</option>
                                        <option>Dinas Perumahan, Permukiman dan Pertahanan</option>
                                        <option>Dinas Koperasi, UKM dan Perdagangan</option>
                                        <option>Dinas Perhubungan</option>
                                        <option>Dinas Tenaga Kerja dan Perindustrian</option>
                                        <option>Dinas Pengendalian Penduduk dan KB</option>
                                        <option>Dinas Pemuda dan Olahraga</option>
                                        <option>Dinas Ketahanan Pangan</option>
                                        <option>RSUD Prof.DR.dr.Anwar Makkatutu</option>
                                        <option>Inspektorat</option>
                                        <option>Badan Pengelolaan Keuangan Daerah</option>
                                        <option>Badan Kesatuan Bangsa dan Politik</option>
                                        <option>Badan Perencanaan Pembangunan Daerah</option>
                                        <option>Badan Kepegawaian dan Pengembangan Sumber Daya Manusia</option>
                                        <option>Badan Penanggulangan Bencana</option>
                                        <option>Bagian Umum</option>
                                        <option>Bagian Humas dan Protokoler</option>
                                        <option>Bagian Hukum</option>
                                        <option>Bagian Pengadaan Barang dan jasa Pemerintah Setda Kab.Bantaeng</option>
                                        <option>Bagian Organisasi</option>
                                        <option>Bagian Keuangan</option>
                                        <option>Bagian Kesra</option>
                                        <option>Bagian Pemerintahan</option>
                                        <option>Bagian Perekonomian</option>
                                        <option>Kecematan Bantaeng</option>
                                        <option>Kecematan Bissapu</option>
                                        <option>Kecematan Tompobulu</option>
                                        <option>Kecematan Uluere</option>
                                        <option>Kecematan Sinoa</option>
                                        <option>Kecematan Eremerasa</option>
                                        <option>Kecematan Gantarangkeke</option>
                                        <option>Kecematan Pa'jukukang</option>
                                    </select> --}}
                                    <select name="skpd_id" id="skpd_id" class="form-select shadow-none border-0 ps-0 form-control-line" required>
                                        <option value="">.....</option>
                                        @foreach ($skpd as $item)
                                            <option value="{{$item->id}}">{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-12" for="tahun">Tahun</label>
                                <div class="col-sm-12 border-bottom">
                                    <select class="form-select shadow-none border-0 ps-0 form-control-line" name="tahun" value="{{old('tahun')}}">
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
                                    <select class="form-select shadow-none border-0 ps-0 form-control-line" name="pilih" value="{{old('pilih')}}">
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
                                        class="form-control ps-0 form-control-line" name="namaPaket" value="{{old('namaPaket')}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12 mb-0" for="namaPenyedia">Nama Penyedia</label>
                                <div class="col-md-12">
                                    <input type="text" placeholder="Masukkan Nama Penyedia"
                                        class="form-control ps-0 form-control-line" name="namaPenyedia" value="{{old('namaPenyedia')}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12 mb-0" for="paguAnggaran">Pagu Anggaran</label>
                                <div class="col-md-12">
                                    <input type="number" placeholder="Masukkan Pagu Anggaran"
                                        class="form-control ps-0 form-control-line" name="paguAnggaran" value="{{old('paguAnggaran')}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12 mb-0" for="nilaiKontrak">Nilai Kontrak</label>
                                <div class="col-md-12">
                                    <input type="number" placeholder="Masukkan Nilai Kontrak"
                                        class="form-control ps-0 form-control-line" name="nilaiKontrak" value="{{old('nilaiKontrak')}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12 mb-0" for="nilaiHps">Nilai HPS</label>
                                <div class="col-md-12">
                                    <input type="number" placeholder="Masukkan Nilai HPS"
                                        class="form-control ps-0 form-control-line" name="nilaiHps" value="{{old('nilaiHps')}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12 mb-0" for="efisiensi">Efisiensi</label>
                                <div class="col-md-12">
                                    <input type="number" placeholder="Masukkan Efisiensi"
                                        class="form-control ps-0 form-control-line" name="efisiensi" value="{{old('efisiensi')}}">
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

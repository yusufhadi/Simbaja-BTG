<?php

namespace App\Http\Controllers;

use App\skpd;
use Illuminate\Http\Request;
use Rap2hpoutre\FastExcel\FastExcel;

class SkpdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $skpd = skpd::all();
        return view('pages.admin.Input-Paket.index-skpd', [
            'skpd' => $skpd
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.Input-Paket.tambah-skpd');
    }

    public function print($date)
    {
        $data = skpd::with(['inputPakets' => function ($query) use ($date) {
            return $query->where('tahun', $date);
        }])->get();
        $dataSkp = [];

        foreach ($data as $key => $value) {
            $dataSkp[$key]['No'] = $key + 1; 
            $dataSkp[$key]['SKPD'] = $value->name ?? "";
            $dataSkp[$key]['Tahun'] = $date;
            $dataSkp[$key]['Jumblah Paket'] = $value->inputPakets->count();
            $dataSkp[$key]['Jumblah Nilai Kontrak'] = $value->inputPakets->sum('nilaiKontrak');
            $dataSkp[$key]['Jumblah Pagu Anggaran'] = $value->inputPakets->sum('paguAnggaran');
            $dataSkp[$key]['Efisiensi'] = $value->inputPakets->sum('efisiensi');
        }
        $exel = new FastExcel;
        return   $exel->data($dataSkp)->download("laporan". '_' . $date . '.xlsx');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string'
        ]);
        $data = $request->all();
        skpd::create($data);
        return redirect()->route('skpd.index')->with('status', 'berhasil di tambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\skpd  $skpd
     * @return \Illuminate\Http\Response
     */
    public function show(skpd $skpd)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\skpd  $skpd
     * @return \Illuminate\Http\Response
     */
    public function edit(skpd $skpd)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\skpd  $skpd
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, skpd $skpd)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\skpd  $skpd
     * @return \Illuminate\Http\Response
     */
    public function destroy(skpd $skpd)
    {
        //
    }
}

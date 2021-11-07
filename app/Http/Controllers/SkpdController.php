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

    public function print($id, $date)
    {
        $data = skpd::where('id', $id)->with(['inputPakets' => function ($query) use ($date) {
            return $query->where('tahun', $date);
        }])->first();
        $list = collect([
            [
                'No' => $data->iteration,
                'SKPD' => $data->name,
                'Tahun' => $date,
                'Jumblah Paket' => $data->inputPakets->count(),
                'Jumblah Nilai Kontrak' => $data->inputPakets->sum('nilaiKontrak'),
                'Jumblah Pagu Anggaran' => $data->inputPakets->sum('paguAnggaran'),
                'Efisiensi' => $data->inputPakets->sum('efisiensi')
            ]
        ]);

        $exel = new FastExcel;
        return   $exel->data($list)->download($data->name . '_' . $date . '.xlsx');
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

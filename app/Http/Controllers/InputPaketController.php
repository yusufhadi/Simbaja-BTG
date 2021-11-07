<?php

namespace App\Http\Controllers;

use App\InputPaket;
use App\Http\Requests\Admin\InputPaketRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\skpd;
use Illuminate\Support\Str;
use Rap2hpoutre\FastExcel\FastExcel;

class InputPaketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->get('date')) {
            $skpd = skpd::with(['inputPakets' => function ($query) use ($request) {
                return $query->where('tahun', $request->date);
            }])->orderBy('name', 'ASC')->get();
        } else {
            $skpd = skpd::orderBy('name', 'ASC')->get();
        }

        return view('pages.admin.Input-Paket.index', [
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
        $skpd = skpd::orderBy('name', 'ASC')->get();
        return view('pages.admin.Input-Paket.create', [
            'skpd' => $skpd
        ]);
    }

    public function downld(Request $request, $id)
    {
        // Load users
        $data = InputPaket::query()
            ->with("skpd")
            ->where('skpd_id', $id)
            ->where('tahun', $request->tahun)
            ->get();

        $siapPrint = [];

        foreach ($data as $key => $value) {
            array_push($siapPrint, [
                'No' => $key + 1,
                'SKPD' => $value->skpd->name,
                'Tahun' => $value->tahun,
                'Mekanisme Pelaksanaan' => $value->pilih,
                'Nama Paket' => $value->namaPaket,
                'Name Penyedia' => $value->namaPenyedia,
                'Nilai Kontrak' => $value->nilaiKontrak,
                'Pagu Anggaran' => $value->paguAnggaran,
                'Nilai HPS' => $value->nilaiHps,
                'Nilai Efisiensi' => $value->efisiensi,
            ]);
        }

        $exel = new FastExcel;
        return   $exel->data($siapPrint)->download("laporan" . '_'  . '.xlsx');
        // redirect()->route('tambah-paket');
        // Export all users
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(InputPaketRequest $request)
    {
        $data = $request->all();
        // $data['slug'] = Str::slug($request->SKPD);

        InputPaket::create($data);
        return redirect()->route('tambah-paket.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $skpd = skpd::with(["inputPakets" => function ($query) use ($request) {
            return $query->where('tahun', $request->tahun);
        }])->find($id);
        $items = $skpd->inputPakets;
        $title = $skpd->name;
        // $tahun = $skpd->inputPakets->tahun;
        return view('pages.admin.Input-Paket.detail', compact('items', 'title'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = InputPaket::findOrFail($id);

        return view('pages.admin.Input-Paket.edit', [
            'item' => $item
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(InputPaketRequest $request, $id)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->SKPD);

        $item = InputPaket::findOrFail($id);

        $item->update($data);

        return redirect()->route('input-paket');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

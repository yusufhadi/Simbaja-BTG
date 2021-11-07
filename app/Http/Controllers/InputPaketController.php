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

    public function downld($id)
    {
        // Load users
        $data = InputPaket::where('id', $id)->get();

        // redirect()->route('tambah-paket');
        // Export all users
        return (new FastExcel($data))->download('file.xlsx', function ($data) {
            return [
                'SKPD' => $data->skpd->name,
                'Tahun' => $data->tahun,
                'Pilih' => $data->pilih,
                'Nama Paket' => $data->namaPaket,
                'Nama Penyedia' => $data->namaPenyedia,
                'Nilai Kontrak' => $data->nilaiKontrak,
                'Pagu Anggaran' => $data->paguAnggaran,
                'Nilai HPS' => $data->nilaiHps,
                'Efisiensi' => $data->efisiensi,
            ];
        });
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
    public function show(Request $request, $id = "")
    {
        $skpd =  skpd::with(['inputPakets' => function ($query) use ($request) {
            if ($request->get('pilih')) {
                return $query->where('pilih', $request->get('pilih'));
            }
        }])->findOrFail($id);
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

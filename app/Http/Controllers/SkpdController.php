<?php

namespace App\Http\Controllers;

use App\skpd;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\InputPaketRequest;
use Illuminate\Support\Str;
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
        if ($date) {
            $skpd = skpd::with(['inputPakets' => function ($query) use ($date) {
                return $query->where('tahun', $date);
            }])->orderBy('name', 'ASC')->get();
        } else {
            $skpd = skpd::orderBy('name', 'ASC')->get();
        }

        return view('pages.admin.printexcel.laporan', [
            'skpd' => $skpd,
            'tanggal' => $date
        ]);
        // $exel = new FastExcel;
        // return   view('pages.admin.printexcel.detail-laporan', compact('data', 'title'));
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
        return redirect()->route('skpd.index')->with('success', 'Data Berhasil Ditambahkan!');
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
    public function edit($id)
    {
        $item = skpd::findOrFail($id);

        return view('pages.admin.Input-Paket.edit-skpd', [
            'item' => $item
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\skpd  $skpd
     * @return \Illuminate\Http\Response
     */
    public function update(InputPaketRequest $request, $id)
    {
        $data = $request->all();

        $item = skpd::findOrFail($id);

        $item->update($data);

        return redirect()->route('skpd.index')->with('success', 'Data Berhasil Di-update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\skpd  $skpd
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $item = skpd::findOrFail($id);
        $item->delete();

        return redirect()->route('skpd.index')->with('success', 'Data Berhasil Di-Delete!');
    }
}

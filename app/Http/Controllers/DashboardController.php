<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\skpd;
use App\InputPaket;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        return view('pages.admin.dashboard', [
            'skpd' => skpd::count(),
            'tahun_2021' => InputPaket::where('tahun', '2021')->count(),
            'tahun_2022' => InputPaket::where('tahun', '2022')->count(),
            'tahun_2023' => InputPaket::where('tahun', '2023')->count(),
        ]);
    }
}

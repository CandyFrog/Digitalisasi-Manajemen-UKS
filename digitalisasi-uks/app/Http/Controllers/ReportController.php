<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Treatment;
use Carbon\Carbon;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        $month = $request->get('month', date('m'));
        $year = $request->get('year', date('Y'));

        $treatments = Treatment::with(['student.schoolClass', 'medicines'])
            ->whereMonth('tanggal_kunjungan', $month)
            ->whereYear('tanggal_kunjungan', $year)
            ->orderBy('tanggal_kunjungan')
            ->get();

        $totalKunjungan = $treatments->count();
        $totalObatDiberikan = 0;
        foreach($treatments as $treatment) {
            $totalObatDiberikan += $treatment->medicines->sum('pivot.jumlah_obat');
        }

        return view('reports.index', compact('treatments', 'month', 'year', 'totalKunjungan', 'totalObatDiberikan'));
    }
}

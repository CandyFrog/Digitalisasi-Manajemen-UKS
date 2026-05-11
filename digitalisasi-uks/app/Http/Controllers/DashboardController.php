<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Student;
use App\Models\Medicine;
use App\Models\Treatment;

class DashboardController extends Controller
{
    public function index()
    {
        $totalStudents = Student::count();
        $totalMedicines = Medicine::count();
        $lowStockMedicines = Medicine::where('stok', '<=', 10)->count();
        
        $todayTreatments = Treatment::whereDate('tanggal_kunjungan', date('Y-m-d'))->count();
        $monthTreatments = Treatment::whereMonth('tanggal_kunjungan', date('m'))
                                   ->whereYear('tanggal_kunjungan', date('Y'))
                                   ->count();

        $recentTreatments = Treatment::with('student.schoolClass')
                                    ->latest('tanggal_kunjungan')
                                    ->take(5)
                                    ->get();

        return view('dashboard', compact(
            'totalStudents', 
            'totalMedicines', 
            'lowStockMedicines', 
            'todayTreatments', 
            'monthTreatments',
            'recentTreatments'
        ));
    }
}

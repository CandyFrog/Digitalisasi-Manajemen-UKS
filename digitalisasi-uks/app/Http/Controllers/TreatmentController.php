<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Treatment;
use App\Models\Student;
use App\Models\Medicine;
use Illuminate\Support\Facades\DB;

class TreatmentController extends Controller
{
    public function index()
    {
        $treatments = Treatment::with(['student.schoolClass', 'medicines'])->latest('tanggal_kunjungan')->get();
        return view('treatments.index', compact('treatments'));
    }

    public function create()
    {
        $students = Student::with('schoolClass')->get();
        $medicines = Medicine::where('stok', '>', 0)->get();
        return view('treatments.create', compact('students', 'medicines'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'keluhan' => 'required|string',
            'diagnosa' => 'nullable|string',
            'tanggal_kunjungan' => 'required|date',
            'medicines' => 'nullable|array',
            'medicines.*' => 'exists:medicines,id',
            'jumlah_obat' => 'nullable|array',
        ]);

        try {
            DB::beginTransaction();

            $treatment = Treatment::create([
                'student_id' => $request->student_id,
                'keluhan' => $request->keluhan,
                'diagnosa' => $request->diagnosa,
                'tanggal_kunjungan' => $request->tanggal_kunjungan,
            ]);

            if ($request->has('medicines') && count($request->medicines) > 0) {
                foreach ($request->medicines as $index => $medicineId) {
                    $jumlah = $request->jumlah_obat[$index] ?? 1;
                    
                    $medicine = Medicine::findOrFail($medicineId);
                    
                    if ($medicine->stok < $jumlah) {
                        throw new \Exception("Stok obat {$medicine->nama_obat} tidak mencukupi!");
                    }

                    // Attach ke pivot
                    $treatment->medicines()->attach($medicineId, ['jumlah_obat' => $jumlah]);

                    // Kurangi stok
                    $medicine->decrement('stok', $jumlah);
                }
            }

            DB::commit();
            return redirect()->route('treatments.index')->with('success', 'Data kunjungan berhasil dicatat.');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withInput()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function show(Treatment $treatment)
    {
        $treatment->load(['student.schoolClass', 'medicines']);
        return view('treatments.show', compact('treatment'));
    }

    // Edit dan Update bisa dibuat lebih kompleks jika perlu mengembalikan stok, 
    // namun untuk case sederhana ini kita batasi edit (atau hanya edit keluhan/diagnosa).
    public function destroy($id)
    {
        try {
            DB::beginTransaction();
            $treatment = Treatment::with('medicines')->findOrFail($id);
            
            // Kembalikan stok obat jika dihapus
            foreach ($treatment->medicines as $medicine) {
                $medicine->increment('stok', $medicine->pivot->jumlah_obat);
            }
            
            $treatment->delete();
            DB::commit();
            
            return redirect()->route('treatments.index')->with('success', 'Data kunjungan berhasil dihapus dan stok obat dikembalikan.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Gagal menghapus data: ' . $e->getMessage());
        }
    }
}

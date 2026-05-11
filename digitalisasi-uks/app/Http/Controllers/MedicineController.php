<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Medicine;

class MedicineController extends Controller
{
    public function index()
    {
        $medicines = Medicine::all();
        return view('medicines.index', compact('medicines'));
    }

    public function create()
    {
        return view('medicines.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_obat' => 'required|string|max:255',
            'satuan' => 'required|string|max:255',
            'stok' => 'required|integer|min:0'
        ]);
        Medicine::create($request->all());
        return redirect()->route('medicines.index')->with('success', 'Obat berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $medicine = Medicine::findOrFail($id);
        return view('medicines.edit', compact('medicine'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_obat' => 'required|string|max:255',
            'satuan' => 'required|string|max:255',
            'stok' => 'required|integer|min:0'
        ]);
        $medicine = Medicine::findOrFail($id);
        $medicine->update($request->all());
        return redirect()->route('medicines.index')->with('success', 'Data obat berhasil diupdate.');
    }

    public function destroy($id)
    {
        Medicine::findOrFail($id)->delete();
        return redirect()->route('medicines.index')->with('success', 'Obat berhasil dihapus.');
    }
}

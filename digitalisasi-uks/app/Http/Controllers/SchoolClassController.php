<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\SchoolClass;

class SchoolClassController extends Controller
{
    public function index()
    {
        $classes = SchoolClass::withCount('students')->get();
        return view('classes.index', compact('classes'));
    }

    public function create()
    {
        return view('classes.create');
    }

    public function store(Request $request)
    {
        $request->validate(['nama_kelas' => 'required|string|max:255|unique:school_classes']);
        SchoolClass::create($request->all());
        return redirect()->route('classes.index')->with('success', 'Kelas berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $class = SchoolClass::findOrFail($id);
        return view('classes.edit', compact('class'));
    }

    public function update(Request $request, $id)
    {
        $request->validate(['nama_kelas' => 'required|string|max:255|unique:school_classes,nama_kelas,' . $id]);
        $class = SchoolClass::findOrFail($id);
        $class->update($request->all());
        return redirect()->route('classes.index')->with('success', 'Kelas berhasil diupdate.');
    }

    public function destroy($id)
    {
        SchoolClass::findOrFail($id)->delete();
        return redirect()->route('classes.index')->with('success', 'Kelas berhasil dihapus.');
    }
}

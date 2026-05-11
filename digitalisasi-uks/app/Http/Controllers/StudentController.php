<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Student;
use App\Models\SchoolClass;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::with('schoolClass')->get();
        return view('students.index', compact('students'));
    }

    public function create()
    {
        $classes = SchoolClass::all();
        return view('students.create', compact('classes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nis' => 'required|string|max:50|unique:students',
            'nama' => 'required|string|max:255',
            'kelas_id' => 'required|exists:school_classes,id',
            'jenis_kelamin' => 'required|in:L,P'
        ]);
        Student::create($request->all());
        return redirect()->route('students.index')->with('success', 'Data siswa berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $student = Student::findOrFail($id);
        $classes = SchoolClass::all();
        return view('students.edit', compact('student', 'classes'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nis' => 'required|string|max:50|unique:students,nis,' . $id,
            'nama' => 'required|string|max:255',
            'kelas_id' => 'required|exists:school_classes,id',
            'jenis_kelamin' => 'required|in:L,P'
        ]);
        $student = Student::findOrFail($id);
        $student->update($request->all());
        return redirect()->route('students.index')->with('success', 'Data siswa berhasil diupdate.');
    }

    public function destroy($id)
    {
        Student::findOrFail($id)->delete();
        return redirect()->route('students.index')->with('success', 'Data siswa berhasil dihapus.');
    }
}

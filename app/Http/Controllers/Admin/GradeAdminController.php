<?php

namespace App\Http\Controllers\Admin;

use App\Models\Grade;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Department;

class GradeAdminController extends Controller
{
    public function index()
    {
        return view('admin.grade.grade-admin', [
            'title' => 'Grade Admin',
            // 'students' => $students
            'grades' => Grade::all()
        ]);
    }

    public function create()
    {
        return view('admin.grade.create', [
            'title' => 'Create Grade',
            'departments' => Department::all(),
            'grades' => Grade::all()

        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'department_id' => 'required|exists:departments,id',
        ]);

        // Simpan data grade ke dalam tabel grades
        $grade = Grade::create([
            'nama' => $validated['name'],
            'department_id' => $validated['department_id'],
        ]);

        // Redirect atau response sukses
        return redirect('/admin/grade-admin')->with('success', 'Grade created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $grade = Grade::findOrFail($id);

        // Ambil data departments untuk pilihan pada form
        $departments = Department::all();

        // Tampilkan halaman edit dengan data grade dan departments
        return view('admin.grade.edit', [
            'title' => 'Edit Grade Data',
            'grade' => $grade,
            'departments' => $departments
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'department_id' => 'required|exists:departments,id',
        ]);

        // Cari data grade berdasarkan ID
        $grade = Grade::findOrFail($id);

        // Update data grade
        $grade->update([
            'nama' => $validated['name'],
            'department_id' => $validated['department_id'],
        ]);

        // Redirect kembali dengan pesan sukses
        return redirect('/admin/grades/')->with('success', 'Grade updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

}

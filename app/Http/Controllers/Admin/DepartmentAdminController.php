<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentAdminController extends Controller
{
    public function index()
    {
        return view('admin.department.department-admin', [
            'title' => 'Department Admin',
            // 'students' => $students
            'departments' => Department::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.department.create', [
            'title' => 'Create New Department',
            'departments' => Department::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'desc' => 'required|string|max:255',
        ]);

        // Simpan data grade ke dalam tabel grades
        $department = Department::create([
            'name' => $validated['name'],
            'description' => $validated['desc'],
        ]);

        // Redirect atau response sukses
        return redirect('/admin/departments')->with('success', 'Department created successfully.');
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
        $departments = Department::findOrFail($id);

        // Ambil data departments untuk pilihan pada form
        return view('admin.department.edit', [
            'title' => 'Edit Department Data',
            'department' => $departments,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'desc' => 'required|string|max:255',
        ]);

        $department = Department::findOrFail($id);
        $department->update([
            'name' => $validated['name'],
            'description' => $validated['desc'],
        ]);

        return redirect('/admin/departments')->with('success', 'Department updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Models\Department;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Grade;
use App\Models\Student;

class StudentAdminController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('q');

        // Use paginate instead of get
        $students = Student::with(['grade', 'department'])
            ->when($query, function ($queryBuilder) use ($query) {
                $queryBuilder->where('nama', 'like', '%' . $query . '%')
                    ->orWhere('email', 'like', '%' . $query . '%')
                    ->orWhere('alamat', 'like', '%' . $query . '%')
                    ->orWhereHas('grade', function ($q) use ($query) {
                        $q->where('nama', 'like', '%' . $query . '%');
                    });
            })
            ->paginate(15); // Fetch 15 students per page

        return view('admin.student.index', [
            'title' => 'Student Admin',
            'students' => $students,
            'searchQuery' => $query
        ]);
    }

    public function create()
    {
        return view('admin.student.create', [
            'title' => 'Create Student',
            'grades' => Grade::all(),
            'departments' => Department::all()
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'grade_id' => 'required|exists:grades,id',
            'email' => 'required|email',
            'address' => 'required|string|max:255',
        ]);

        // Ambil department_id dari relasi grade yang dipilih
        $grade = Grade::find($validated['grade_id']);
        $department_id = $grade->department->id; // Mendapatkan department_id dari grade yang dipilih

        // Create student dengan department_id yang sudah diambil
        $student = Student::create([
            'nama' => $validated['name'],
            'grade_id' => $validated['grade_id'],
            'email' => $validated['email'],
            'alamat' => $validated['address'],
            'department_id' => $department_id, // Menambahkan department_id secara otomatis
        ]);

        return redirect()->route('admin.students.index')
        ->with('success', 'Student created successfully!');
    }


    public function edit(Student $student)
    {
        $grades = Grade::all();
        $departments = Department::all();

        return view('admin.student.edit', [
            'title' => 'Edit Student',
            'student' => $student,
            'grades' => $grades,
            'departments' => $departments,
        ]);

    }

    public function update(Request $request, Student $student)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'grade_id' => 'required|exists:grades,id',
            'email' => 'required|email',
            'address' => 'required|string|max:255',
            'department_id' => 'required|exists:departments,id',
        ]);

        $student->update([
            'nama' => $validated['name'],
            'grade_id' => $validated['grade_id'],
            'email' => $validated['email'],
            'alamat' => $validated['address'],
            'department_id' => $validated['department_id'],
        ]);

        return redirect()->route('admin.students.index')->with('success', 'Student updated successfully!');
    }

    public function destroy(string $id)
    {
        // Cari data siswa berdasarkan ID
        $student = Student::findOrFail($id);

        // Hapus data siswa
        $student->delete();

        // Redirect kembali dengan pesan sukses
        return redirect()->route('admin.students.index')->with('success', 'Student delete successfully!');
    }


}

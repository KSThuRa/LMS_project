<?php

namespace App\Http\Controllers;

use App\Models\Batch;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::with('batch')->get();

        return view('students.index', compact('students'));
    }

    public function create()
    {
        $batches = Batch::all();
        return view('students.create', compact('batches'));
    }

    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'phone' => 'required|string|max:20',
        'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
    ]);

    $data = $request->only([
        'name',
        'email',
        'phone',
    ]);

    if ($request->hasFile('image')) {
        $image = $request->file('image');

        $imageName = time() . '_' . $image->getClientOriginalName();

        $image->move(
            public_path('uploads/students'),
            $imageName
        );

        $data['image'] = $imageName;
    }

    Student::create($data);

    return redirect()
        ->route('students.index')
        ->with('success', 'Student created successfully.');
}

    public function show(Student $student)
    {
        return view('students.show', compact('student'));
    }

    public function edit(Student $student)
    {
        return view('students.edit', compact('student'));
    }

    public function update(Request $request, Student $student)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:students,email,' . $student->id,
            'phone' => 'required|string|max:30',
        ]);

        $student->update($validated);

        return redirect()
            ->route('students.index')
            ->with('success', 'Student updated successfully.');
    }

    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()
            ->route('students.index')
            ->with('success', 'Student deleted successfully.');
    }
}

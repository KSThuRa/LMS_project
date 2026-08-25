<?php

namespace App\Repositories\Repositories;

use App\Models\Student;
use App\Repositories\Interfaces\StudentRepositoryInterface;

class StudentRepository implements StudentRepositoryInterface
{
    public function all()
    {
        return Student::latest()->get();
    }

    public function find($id)
    {
        return Student::findOrFail($id);
    }

    public function create(array $data)
    {
        return Student::create($data);
    }

    public function update($id, array $data)
    {
        $student = Student::findOrFail($id);
        $student->update($data);

        return $student;
    }

    public function delete($id)
    {
        $student = Student::findOrFail($id);

        return $student->delete();
    }
}

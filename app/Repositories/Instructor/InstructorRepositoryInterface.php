<?php

namespace App\Repositories\Repositories;

use App\Models\Instructor;
use App\Repositories\Interfaces\InstructorRepositoryInterface;

class InstructorRepository implements InstructorRepositoryInterface
{
    public function all()
    {
        return Instructor::latest()->get();
    }

    public function find($id)
    {
        return Instructor::findOrFail($id);
    }

    public function create(array $data)
    {
        return Instructor::create($data);
    }

    public function update($id, array $data)
    {
        $instructor = Instructor::findOrFail($id);
        $instructor->update($data);

        return $instructor;
    }

    public function delete($id)
    {
        $instructor = Instructor::findOrFail($id);

        return $instructor->delete();
    }
}

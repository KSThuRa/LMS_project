<?php

namespace App\Repositories\Batch;

use App\Models\Batch;
use App\Repositories\Batch\BatchRepositoryInterface;

class BatchRepository implements BatchRepositoryInterface
{
    public function all()
    {
        return Batch::all();
    }

    public function find($id)
    {
        return Batch::findOrFail($id);
    }

    public function create(array $data)
    {
        return Batch::create($data);
    }

    public function update($id, array $data)
    {
        $batch = Batch::findOrFail($id);

        $batch->update($data);

        return $batch;
    }

    public function delete($id)
    {
        $batch = Batch::findOrFail($id);
        return $batch->delete();
    }
}

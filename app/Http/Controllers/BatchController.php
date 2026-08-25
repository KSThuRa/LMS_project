<?php

namespace App\Http\Controllers;

use App\Http\Requests\BatchUpdateRequest;
use App\Models\Batch;
use Illuminate\Http\Request;
use App\Repositories\Batch\BatchRepositoryInterface;

class BatchController extends Controller
{
    protected $batchRepository;

    public function __construct(BatchRepositoryInterface $batchRepository)
    {
        $this->batchRepository = $batchRepository;
    }

    public function index()
    {
        $batches = $this->batchRepository->all();

        return view('batches.index', compact('batches'));
    }

    public function create()
    {
        return view('batches.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'status' => 'required'
        ]);

        $this->batchRepository->create($data);

        return redirect()->route('batches.index');
    }

    public function edit($id)
    {
        $batch = Batch::find($id);

        return view('batches.edit', compact('batch'));
    }

    public function update(BatchUpdateRequest $request)
    {
        $batch = $this->batchRepository->find($request->id);

        $batch->update([
            'name' => $request->name,
            'description' => $request->description
        ]);

        return redirect()->route('batches.index');
    }

    public function delete($id)
    {
    $batch = $this->batchRepository->find($id);

    $batch->delete();

    return redirect()->route('batches.index');
    }
}

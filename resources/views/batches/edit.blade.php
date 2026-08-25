@extends('layouts.app')
@section('content')
<h2 class="my-4">Edit Batch</h2>
        <div class="card">
            <div class="card-body">
                <form action="{{ route('batches.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Batch Name :</label>
                        <input type="text" id="name" name="name" placeholder="Enter Batch Name" value="{{ $batch->name}}"
                            class="form-control" />
                        @error('name')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Batch Name :</label>
                    <input type="text" id="name" name="description" placeholder="Enter Batch Description" value="{{ old('description', $batch->description) }}"
                        @error('description')
                             <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                            @enderror
                    </div>
                    <div class="mb-3">
                        <label for="start_date">Start Date</label>
                        <input type="date" class="form-control" id="start_date" name="start_date"  value="{{ old('start_date', $batch->start_date) }}" />
                    </div>
                    <div class="mb-3">
                        <label for="end_date">End Date</label>
                        <input type="date" class="form-control" id="end_date" name="end_date"   value="{{ old('end_date', $batch->end_date) }}"  />
                    </div>
                    <div class="mb-3">
                        <label for="status">Status</label>
                        <select name="status" id="status" class="form-control">
                            <option value="upcoming" @selected(old('status', $batch->status) == 'upcoming')>Upcoming</option>
                            <option value="ongoing" @selected(old('status', $batch->status)>Ongoing</option>
                            <option value="complete" @selected(old('status', $batch->status) == 'complete')>Complete</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm">
                        Update
                    </button>
                    <a href="{{route('batches.index')}}" class="btn btn-secondary btn-sm">Back</a>
                </form>
            </div>

@endsection

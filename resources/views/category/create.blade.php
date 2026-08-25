@extends('layouts.app')
@section('content')
 <h2 class="my-4">Category Create</h2>
        <div class="card">
            <div class="card-body">
                <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb -3">
                        <label for="name" class="form-label">Category Name:</label>
                        <input type="text" id="name" name="name" placeholder="Enter Category Name"  class="form-control "/>
                        @error('name')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="image">Image</label>
                        <input type="file" class="form-control" id="image" name="image">
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm mt-2">
                        +Create
                    </button>
                    <a href="{{ route('categories.index') }}" class="btn btn-secondary btn-sm mt-2">Back</a>
                </form>
            </div>
        </div>

@endsection

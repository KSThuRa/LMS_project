@extends('layouts.app')
@section('content')
    <h2 class="my-4">Batch List</h2>
    @can('batchCreate')
    <a href="{{ route('batches.create') }}" class="btn btn-success btn-sm mb-2">+ Create</a>
    @endcan

    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <td>#</td>
                <td>NAME</td>
                <td>DESCRIPTION</td>
                <td>Start Date</td>
                <td>End Date</td>
                <td>Status</td>
                <td>ACTION</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($batches as $data)
                <tr>
                    <td>{{ $data->id }}</td>
                    <td>{{ $data->name }}</td>
                    <td>{{ $data->description }}</td>
                    <td>{{ $data->start_date }}</td>
                    <td>{{ $data->end_date }}</td>
                    <td>{{ $data->status }}</td>
                    <td class="d-flex">
                        @can('batchUpdate')
                        <a href="{{ route('batches.edit', ['id' => $data->id]) }}"
                            class="btn btn-secondary btn-sm me-2">Edit</a>
                        @endcan

                        @can('batchDelete')
                        <form action="{{ route('batches.delete', [$data->id]) }}" method="POST">
                            @csrf
                            <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                        </form>
                        @endcan


                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

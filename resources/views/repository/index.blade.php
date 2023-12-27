@extends('layouts.app')
@section("content")

<div class="container mt-4">
    @if (session('success'))
        <div class="alert alert-success">
            <div>{{ session('success')}}</div>
            </div>
    @endif
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="card-title mb-0">Data Repository</h4>
                    <a href="{{ route('repository.create') }}" class="btn btn-dark">Create</a>
                </div>
                <div class="card-body">
                        <table class="table table-striped table-bordered" id="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th>No</th>
                                    <th>Title</th>
                                    <th>Author</th>
                                    <th>Year</th>
                                    <th>Description</th>
                                    <th>Options</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($repositories as $index => $repository)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $repository->title }}</td>
                                        <td>{{ $repository->author }}</td>
                                        <td>{{ $repository->year }}</td>
                                        <td>{{ $repository->description }}</td>
                                        <td>
                                            @if (Auth::user()->role_id == 1)
                                            <a href="{{ route('repository.edit', $repository->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                            <form action="{{ route('repository.destroy', $repository->id) }}" method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this repository?')">Delete</button>
                                            </form>
                                            @endif

                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center">No data available</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
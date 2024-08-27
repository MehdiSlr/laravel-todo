@extends('layout.master')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class=""><a href="{{ route('todos.index') }}" class="btn btn-dark"><i class="fa fa-arrow-left me-3"></i>Back</a>
                Todo Details
            </h5>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <img width="350" class="rounded" src="{{ asset('assets/images/' . $todo->image) }}" alt="">
            </div>
            <div class="row">
                <div class="col-12 col-md-4 mb-3">
                    <label class="form-label">Title</label>
                    <input disabled type="text" value="{{ $todo->title }}" class="form-control">
                </div>
                <div class="col-12 col-md-4 mb-3">
                    <label class="form-label">Category</label>
                    <input disabled type="text" value="{{ $todo->category->title }}" class="form-control">
                </div>
                <div class="col-12 col-md-4 mb-3">
                    <label class="form-label">Status</label>
                    <input disabled type="text" value="{{ $todo->status ? 'Completed' : 'Pending' }}" class="form-control">
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea disabled class="form-control" name="description" rows="3">{{ $todo->description }}</textarea>
            </div>
            <div class="d-flex">
                <a href="{{ route('todos.edit', $todo->id) }}" class="btn btn-secondary">Edit</a>
                <form action="{{ route('todos.destroy', ['todo' => $todo->id]) }}" method="POST" onsubmit="return confirm('Are you sure to delete `{{ $todo->title }}` ?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn ms-2 btn-danger">Delete</button>
                </form>
                {{-- <a href="{{ route('todos.destroy', $todo->id) }}" class="btn btn-danger">Delete</a> --}}
            </div>
        </div>
    </div>
@endsection

@extends('layout.master')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class=""><a href="{{ URL::previous() }}" class="btn btn-dark"><i class="fa fa-arrow-left me-3"></i>Back</a>
                Edit Todo
            </h5>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <img width="350" class="rounded" src="{{ asset('assets/images/' . $todo->image) }}" alt="">
            </div>
            <form action="{{ route('todos.update',$todo->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="mb-3">
                    <label class="form-label">Image</label>
                    <input type="file" name="image" accept="image/*" class="form-control">
                    <div class="form-text text-danger">@error('image') {{ $message }} @enderror</div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Title</label>
                    <input type="text" name="title" value="{{ $todo->title }}" class="form-control">
                    <div class="form-text text-danger">@error('title') {{ $message }} @enderror</div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Category</label>
                    <select class="form-select" name="category_id">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ $category->id == $todo->category_id ? 'selected' : '' }}>{{ $category->title }}</option>
                        @endforeach
                    </select>
                    <div class="form-text text-danger">@error('category_id') {{ $message }} @enderror</div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea class="form-control" name="description" rows="3">{{ $todo->description }}</textarea>
                    <div class="form-text text-danger">@error('description') {{ $message }} @enderror</div>
                </div>
                <button type="submit" class="btn btn-secondary">Update</button>
            </form>
        </div>
    </div>
@endsection

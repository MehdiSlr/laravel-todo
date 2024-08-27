@extends('layout.master')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class=""><a href="{{ URL::previous() }}" class="btn btn-dark"><i class="fa fa-arrow-left me-3"></i>Back</a>
            Edit Category
        </h5>
    </div>
    <div class="card-body">
        <form action="{{ route('categories.update', ['category' => $category->id]) }}" method="POST">
            @csrf
            @method('PATCH')
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" id="title" value="{{ $category->title }}" class="form-control @error('title')
                border border-danger
                @enderror">
                <div class="form-text text-danger">@error('title')
                    {{ $message }}
                @enderror</div>
            </div>
            <button type="submit" class="btn btn-secondary">Update</button>
        </form>
    </div>
</div>
@endsection
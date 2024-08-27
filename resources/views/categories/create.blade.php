@extends('layout.master')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class=""><a href="{{ route('categories.index') }}" class="btn btn-dark"><i class="fa fa-arrow-left me-3"></i>Back</a>
            Create Category
        </h5>
    </div>
    <div class="card-body">
        <form action="{{ route('categories.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" id="title" class="form-control @error('title')
                border border-danger
                @enderror">
                <div class="form-text text-danger">@error('title')
                    {{ $message }}
                @enderror</div>
            </div>
            <button type="submit" class="btn btn-secondary">Create</button>
        </form>
    </div>
</div>
@endsection
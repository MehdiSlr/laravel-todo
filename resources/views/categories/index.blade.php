@extends('layout.master')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="">Categories</h5>
            <a href="{{ route('categories.create') }}" class="btn btn-dark">Create</a>
        </div> 
        <div class="card-body">
            <table class="table table-striped align-middle">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{ $category->title }}</td>
                            <td class="d-flex">
                                <a href="{{ route('categories.edit', ['category' => $category->id]) }}" class="btn btn-sm btn-secondary">Edit</a>
                                <form action="{{ route('categories.destroy', ['category' => $category->id]) }}" method="POST" onsubmit="return confirm('Are you sure to delete `{{ $category->title }}` ?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn ms-2 btn-sm btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
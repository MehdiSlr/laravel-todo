@extends('layout.master')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="">Todos</h5>
            <a href="{{ route('todos.create') }}" class="btn btn-dark"><i class="fa fa-plus me-3"></i>Create</a>
        </div>
        <div class="card-body">
            <table class="table table-striped align-middle">
                <thead> 
                    <tr>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($todos as $todo)
                    <tr>
                        <td>
                            <img width="90" height="50" class="rounded" src="{{ asset('assets/images/' . $todo->image) }}" alt="image">
                        </td>
                        <td>{{ $todo->title }}</td>
                        <td>{{ $todo->category->title }}</td>
                        <td>
                            <a href="{{ route('todos.show', $todo->id) }}" class="btn btn-sm btn-todo btn-primary">Show</a>
                            @if ($todo->status)
                            <a href="{{ route('todos.undone', $todo->id) }}" id="undone" class="btn btn-sm btn-todo btn-outline-danger">Completed</a>
                            @else
                            <a href="{{ route('todos.done', $todo->id) }}" class="btn btn-sm btn-todo btn-success">Done</a>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $todos->links() }}
        </div>
    </div>

    <script>
        const undoneButton = document.getElementById("undone");
    
        undoneButton.addEventListener("mouseover", function() {
            undoneButton.innerHTML = "Undone!";
        });
    
        undoneButton.addEventListener("mouseout", function() {
            undoneButton.innerHTML = "Completed";
        });
    </script>
@endsection

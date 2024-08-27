<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TodoController extends Controller
{
    public function index()
    {
        $todos = Todo::all();
        return view('todos.index', compact('todos'));
    }

    public function show(Todo $todo)
    {
        return view('todos.show', compact('todo'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('todos.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|max:2048',
            'title' => 'required|min:3|max:50|unique:todos,title',
            'description'=> 'required|min:10|max:1000',
            'category_id' => 'required|integer',
        ]);

        $imageName = time() .'_'. $request->image->getClientOriginalName();
        $request->image->storeAs('/images', $imageName);

        Todo::create([
            'image'=> $imageName,
            'title'=> $request->title,
            'description'=> $request->description,
            'category_id'=> $request->category_id
        ]);

        return redirect()->route('todos.index');
    }

    public function done(Todo $todo)
    {
       $todo->update([
        'status'=> 1
        ]);
        return redirect()->route('todos.index');
    }

    public function undone(Todo $todo)
    {
       $todo->update([
        'status'=> 0
        ]);
        return redirect()->route('todos.index');
    }

    public function edit(Todo $todo)
    {
        $categories = Category::all();
        return view('todos.edit', compact('todo', 'categories'));
    }

    public function update(Request $request, Todo $todo)
    {
        $request->validate([
            'image' => 'nullable|image|max:2048',
            'title' => 'required|min:3|max:50',
            'description'=> 'required|min:10|max:1000',
            'category_id' => 'required|integer',
        ]);
        if ($request->hasFile('image')) {
            Storage::delete("/images/{$todo->image}");
            $imageName = time() .'_'. $request->image->getClientOriginalName();
            $request->image->storeAs('/images', $imageName);
        }


        $todo->update([
            'image'=> $imageName ?? $todo->image,
            'title'=> $request->title,
            'description'=> $request->description,
            'category_id'=> $request->category_id
        ]);

        return redirect()->route('todos.index');
    }

    public function destroy(Todo $todo)
    {
        // Storage::delete("/images/{$todo->image}");
        $todo->delete();
        return redirect()->route('todos.index');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Todo;
use Illuminate\Http\Request;

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
}

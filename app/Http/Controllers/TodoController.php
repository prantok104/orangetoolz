<?php

namespace App\Http\Controllers;

use App\Http\Requests\Todo\TodoRequest;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Todo;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $todos = Todo::with(['categories', 'tags'])->Creator()->latest()->paginate(3);
            return view('todo.index', compact('todos'));
        } catch (\Exception $e) {
            Toastr::error('Something went wrong', 'Error');
            return back();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try {
            $categories = Category::Active()->get(['id', 'name']);
            $tags = Tag::Active()->get(['id', 'name']);
            return view('todo.create', compact('categories', 'tags'));
        } catch (\Exception $e) {
            Toastr::error('Something went wrong', 'Error');
            return back();
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TodoRequest $request)
    {
        if ($request->isMethod('POST')) {
            try {
                $todo = new Todo;
                $todo->creator_id = Auth::id();
                $todo->name = $request->name;
                $todo->description = $request->description;
                $todo->category_id = $request->category;
                $todo->is_favourite = $request->is_favourite;
                $todo->save();
                $todo->tags()->sync($request->tags);
                Toastr::success('Item successfully created', 'Success');
                return redirect()->route('todo.index');
            } catch (\Exception $e) {
                Toastr::error('Something went wrong', 'Error');
                return back();
            }
        } else {
            Toastr::error('Method not allowed', 'Error');
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $todo = Todo::findOrFail(decrypt($id));
            return view('todo.edit', compact('todo'));
        } catch (\Exception $e) {
            Toastr::error('Something went wrong', 'Error');
            return back();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TodoRequest $request, $id)
    {
        if ($request->isMethod('PUT')) {
            try {
                $todo = Todo::findOrFail(decrypt($id));
                $todo->creator_id = Auth::id();
                $todo->name = $request->name;
                $todo->description = $request->description;
                $todo->category_id = $request->category;
                $todo->is_favourite = $request->is_favourite;
                $todo->save();
                $todo->sync($request->tags);
                Toastr::success('Item successfully updated', 'Success');
                return redirect()->route('todos.index');
            } catch (\Exception $e) {
                Toastr::error('Something went wrong', 'Error');
                return back();
            }
        } else {
            Toastr::error('Method not allowed', 'Error');
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $todo = Todo::findOrFail($id);
            $todo->trashes()->create(['label' => 'Todo']);
            $todo->delete();
        } catch (\Exception $e) {
            Toastr::error('Something went wrong', 'Error');
            return back();
        }
    }
}

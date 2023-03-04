<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Models\Task;
use App\Models\Todo;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {
        $tasks = Task::with('todos')->Orderly(decrypt($request->todo_id))->paginate(10);
        $todo = Todo::findOrFail(decrypt($request->todo_id));
        return view('todo.task.index', compact('tasks', 'todo'));
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
    public function create(Request $request)
    {
        try {
            $todo_id = $request->todo_id;
            $order = Task::where('todo_id', decrypt($todo_id))->count() + 1;
            return view('todo.task.create', compact('todo_id', 'order'));
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
    public function store(TaskRequest $request)
    {
        if ($request->isMethod('POST')) {
            try {
                $task  = new Task;
                $task->todo_id = decrypt($request->todo_id);
                $task->name = $request->name;
                $task->priority = $request->priority;
                $task->status = $request->status;
                $task->order = $request->order;
                $task->save();
                Toastr::success('Task successfully created', 'Success');
                return redirect()->route('task.index', ['todo_id' => $request->todo_id]);
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
    public function edit(Request $request, $id)
    {
        try {
            $todo_id = $request->todo_id;
            $task = Task::findOrFail(decrypt($id));
            return view('todo.task.edit', compact('todo_id', 'task'));
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
    public function update(Request $request, $id)
    {
        if ($request->isMethod('PUT')) {
            try {
                $task  = Task::findOrFail(decrypt($id));
                $task->name = $request->name;
                $task->priority = $request->priority;
                $task->status = $request->status;
                $task->order = $request->order;
                $task->save();
                Toastr::success('Task successfully updated', 'Success');
                return redirect()->route('task.index', ['todo_id' => $request->todo_id]);
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
            $task = Task::findOrFail($id);
            $task->trashes()->create(['label' => 'Task', 'creator_id' => Auth::id()]);
            $task->delete();
        } catch (\Exception $e) {
            Toastr::error('Something went wrong', 'Error');
            return back();
        }
    }


    /**
     * Task order change.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function order(Request $request)
    {
        $tasks = str_replace('&', '', explode('taskOrder[]=', $request->order));
        $parent = $request->todo_id;
        $counter = 1;
        for ($i = 1; $i < count($tasks); $i++) {
            $task =  Task::findOrFail($tasks[$i]);
            $task->order = $counter++;
            $task->save();
        }

        echo 'Please reload the page for change';
    }
}

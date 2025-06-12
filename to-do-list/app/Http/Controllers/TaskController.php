<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function index()
    {
        // Logic to retrieve and display tasks
        $tasks = Task::all();
        return view('tasks.index', compact('tasks'));
    }

    public function store(Request $request){
        $request->validate(['title' => 'required']);
        Task::create($request->only('title'));
        return redirect()->back();
    }

    public function update($id){
        $task= Task::FindOrFail($id);
        $task->completed = !$task->completed;
        $task->save();
        return redirect()->back();
    }

    public function destroy($id){
        Task::destroy($id);
        return redirect()->back();
    }
}

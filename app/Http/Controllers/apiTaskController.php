<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class apiTaskController extends Controller
{
    //
    public function add_task()
    {
        $users = User::where('id', '!=', auth()->user()->id)->get();
        return response()->json($users);
    }

    public function store_task(Request $request)
    {
        $user_id = Auth::user()->id;

        $task = Task::create([
            'user' => $request->user,
            'user_id' => $user_id,
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return response()->json(['message' => 'This task has been successfully assigned', 'task' => $task], 201);
    }

    public function task_board()
    {
        $data = User::where('id', Auth::user()->id)->with('tasks.comments')->get();
        return response()->json($data);
    }

    public function other_task()
    {
        $tasks = Task::where('user_id', auth()->user()->id)->get();
        return response()->json($tasks);
    }

    public function show_task()
    {
        $tasks = Task::all();
        return response()->json($tasks);
    }

    public function response_tasks()
    {
        $data = User::where('id', Auth::user()->id)->with('tasks.comments')->get();
        return response()->json($data);
    }

    public function update_task(Request $request, $id)
    {
        $task = Task::findOrFail($id);
        $task->update($request->all());

        return response()->json(['message' => 'Task has been successfully updated', 'task' => $task]);
    }

    public function edit_task(Request $request, $id)
    {
        $task = Task::findOrFail($id);
        $task->update($request->except('_token'));

        return response()->json(['message' => 'Task has been successfully updated', 'task' => $task]);
    }

    public function delete_task($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();

        return response()->json(['message' => 'This task and everything related to it has been deleted']);
    }
    public function restoreTask(Request $request)
    {
        try {
            $task = Task::onlyTrashed()->findOrFail($request->id);
            $task->restore();
            return response()->json([
                'message' => 'Task has been successfully restored.'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to restore task.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function forceDelete(Request $request)
    {
        try {
            $task = Task::onlyTrashed()->findOrFail($request->id);
            $task->forceDelete();
            return response()->json([
                'message' => 'Task has been successfully deleted permanently.'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to delete task permanently.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

}

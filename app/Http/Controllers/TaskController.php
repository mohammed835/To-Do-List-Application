<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    //
    public function add_task(){
        $users = User::where('id', '!=', auth()->user()->id)->get();
        return view('dashboard.task.add_task',compact('users'));
    }
    public function storetask(Request $request) {
        $user_id = Auth::user()->id;

        Task::create([
            "user" =>$request->user,
            'user_id' => $user_id,
            'title' => $request->title,
            'description' => $request->description,
        ]);
        session()->flash('add_task','This task has been successfully assigned ');

        return redirect()->route('otherTask');
    }
    public function taskBoard(){
        $data = User::where('id', Auth::user()->id)->with('tasks.comments')->get();

        return view('dashboard.task.response_task',compact('data'));
    }
    public function otherTask(){
        $tasks =  Task::where('user_id',auth()->user()->id)->get();

        return view('dashboard.task.otherTask',compact('tasks'));
        // return $tasks;
    }

    public function show_task(){

       $tasks =  Task::all();

       return view('dashboard.task.show_task',compact('tasks'));
    }

    public function responseTasks()
    {
        $data = User::where('id', Auth::user()->id)->with('tasks.comments')->get();
        return view('dashboard.task.responseTasks', compact('data'));
    }

   public function update_task(Request $request){
        $users = User::where('id', '!=', auth()->user()->id)->get();

        $task = Task::where('id',$request->id)->get();

        return view('dashboard.task.update_task',compact('task','users'));
        // return $request->id ;

   }
   public function edit_task(Request $request){
        Task::where('id',$request->id)->update($request->except('_token'));
        session()->flash('edit','This task has been successfully updated ');

        return redirect()->route('otherTask');

   }

    public function deletetask($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();
        session()->flash('delete_task', 'This task and everything related to it has been deleted');
        return redirect()->back();
    }
    public function restore_delete()
    {
        $tasks = Task::onlyTrashed()->get();

        return view('dashboard.task.restore_delete', compact('tasks'));

    }
    public function restore_task(Request $request) {
        $task = Task::onlyTrashed()->findOrFail($request->id);
        $task->restore();
        session()->flash('restore_task', 'This task has been successfully restored.');
        return redirect()->route('otherTask');
    }
    public function force_delete(Request $request) {
        $task = Task::onlyTrashed()->findOrFail($request->id);

        $task->forceDelete();

        session()->flash('force_delete', 'This task has been successfully deleted permanently.');

        return redirect()->route('otherTask');
    }
}

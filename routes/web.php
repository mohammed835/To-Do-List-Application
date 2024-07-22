<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TaskController;


// start Home controller
route::get('redirects',[HomeController::class,'redirects'])->name('redirects');



// public route
Route::get('/', function () {
    return view('welcome');
})->name('welcome');






Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});




// start task controller

Route::middleware(['auth_custom'])->group(function () {
    Route::get('add_task', [TaskController::class, 'add_task'])->name('add_task');
    Route::post('storetask', [TaskController::class, 'storetask'])->name('storetask');
    Route::get('show_task', [TaskController::class, 'show_task'])->name('show_task');
    Route::get('responseTasks', [TaskController::class, 'responseTasks'])->name('responseTasks');
    Route::get('deletetask/{id}', [TaskController::class, 'deletetask'])->name('deletetask');
    Route::get('otherTask', [TaskController::class, 'otherTask'])->name('otherTask');
    Route::get('taskBoard', [TaskController::class, 'taskBoard'])->name('taskBoard');
    Route::post('update_task', [TaskController::class, 'update_task'])->name('update_task');
    Route::post('edit_task', [TaskController::class, 'edit_task'])->name('edit_task');
    Route::post('restore_delete', [TaskController::class, 'restore_delete'])->name('restore_delete');
    Route::post('restore_task', [TaskController::class, 'restore_task'])->name('restore_task');
    Route::post('force_delete', [TaskController::class, 'force_delete'])->name('force_delete');



});




// start comment controller add_comment

route::post('add_comment',[CommentController::class,'add_comment'])->name('add_comment');






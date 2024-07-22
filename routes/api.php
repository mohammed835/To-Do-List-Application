<?php
use App\Http\Controllers\ApiTaskController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Task API Routes
Route::get('tasks', [ApiTaskController::class, 'show_task'])->name('tasks.show');
Route::get('tasks/other', [ApiTaskController::class, 'other_task'])->name('tasks.other');
Route::get('tasks/board', [ApiTaskController::class, 'task_board'])->name('tasks.board');
Route::get('tasks/response', [ApiTaskController::class, 'response_tasks'])->name('tasks.response');
Route::get('tasks/add', [ApiTaskController::class, 'add_task'])->name('tasks.add');
Route::post('tasks', [ApiTaskController::class, 'store_task'])->name('tasks.store');
Route::put('tasks/{id}', [ApiTaskController::class, 'update_task'])->name('tasks.update');
Route::patch('tasks/{id}', [ApiTaskController::class, 'edit_task'])->name('tasks.edit');
Route::delete('tasks/{id}', [ApiTaskController::class, 'delete_task'])->name('tasks.delete');

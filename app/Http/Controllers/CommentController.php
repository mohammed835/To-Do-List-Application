<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function add_comment(Request $request) {
        Comment::updateOrCreate(
            ['task_id' => $request->task_id],
            [
                'comment' => $request->comment,
                'task_status' => $request->task_status,
            ]
        );
        session()->flash('comment', 'Your reply has been sent to the sender');
        return redirect()->back();
    }
    public function show_comment() {
        return redirect()->back();
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable=['comment','task_id','task_status'];

    public function task(){
        return $this->belongsTo(Task::class,'task_id','id');
    }
}

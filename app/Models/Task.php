<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use HasFactory , SoftDeletes;
    protected $fillable=['user_id','user','title','description'];

    public function users(){
        return $this->belongsTo(User::class,'user_id','id');
    }
    public function categories(){
        return $this->belongsTo(Category::class,'category_id');
    }

    public function comments(){
        return $this->hasMany(Comment::class,'task_id','id');
    }
}

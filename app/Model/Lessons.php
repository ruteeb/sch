<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Lessons extends Model
{
    protected $table = 'lessons';

    protected $fillable = ['title', 'content', 'video', 'teacher_id'];
}

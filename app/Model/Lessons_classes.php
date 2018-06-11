<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Lessons_classes extends Model
{
    protected $table = 'lessons_classes';

    protected $fillable = ['class_id', 'lesson_id'];
}

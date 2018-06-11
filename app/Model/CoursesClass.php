<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CoursesClass extends Model
{
    protected $table = 'courses_classes';

    protected $fillable = ['course_id', 'class_id'];
}

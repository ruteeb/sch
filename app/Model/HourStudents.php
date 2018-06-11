<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class HourStudents extends Model
{
    protected $table = 'hour_students';

    protected $fillable = ['hour', 'date', 'start_date_lesson', 'end_date_lesson', 'course_id', 'class_id', 'student_id'];
}

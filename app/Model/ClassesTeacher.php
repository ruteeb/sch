<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ClassesTeacher extends Model
{
    protected $table = 'classes_teachers';

    protected $fillable = ['class_id', 'teacher_id'];
}

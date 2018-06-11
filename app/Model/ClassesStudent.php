<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ClassesStudent extends Model
{
    protected $table = 'classes_students';

    protected $fillable = ['class_id', 'student_id'];
}

<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PresenceStudents extends Model
{
    protected $table = 'presence_students';

    protected $fillable = ['student_id', 'lesson_id'];
}

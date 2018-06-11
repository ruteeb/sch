<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    protected $table = 'courses';

    protected $fillable = ['title', 'description', 'image'];
}

<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Materials extends Model
{
    protected $table = "materials";

    protected $fillable = ['title', 'content', 'image'];
}

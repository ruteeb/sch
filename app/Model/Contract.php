<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    protected $table = 'contracts';

    protected $fillable = ['start_date', 'end_date', 'contract_value', 'hour_count', 'price_per', 'contact_person',
        'student_id', 'created_by', 'updated_by'];
}

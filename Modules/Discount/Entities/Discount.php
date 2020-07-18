<?php

namespace Modules\Discount\Entities;

use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    protected $fillable = [
        'title',
        'code',
        'amount',
        'amount_type',
        'min_amount',
        'max_amount',
        'department_id',
        'status',
        'use_limit',
        'used_count',
        'start_time',
        'finish_time',
    ];
}

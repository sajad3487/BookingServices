<?php

namespace Modules\Grave\Entities;

use Illuminate\Database\Eloquent\Model;

class grave extends Model
{
    protected $fillable = [
        'user_id',
        'state',
        'city',
        'cemetery',
        'segment',
        'line',
        'number',
        'name',
    ];
}

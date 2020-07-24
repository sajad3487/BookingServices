<?php

namespace Modules\Financial\Entities;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [];

    public function user (){
        return $this->belongsTo(User::class);
    }
}

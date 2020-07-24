<?php

namespace Modules\Financial\Entities;

use App\User;
use Illuminate\Database\Eloquent\Model;

class wallet extends Model
{
    protected $fillable = [
        'user_id',
        'status',
        'total_amount',
        'total_count',
    ];

    public function user (){
        return $this->belongsTo(User::class);
    }

    public function transaction (){
        return $this->hasMany('Modules\Financial\Entities\Transaction');
    }
}

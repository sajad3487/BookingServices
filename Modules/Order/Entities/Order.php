<?php

namespace Modules\Order\Entities;

use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    protected $fillable = [
        'user_id',
        'grave_id',
        'payment_id',
        'payment_date',
        'discount_code',
        'discount',
        'net_price',
        'total_price',
    ];

    public function categories (){
        return $this->belongsToMany('Modules\Category\Entities\Category');
    }

    public function grave (){
        return $this->hasOne('Modules\Grave\Entities\Grave','id','grave_id');
    }
}

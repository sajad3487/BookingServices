<?php

namespace Modules\Category\Entities;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    protected $fillable = [
        'id',
        'title',
        'description',
        'parent_id',
        'price',
        'status',
        'public',
    ];

    public function child (){
        return $this->hasMany('Modules\Category\Entities\Category','parent_id','id');
    }

    public function grandchild (){
        return $this->hasMany('Modules\Category\Entities\Category','parent_id','id');
    }

    public function orders (){
        return $this->belongsToMany('Modules\Order\Entities\Order');
    }
}

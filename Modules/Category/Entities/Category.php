<?php

namespace Modules\Category\Entities;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    protected $fillable = [
        'id',
        'title',
        'parent_id',
        'price',
        'status',
    ];

    public function child (){
        return $this->hasMany('Modules\Category\Entities\Category','parent_id','id');
    }

    public function grandchild (){
        return $this->hasMany('Modules\Category\Entities\Category','parent_id','id');
    }
}

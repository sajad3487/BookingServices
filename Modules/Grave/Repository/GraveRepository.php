<?php


namespace Modules\Grave\Repository;


use App\DesignPatterns\Repository;
use Modules\Grave\Entities\grave;

class GraveRepository extends Repository
{
    public function __construct()
    {
        $this->model = new grave();
    }

    public function getGraveWithUserId ($user_id){
        return grave::where('user_id',$user_id)->get();
    }

}

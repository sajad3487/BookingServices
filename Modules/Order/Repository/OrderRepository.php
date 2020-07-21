<?php


namespace Modules\Order\Repository;


use App\DesignPatterns\Repository;
use Modules\Order\Entities\Order;

class OrderRepository extends Repository
{
    public function __construct()
    {
        $this->model = new Order();
    }

    public function getByIdWithRelated($id){
        return Order::where('id',$id)
            ->with('categories')
            ->with('grave')
            ->first();
    }

    public function getOrderByUserId ($userId){
        return order::where('user_id',$userId)
            ->with('categories')
            ->with('grave')
            ->get();
    }


}

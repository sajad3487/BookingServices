<?php


namespace Modules\Discount\Repository;


use App\DesignPatterns\Repository;
use Modules\Discount\Entities\Discount;

class DiscountRepository extends Repository
{
    public function __construct()
    {
        $this->model = new Discount();
    }
}

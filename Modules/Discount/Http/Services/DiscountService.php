<?php


namespace Modules\Discount\Http\Services;


use Modules\Discount\Repository\DiscountRepository;

class DiscountService
{
    /**
     * @var DiscountRepository
     */
    private $discountRepo;

    public function __construct(
        DiscountRepository $discountRepository
    )
    {
        $this->discountRepo =$discountRepository;
    }

    public function getAllDiscount(){
        return $this->discountRepo->getAll();
    }

    public function createDiscountCode($data){
        return $this->discountRepo->create($data);
    }

    public function getDiscountCodeWithId ($id){
        return $this->discountRepo->getById($id);
    }

}

<?php


namespace Modules\Order\Http\Services;


use Modules\Category\Http\Services\CategoryService;
use Modules\Grave\Http\Services\GraveService;
use Modules\Order\Repository\OrderRepository;
use function GuzzleHttp\Promise\exception_for;

class OrderService
{
    /**
     * @var OrderRepository
     */
    private $orderRepo;
    /**
     * @var GraveService
     */
    private $graveService;
    /**
     * @var GraveService
     */
    private $categoryService;

    public function __construct(
        OrderRepository $orderRepository,
        GraveService $graveService,
        CategoryService $categoryService
    )
    {
        $this->orderRepo = $orderRepository;
        $this->graveService = $graveService;
        $this->categoryService = $categoryService;
    }

    public function createNewOrder ($data){
        $data['net_price'] = $data['total_price'] = $this->calculateNetPrice($data['category']);
        $order = $this->orderRepo->create($data);
        $order->categories()->sync($data['category']);
        return $this->orderRepo->getByIdWithRelated($order->id);
    }

    public function updateOrder ($data,$id){
        $user_id =auth()->id();
        if (isset($data['grave_id'])){
            $grave_id = $data['grave_id'];
            $this->checkGrave($grave_id,$user_id);
        }

        if (isset($data['category'])){
            $order = $this->orderRepo->getById($id);
            $order->categories()->sync($data['category']);
        }

        $this->orderRepo->update($data,$id);
        return $this->orderRepo->getByIdWithRelated($id);
    }

    public function getOrderById ($id){
        return $this->orderRepo->getByIdWithRelated($id);
    }

    public function deleteOrder ($id){
        return $this->orderRepo->delete($id);
    }

    public function getOrderOfUser ($userId){
        return $this->orderRepo->getOrderByUserId($userId);
    }





    public function checkGrave($grave_id,$user_id)
    {
        $grave = $this->graveService->getGraveById($grave_id);
        if ($grave->user_id != $user_id){
            return exception_for('this grave is not for this user');
        }
    }

    public function calculateNetPrice ($data){
        $net_price = 0;
        foreach ($data as $categoryId){
            $category = $this->categoryService->getCategoryById($categoryId);
            $net_price += $category->price;
        }
        return $net_price;
    }

}

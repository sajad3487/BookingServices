<?php

namespace Modules\Order\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Order\Http\Requests\OrderRequest;
use Modules\Order\Http\Services\OrderService;

class OrderController extends Controller
{
    /**
     * @var OrderService
     */
    private $orderService;

    public function __construct(
        OrderService $orderService
    )
    {
        $this->orderService = $orderService;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {

    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(OrderRequest $request)
    {
        $data =$request->all();
        $data['user_id']=auth()->id();
        return $this->orderService->createNewOrder($data);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return $this->orderService->getOrderById($id);
    }


    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(OrderRequest $request, $id)
    {
        return $this->orderService->updateOrder($request->all(),$id);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        return $this->orderService->deleteOrder($id);
    }

    public function ordersOfUser() {
        $userId = auth()->id();
        return $this->orderService->getOrderOfUser($userId);
    }

    public function reorder($id) {
        $previousOrder = $this->orderService->getOrderById($id)->toArray();

        $data['user_id'] =$previousOrder['user_id'];
        $data['grave_id'] =$previousOrder['grave_id'];
        $category = $previousOrder['categories'];
        foreach ($category as $key=>$cat){
            $data['category'][$key]= $cat['id'];
        }
        return $this->orderService->createNewOrder($data);
    }
}

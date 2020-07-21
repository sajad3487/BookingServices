<?php

namespace Modules\Discount\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Discount\Http\Requests\DiscountRequest;
use Modules\Discount\Http\Services\DiscountService;

class DiscountController extends Controller
{
    /**
     * @var DiscountService
     */
    private $discountService;

    public function __construct(
        DiscountService $discountService
    )
    {
        $this->discountService = $discountService;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return $this->discountService->getAllDiscount();
    }


    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(DiscountRequest $request)
    {
        return $this->discountService->createDiscountCode($request->all());
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return $this->discountService->getDiscountCodeWithId($id);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        return view('discount::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}

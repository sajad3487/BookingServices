<?php

namespace Modules\Grave\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Grave\Http\Requests\GraveRequest;
use Modules\Grave\Http\Services\GraveService;

class GraveController extends Controller
{
    /**
     * @var GraveService
     */
    private $graveService;

    public function __construct(
        GraveService $graveService
    )
    {
        $this->graveService = $graveService;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return $this->graveService->getAllGraves();
    }


    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return GraveService
     */
    public function store(GraveRequest $request)
    {
        return $this->graveService->createNewGrave($request->all());
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return $this->graveService->getGraveById($id);
    }


    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(GraveRequest $request, $id)
    {
        return $this->graveService->editGrave($request->all(), $id);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        return $this->graveService->deleteGraveById($id);
    }

    public function gravesOfUser($user_id)
    {
        return $this->graveService->getGravesByUserId($user_id);
    }
}

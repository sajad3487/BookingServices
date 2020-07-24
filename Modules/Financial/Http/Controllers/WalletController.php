<?php

namespace Modules\Financial\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Financial\Http\Requests\WalletRequest;
use Modules\Financial\Http\Services\WalletService;

class WalletController extends Controller
{
    /**
     * @var WalletService
     */
    private $walletService;

    public function __construct(
        WalletService $walletService
    )
    {
        $this->walletService = $walletService;
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(WalletRequest $request)
    {
        $user_id = auth()->id();
        $wallet = $this->walletService->getWalletInfo($user_id)->toArray();
        if (isset($wallet)){
            return \response('error',404);
        }
        return $this->walletService->createNewWallet($request->all());
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show()
    {
        $user_id = auth()->id();
        return $this->walletService->getWalletInfo($user_id);
    }


    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(WalletRequest $request)
    {
        $user_id = auth()->id();
        $wallet = $this->walletService->getWalletInfo($user_id)->toArray();
        if (!isset($wallet) || $wallet == null){
            return \response('error',404);
        }
        return $this->walletService->updateWallet($request->all(),$wallet['id']);
    }
}

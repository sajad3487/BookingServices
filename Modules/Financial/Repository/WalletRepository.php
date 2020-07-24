<?php


namespace Modules\Financial\Repository;


use App\DesignPatterns\Repository;
use Modules\Financial\Entities\wallet;

class WalletRepository extends Repository
{
    public function __construct(
    )
    {
        $this->model = new Wallet();
    }

    public function getByUserId ($user_id){
        return wallet::where('user_id',$user_id)
            ->with('user')
            ->with('user.transaction')
            ->first();
    }
}

<?php


namespace Modules\Financial\Http\Services;


use Modules\Financial\Repository\WalletRepository;

class WalletService
{
    /**
     * @var WalletRepository
     */
    private $walletRepo;

    public function __construct(
        WalletRepository $walletRepository
    )
    {
        $this->walletRepo = $walletRepository;
    }

    public function createNewWallet ($data){
        return $this->walletRepo->create($data);
    }

    public function getWalletInfo ($user_id){
        return $this->walletRepo->getByUserId($user_id);
    }

    public function updateWallet ($data,$id){
        return $this->walletRepo->update($data,$id);
    }
}

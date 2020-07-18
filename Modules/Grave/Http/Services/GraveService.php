<?php


namespace Modules\Grave\Http\Services;


use Modules\Grave\Repository\GraveRepository;

class GraveService
{
    /**
     * @var GraveRepository
     */
    private $graveRepo;

    public function __construct(
        GraveRepository $graveRepository
    )
    {
        $this->graveRepo = $graveRepository;
    }

    public function getAllGraves()
    {
        return $this->graveRepo->getAll();
    }

    public function getGravesByUserId($user_id)
    {
        return $this->graveRepo->getGraveWithUserId($user_id);
    }

    public function createNewGrave($data)
    {
        return $this->graveRepo->create($data);
    }

    public function getGraveById($id)
    {
        return $this->graveRepo->getById($id);
    }

    public function editGrave($data, $id)
    {
        return $this->graveRepo->update($data, $id);
    }

    public function deleteGraveById($id)
    {
        return $this->graveRepo->delete($id);
    }
}

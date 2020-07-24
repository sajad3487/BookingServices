<?php


namespace Modules\Category\Http\Services;


use Modules\Category\Repository\CategoryRepository;

class CategoryService
{
    /**
     * @var CategoryRepository
     */
    private $categoryRepo;

    public function __construct(
        CategoryRepository $categoryRepository
    )
    {
        $this->categoryRepo = $categoryRepository;
    }

    public function createNewCategory ($data){
        return $this->categoryRepo->create($data);
    }

    public function getAllCategory(){
        return $this->categoryRepo->getAllTreeCategory();
    }

    public function getCategoryById ($id){
        return $this->categoryRepo->getById($id);
    }

    public function updateCategory ($data,$id){
        return $this->categoryRepo->update($data,$id);
    }

    public function deleteCategory ($id){
        return $this->categoryRepo->delete($id);
    }

    public function getPublicCategory (){
        return $this->categoryRepo->getActivePublicCategory();
    }

}

<?php


namespace Modules\Category\Repository;


use App\DesignPatterns\Repository;
use Modules\Category\Entities\category;

class CategoryRepository extends Repository
{
    public function __construct()
    {
        $this->model = new category();
    }

    public function getAllTreeCategory (){
        return category::where('parent_id',0)
            ->with('child')
            ->with('child.grandchild')
            ->get();
    }

    public function getActivePublicCategory (){
        return category::where('parent_id',0)
            ->where('status',1)
            ->where('public',1)
            ->with('child')
            ->with('child.grandchild')
            ->get();
    }
}

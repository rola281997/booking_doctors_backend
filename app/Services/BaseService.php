<?php 

namespace App\Services;

use Illuminate\Support\Facades\Hash;
use Ramsey\Uuid\Type\Integer;

class BaseService
{
    public function find(int $id,object $modelRepository):?object{
       return $modelRepository->find($id);
    }
    public function findWhereFirst(array $condition,object $modelRepository) :?object
    {
        return $modelRepository->findWhere($condition)->first();
    }

    public function findWhere(array $condition,object $modelRepository) :?object
    {
        return $modelRepository->findWhere($condition);
    }
   
}

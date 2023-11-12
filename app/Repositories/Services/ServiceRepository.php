<?php

namespace App\Repositories\Services;

use App\Models\Service;
use Prettus\Repository\Eloquent\BaseRepository;
class ServiceRepository extends BaseRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Service::class;
    }

}

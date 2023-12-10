<?php

namespace App\Repositories\Admins;

use App\Models\Admin;
use Prettus\Repository\Eloquent\BaseRepository;
class AdminRepository extends BaseRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Admin::class;
    }

}

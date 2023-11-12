<?php

namespace App\Repositories\Doctors;

use App\Models\Doctor;
use Prettus\Repository\Eloquent\BaseRepository;
class DoctorRepository extends BaseRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Doctor::class;
    }

}

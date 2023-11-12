<?php

namespace App\Repositories\Doctors;

use App\Models\Doctor;
use App\Models\DoctorTimeOff;
use Prettus\Repository\Eloquent\BaseRepository;
class DoctorTimeOffRepository extends BaseRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return DoctorTimeOff::class;
    }

}

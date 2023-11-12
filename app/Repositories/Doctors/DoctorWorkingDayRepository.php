<?php

namespace App\Repositories\Doctors;

use App\Models\DoctorWorkingDay;
use Prettus\Repository\Eloquent\BaseRepository;
class DoctorWorkingDayRepository extends BaseRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return DoctorWorkingDay::class;
    }

}

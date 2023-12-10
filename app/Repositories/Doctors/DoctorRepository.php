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
    public function generateUniqueServerFileName($realFileName)
    {
        $fileName = 'DP' . '_' . time() . '_' . uniqid() . '_' . $realFileName;
        if (count(Doctor::where('photo', $fileName)->get()) > 0) {
            $this->generateUniqueServerFileName($realFileName);
        }
        return $fileName;
    }
    public function syncService(object $doctor,array $services):array{
        return $doctor->services()->sync($services);
    }

}

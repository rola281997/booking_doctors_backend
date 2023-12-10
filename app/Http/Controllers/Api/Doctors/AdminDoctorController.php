<?php

namespace App\Http\Controllers\Api\Doctors;

use App\Helpers\ResponseHelper;
use App\Http\Requests\Doctors\DoctorCreateRequest;
use App\Http\Requests\Doctors\DoctorUpdateRequest;
use App\Services\Doctors\Admin\DoctorService;
use App\Transformers\Doctors\DoctorCreateResource;
use App\Transformers\Services\ServiceCreateResource;
use App\Transformers\Services\ServiceResource;
use Exception;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class AdminDoctorController extends BaseController
{
    use ResponseHelper;
    protected $doctorService;
    
    public function __construct(DoctorService $doctorService)
    {
        $this->doctorService = $doctorService;
    }
    public function store(DoctorCreateRequest $request)
    {
        try {
            DB::beginTransaction();
            $doctor = $this->doctorService->create($request->all());
            DB::commit();
            return (!$doctor)
            ? $this->error(Response::HTTP_BAD_REQUEST, false, 'Error during creation', 'Error during creation')
            : $this->apiJson(Response::HTTP_OK, true, DoctorCreateResource::make($doctor), 'Success');
        } catch (Exception $e) {
            DB::rollBack();
            return $this->error(Response::HTTP_BAD_REQUEST, false, 'Something is wrong', 'Something is wrong');
        }
    }



}

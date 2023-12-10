<?php

namespace App\Http\Controllers\Api\Services;

use App\Helpers\ResponseHelper;
use App\Http\Requests\Services\ServiceCreateRequest;
use App\Http\Requests\Services\ServiceUpdateRequest;
use App\Services\Services\Admin\ServiceService;
use App\Transformers\Services\ServiceCreateResource;
use App\Transformers\Services\ServiceResource;
use Exception;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class AdminServiceController extends BaseController
{
    use ResponseHelper;
    protected $serviceService;

    public function __construct(ServiceService $serviceService)
    {
        $this->serviceService = $serviceService;
    }
    public function store(ServiceCreateRequest $request)
    {
        try {
            DB::beginTransaction();
            $service = $this->serviceService->create($request->all());
            DB::commit();
            return (!$service)
            ? $this->error(Response::HTTP_BAD_REQUEST, false, 'Error during creation', 'Error during creation')
            : $this->apiJson(Response::HTTP_OK, true, ServiceCreateResource::make($service), 'Success');
        } catch (Exception $e) {
            DB::rollBack();
            return $this->error(Response::HTTP_BAD_REQUEST, false, 'Something is wrong', 'Something is wrong');
        }
    }

    public function update(ServiceUpdateRequest $request, $id)
    {
        try {
            DB::beginTransaction();
            $service = $this->serviceService->update($request->all(), $id);
            DB::commit();
            return (!$service)
            ? $this->error(Response::HTTP_BAD_REQUEST, false, 'Error during updating', 'Error during updating')
            : $this->apiJson(Response::HTTP_OK, true, ServiceCreateResource::make($service), 'Success');
        } catch (Exception $e) {
            DB::rollBack();
            return $this->error(Response::HTTP_BAD_REQUEST, false, 'Something is wrong', 'Something is wrong');
        }
    }
    public function show($id)
    {
        try {
            $service = $this->serviceService->find($id);
            return (!$service)
            ? $this->error(Response::HTTP_NOT_FOUND, false, 'Not Found', 'Not Found')
            : $this->apiJson(Response::HTTP_OK, true, ServiceResource::make($service), 'Success');
        } catch (Exception $e) {
            return $this->error(Response::HTTP_NOT_FOUND, false, 'Something is wrong', 'Something is wrong');
        }
    }
    public function destroy($id)
    {
        try {
            DB::beginTransaction();
            $service = $this->serviceService->delete($id);
            DB::commit();
            return (!$service)
            ? $this->error(Response::HTTP_BAD_REQUEST, false, 'Error during Deletion', 'Error during Deletion')
            : $this->apiJson(Response::HTTP_OK, true, [], 'Success');
        } catch (Exception $e) {
            DB::rollBack();
            return $this->error(Response::HTTP_BAD_REQUEST, false, 'Something is wrong', 'Something is wrong');
        }
    }
}

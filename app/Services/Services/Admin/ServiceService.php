<?php

namespace App\Services\Services\Admin;

use App\Repositories\Services\ServiceRepository;
use App\Services\BaseService;
use Illuminate\Support\Facades\App;

class ServiceService
{

    protected $serviceRepository, $baseService;
    public function __construct(ServiceRepository $serviceRepository, BaseService $baseService)
    {
        $this->serviceRepository = $serviceRepository;
        $this->baseService = $baseService;
    }

    public function create(array $request):?object
    {
        $serviceData = $this->handleServiceData($request);
        return $this->serviceRepository->create($serviceData);
    }
    public function update(array $request, $id): ?object
    {
        $serviceData = $this->handleServiceData($request);
        if (count($serviceData) > 0) {
            return $this->serviceRepository->update($serviceData, $id);
        }
        return null;
    }
    public function find($id): ?object
    {

        return $this->baseService->find($id, $this->serviceRepository);

    }
    public function delete($id): ?bool
    {
        return $this->serviceRepository->delete($id);
    }
    private function handleServiceData(array $request): array
    {
        $serviceData = [];
        if (isset($request['name'])) {
            $serviceData['name'] = $request['name'];
        }
        if (isset($request['description'])) {
            $serviceData['description'] = $request['description'];
        }
        return $serviceData;
    }

}

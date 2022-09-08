<?php

namespace Modules\Admin\Controllers;

use App\Exceptions\DDException;
use App\Helpers\LogHelper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Admin\Requests\SearchRequest;
use Illuminate\Http\Response;
use Modules\Admin\Models\Service;
use Modules\Admin\Requests\ServiceRequest;
use Modules\Admin\Resources\ServiceResource;
use Modules\Admin\Services\ServiceService;

class ServiceController extends Controller
{
    /**
     * @var \Modules\Admin\Services\ServiceService $serviceService ServiceService.
     */
    protected $serviceService;

    /**
     * Admin controller construct.
     *
     * @param ServiceService $serviceService ServiceService.
     */
    public function __construct(
        ServiceService $serviceService
    )
    {
        $this->serviceService = $serviceService;
    }

    /**
     * Display a listing of the resource.
     *
     * @param SearchRequest $request SearchRequest param from FE.
     * @return mixed
     */
    public function index(SearchRequest $request)
    {
        try {
            $data = $request->all();
            $services = $this->serviceService->getData($data);
            $result = ServiceResource::collection($services);

            return response()->success($result);
        } catch (DDException $ex) {
            LogHelper::logTrace($ex);

            return response()->failure($ex->getMessage());
        }
    }

     /**
     * Store a newly created resource in storage.
     *
     * @param ServiceRequest $request Request.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(ServiceRequest $request)
    {
        try {
            $service = $this->serviceService->createService($request);

            $result = new ServiceResource($service);

            return response()->success($result);
        } catch (DDException $ex) {
            LogHelper::logTrace($ex);

            return response()->failure($ex->getMessage());
        }
    }

    /**
     * Show a resource in storage by id.
     *
     * @param Service $service Service.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        try {
            $service = $this->serviceService->findService($service->id);

            $result = new ServiceResource($service);

            return response()->success($result);
        } catch (DDException $ex) {
            LogHelper::logTrace($ex);

            return response()->failure($ex->getMessage());
        }
    }

     /**
     * Update a resource in storage by id.
     *
     * @param Service        $service Service.
     * @param ServiceRequest $request Request.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Service $service, ServiceRequest $request)
    {
        try {
            $service = $this->serviceService->updateService($service->id, $request);

            $result = new ServiceResource($service);

            return response()->success($result);
        } catch (DDException $ex) {
            LogHelper::logTrace($ex);

            return response()->failure($ex->getMessage());
        }
    }

    /**
     * Delete a resource in storage by id.
     *
     * @param Service $service Service.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        try {
            $service = $this->serviceService->destroyService($service->id);

            return response()->success($service);
        } catch (DDException $ex) {
            LogHelper::logTrace($ex);

            return response()->failure($ex->getMessage());
        }
    }
}

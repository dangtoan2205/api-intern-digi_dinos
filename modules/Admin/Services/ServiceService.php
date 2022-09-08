<?php

namespace Modules\Admin\Services;

use App\Exceptions\DDException;
use App\Helpers\LogHelper;
use App\Services\BaseService;
use DB;
use Modules\Admin\Models\Service;
use Modules\Admin\Repositories\ServiceRepository;

class ServiceService extends BaseService
{
    /**
     * Construct
     *
     * @param ServiceRepository $repository ServiceRepository.
     *
     * @return void
     */
    public function __construct(
        ServiceRepository $repository
    )
    {
        parent::__construct();
        $this->repository = $repository;
    }

    /**
     * GetRepository
     *
     * @return object
     */
    public function getRepository()
    {
        return $this->repository;
    }


    /**
     * @return Service
     */
    public function getModel()
    {
        return Service::class;
    }

    /**
     * Display a listing of the resource.
     *
     * @param mixed $data Data.
     *
     * @return Service $service
     */
    public function getData($data)
    {
        try {
            return $this->repository->list($data);
        } catch (DDException $th) {
            LogHelper::logTrace($th);

            throw $th;
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return Service $service
     */
    public function getServicePCTop()
    {
        try {
            return $this->repository->getServicePCTop();
        } catch (DDException $th) {
            LogHelper::logTrace($th);

            throw $th;
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return Service $service
     */
    public function getServicePCBottom()
    {
        try {
            return $this->repository->getServicePCBottom();
        } catch (DDException $th) {
            LogHelper::logTrace($th);

            throw $th;
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return Service $service
     */
    public function getServiceMobile()
    {
        try {
            return $this->repository->getServiceMobile();
        } catch (DDException $th) {
            LogHelper::logTrace($th);

            throw $th;
        }
    }
    /**
     * Create a new resource in storage.
     *
     * @param mixed $request Request.
     *
     * @return Service $service
     */
    public function createService($request)
    {
        try {
            return $this->repository->createService($request);
        } catch (DDException $th) {
            LogHelper::logTrace($th);

            throw $th;
        }
    }

    /**
     * Find resource in storage.
     *
     * @param mixed $id ID.
     *
     * @return Service $service
     */
    public function findService($id)
    {
        try {
            return $this->repository->findService($id);
        } catch (DDException $th) {
            LogHelper::logTrace($th);

            throw $th;
        }
    }

    /**
     * Update resource in storage.
     *
     * @param mixed $id      ID.
     * @param mixed $request Request.
     *
     * @return Service $service
     */
    public function updateService($id, $request)
    {
        try {
            return $this->repository->updateService($id, $request);
        } catch (DDException $th) {
            LogHelper::logTrace($th);

            throw $th;
        }
    }

     /**
     * Delete resource in storage.
     *
     * @param mixed $id ID.
     *
     * @return Service $service
     */
    public function destroyService($id)
    {
        try {
            return $this->repository->destroyService($id);
        } catch (DDException $th) {
            LogHelper::logTrace($th);

            throw $th;
        }
    }
}

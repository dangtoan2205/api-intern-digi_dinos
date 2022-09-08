<?php

namespace Modules\Admin\Services;

use App\Services\BaseService;
use Modules\Admin\Repositories\PermistionRepository;
use Spatie\Permission\Models\Permission;

class PermistionService extends BaseService
{
    /**
     * Construct
     *
     * @param PermistionRepository $repository PermistionRepository.
     *
     * @return void
     */
    public function __construct(
        PermistionRepository $repository
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
     * @return Permission
     */
    public function getModel()
    {
        return Permission::class;
    }

    /**
     * Search List Permission
     *
     * @param mixed $data Datasearch.
     *
     * @return Permission $permission
     */
    public function list($data)
    {
        return $this->repository->list($data);
    }

    /**
     * Create Permission Permission
     *
     * @param mixed $request Request.
     *
     * @return Permission $permission
     */
    public function createPermistion($request)
    {
        return $this->repository->createPermistion($request);
    }

    /**
     * Delete Permission Permission
     *
     * @param mixed $id Id.
     *
     * @return Permission $permission
     */
    public function delete($id)
    {
        return $this->repository->deletePermistion($id);
    }

    /**
     * Delete Permission Permission
     *
     * @param mixed $id Id.
     *
     * @return Permission $permission
     */
    public function show($id)
    {
        return $this->repository->showPermistion($id);
    }

    /**
     * Update Permission Permission
     *
     * @param mixed $request Request.
     * @param mixed $id      Id.
     *
     * @return Permission $permission
     */
    public function editPermistion($request, $id)
    {
        \Log::info($request->all());
        return $this->repository->editPermistion($request, $id);
    }
}

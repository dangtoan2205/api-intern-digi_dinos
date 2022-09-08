<?php

namespace Modules\Admin\Services;

use App\Services\BaseService;
use Modules\Admin\Repositories\RoleRepository;
use Spatie\Permission\Models\Role;

class RoleService extends BaseService
{
    /**
     * Construct
     *
     * @param RoleRepository $repository RoleRepository.
     *
     * @return void
     */
    public function __construct(
        RoleRepository $repository
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
     * @return Role
     */
    public function getModel()
    {
        return Role::class;
    }

    /**
     * Search List Role
     *
     * @param mixed $data Datasearch.
     *
     * @return Role $roles
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
    public function createRole($request)
    {
        return $this->repository->createRole($request);
    }

    /**
     * Delete Permission Permission
     *
     * @param mixed $id Id.
     *
     * @return Role $role
     */
    public function delete($id)
    {
        return $this->repository->deleteRole($id);
    }

    /**
     * Show Role
     *
     * @param mixed $id Id.
     *
     * @return Role $role
     */
    public function show($id)
    {
        return $this->repository->showRole($id);
    }

    /**
     * Update Permission Permission
     *
     * @param mixed $request Request.
     * @param mixed $id      Id.
     *
     * @return Permission $permission
     */
    public function editRole($request, $id)
    {
        return $this->repository->editRole($request, $id);
    }

    /**
     * Show Permission
     *
     * @param mixed $request Request.
     *
     * @return Permission $permission
     */
    public function showPermistion($request)
    {
        return $this->repository->showPermistion($request);
    }
}

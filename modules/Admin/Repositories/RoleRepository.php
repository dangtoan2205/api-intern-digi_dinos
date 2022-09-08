<?php

namespace Modules\Admin\Repositories;

use App\Repositories\BaseRepository;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Session;

class RoleRepository extends BaseRepository
{

    /**
     * @return Role
     */
    public function getModel()
    {
        return Role::class;
    }

    /**
     * @param mixed $query  Query.
     * @param mixed $column Column.
     * @param mixed $data   Data.
     *
     * @return Query
     */
    public function search($query, $column, $data)
    {
        switch ($column) {
            case 'id':
            case 'created_at':
                return $query->with('permissions')->where($column, 'like', '%'.$data.'%');
            case 'name':
                return $query->with('permissions')->where($column, 'like', '%'.$data.'%');
            case 'guard_name':
                return $query->with('permissions')->where($column, 'like', '%'.$data.'%');
            default:
                return $query;
        }
    }

    /**
     * Create Permission
     *
     * @param mixed $request Request.
     *
     * @return Role
     */
    public function createRole($request)
    {
        $role = $this->model->create([
            'name' => $request->name,
            'guard_name' => $request->guard_name == 1 ? 'admin' : 'web',
        ]);
        $permissiones = Permission::find($request->permistion);
        $role->syncPermissions($permissiones);
        return $role;
    }

    /**
     * Delete Role
     *
     * @param mixed $id Id.
     *
     * @return Role
     */
    public function deleteRole($id)
    {
        $role = $this->model->find($id);
        $role->delete();
        return $role;
    }

    /**
     * Show Role
     *
     * @param mixed $id Id.
     *
     * @return Role
     */
    public function showRole($id)
    {
        $role = $this->model->where('id', $id)->first();
        $rolePermission = $role->permissions->pluck('id');
        $guardName = $role->guard_name;
        $permissiones = Permission::where('guard_name', $guardName)->get();

        $data = [
            'name' => $role->name,
            'guard_name' => $role->guard_name,
            'rolePermission' => $rolePermission,
            'permissiones' => $permissiones
        ];

        return $data;
    }

    /**
     * Update Role
     *
     * @param mixed $request Request.
     * @param mixed $id      Id.
     *
     * @return Role
     */
    public function editRole($request, $id)
    {
        $role = $this->model->find($id);
        $role->update([
            'name' => $request->name,
            'guard_name' => $request->guard_name,
        ]);
        $permissiones = Permission::find($request->permistion);
        $role->syncPermissions($permissiones);
        return $role;
    }

    /**
     * Show role Permissions
     *
     *  @param mixed $request Request.
     *
     * @return $permissions
     */
    public function showPermistion($request)
    {
        $permission = Permission::where('guard_name', $request->namePer)->get();
        return $permission;
    }
}

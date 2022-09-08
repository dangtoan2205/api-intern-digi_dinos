<?php

namespace Modules\Admin\Repositories;

use App\Repositories\BaseRepository;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Modules\Admin\Models\Admin;
use Session;

class UserRoleRepository extends BaseRepository
{

    /**
     * @return Admin
     */
    public function getModel()
    {
        return Admin::class;
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
                return $query->where($column, 'like', '%'.$data.'%');
            case 'username':
                return $query->where($column, 'like', '%'.$data.'%');
            case 'name':
                return $query->join('model_has_roles', 'model_has_roles.model_id', '=', 'admins.id')
                ->join('roles', 'roles.id', '=', 'model_has_roles.role_id')
                ->where('roles.' . $column, 'like', '%'.$data.'%');
            default:
                return $query;
        }
    }

    /**
     * Create User Role
     *
     * @param mixed $request Request.
     *
     * @return $role
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
     * Delete User Role
     *
     * @param mixed $id Id.
     *
     * @return $role
     */
    public function deleteRole($id)
    {
        $role = $this->model->find($id);
        $role->delete();

        return $role;
    }

    /**
     * Show User Role
     *
     * @param mixed $id Id.
     *
     * @return $data User Role
     */
    public function showUserRole($id)
    {
        $user = $this->model->where('id', $id)->first();
        $getAllRole = Role::where('guard_name', 'admin')->pluck('name');
        $getPermission = Permission::where('guard_name', 'web')->pluck('name');
        if (count($user->roles->pluck('guard_name')) != 0) {
            $userRole = $user->roles->pluck('name');
            $data = [
                'userName' => $user->username,
                'userRole' => $userRole,
                'guard_name' => 1,
                'allRole' => $getAllRole
            ];

            return $data;
        } else {
            $userRole = $user->permissions->pluck('name');
            $data = [
                'userName' => $user->username,
                'userRole' => $userRole,
                'guard_name' => 0,
                'allRole' => $getPermission
            ];

            return $data;
        }
    }

    /**
     * Update User Role
     *
     * @param mixed $request Request.
     * @param mixed $id      Id.
     *
     * @return $updateRoleAcc User role.
     */
    public function editRole($request, $id)
    {
        $updateRoleAcc = $this->model->find($id);
        if ($request->guardName == 1) {
            $updateRoleAcc->syncRoles($request->roles);
        } else {
            $updateRoleAcc->syncPermissions($request->roles);
        }
        return $updateRoleAcc;
    }

    /**
     * Show  User Permission
     *
     * @param mixed $request Request.
     *
     * @return $updateRoleAcc User permission.
     */
    public function showPermistion($request)
    {
        $user = $this->model->where('id', $request->id)->first();
        $getAllRole = Role::where('guard_name', 'admin')->pluck('name');
        $getPermission = Permission::where('guard_name', 'web')->pluck('name');
        if ($request->nameGuard == "admin") {
            $userRole = $user->roles->pluck('name');
            $data = [
                'userName' => $user->username,
                'userRole' => $userRole,
                'guard_name' => 1,
                'allRole' => $getAllRole
            ];
            return $data;
        } else {
            $userRole = $user->permissions->pluck('name');
            $data = [
                'userName' => $user->username,
                'userRole' => $userRole,
                'guard_name' => 0,
                'allRole' => $getPermission
            ];
            return $data;
        }
    }
}

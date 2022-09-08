<?php

namespace Modules\Admin\Repositories;

use App\Repositories\BaseRepository;
use Spatie\Permission\Models\Permission;
use Session;

class PermistionRepository extends BaseRepository
{

    /**
     * @return  Permission
     */
    public function getModel()
    {
        return Permission::class;
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
                return $query->whereDate($column, $data);
            case 'name':
                return $query->where($column, 'like', '%'.$data.'%');
            case 'guard_name':
                return $query->where($column, 'like', '%'.$data.'%');
            default:
                return $query;
        }
    }

    /**
     * Create Permission
     *
     * @param mixed $request Request.
     *
     * @return Permission
     */
    public function createPermistion($request)
    {
        $permission = $this->model->create([
            'name' => $request->name,
            'guard_name' => $request->guard_name == 1 ? 'admin' : 'web',
        ]);

        return $permission;
    }

    /**
     * Delete Permission
     *
     * @param mixed $id Id.
     *
     * @return Permission
     */
    public function deletePermistion($id)
    {
        $permission = $this->model->find($id);
        $permission->delete();
        return $permission;
    }

    /**
     * Show Permission
     *
     * @param mixed $id Id.
     *
     * @return Permission
     */
    public function showPermistion($id)
    {
        $permission = $this->model->find($id);
        return $permission;
    }

    /**
     * Update Permission
     *
     * @param mixed $request Request.
     * @param mixed $id      Id.
     *
     * @return Permission
     */
    public function editPermistion($request, $id)
    {
        $permission = $this->model->find($id);
        $permission->update([
            'name' => $request->name,
            'guard_name' => $request->guard_name == 1 ? 'admin' : 'web',
        ]);

        return $permission;
    }
}

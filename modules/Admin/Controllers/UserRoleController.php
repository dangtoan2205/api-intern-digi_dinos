<?php

namespace Modules\Admin\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Admin\Services\UserRoleService;
use Spatie\Permission\Models\Role;
use Modules\Admin\Requests\SearchRequest;
use Modules\Admin\Models\Admin;

class UserRoleController extends Controller
{
    /**
     * @var \Modules\Admin\Services\UserRoleService $userRoleService UserRoleService.
     */
    protected $userRoleService;

    /**
     * UserRole controller construct.
     *
     * @param UserRoleService $userRoleService UserRoleService.
     */
    public function __construct(
        UserRoleService $userRoleService
    )
    {
        $this->userRoleService = $userRoleService;
    }

    /**
     * Display a listing of the resource.
     *
     * @param SearchRequest $request SearchRequest.
     * @return mixed
     */
    public function index(SearchRequest $request)
    {
        try {
            $userRoles = $this->userRoleService->list($request->all());
            foreach ($userRoles as $userRole) {
                $userPermission = $userRole->permissions->pluck('name')->toArray();
                foreach ($userRole->roles as $role) {
                    $role = $role->setAttribute('permission', $role->permissions->pluck('name'));
                }
            }
            $userRoles = $userRoles->toArray();

            return response()->success($userRoles);
        } catch (DDException $ex) {
            LogHelper::logTrace($ex);

            return response()->failure($ex->getMessage());
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request Request.
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        try {
            $permissions = $this->userRoleService->showPermistion($request);
            return response()->success($permissions);
        } catch (DDException $ex) {
            LogHelper::logTrace($ex);

            return response()->failure($ex->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  mixed $id Id.
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $data = $this->userRoleService->show($id);
            return response()->success($data);
        } catch (DDException $ex) {
            LogHelper::logTrace($ex);

            return response()->failure($ex->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request Request.
     * @param  mixed                    $id      Id.
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $role = $this->userRoleService->editRole($request, $id);

        if ($role) {
            $data = [
                'mess' => 'Update Successfully',
            ];
            return response()->json($data, 200);
        } else {
            return response()->json(['messer' => 'Update Failed']);
        }
    }
}

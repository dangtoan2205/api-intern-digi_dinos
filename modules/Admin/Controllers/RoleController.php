<?php

namespace Modules\Admin\Controllers;

use Illuminate\Http\Request;
use Modules\Admin\Requests\PermistionRequest;
use Tymon\JWTAuth\JWT;
use Tymon\JWTAuth\JWTAuth;
use App\Exceptions\DDException;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Modules\Admin\Resources\RoleResource;
use App\Helpers\LogHelper;
use App\Http\Controllers\Controller;
use Modules\Admin\Services\RoleService;
use Modules\Admin\Requests\RoleRequest;
use Modules\Admin\Requests\SearchRequest;

class RoleController extends Controller
{
    /**
     * @var \Modules\Admin\Services\RoleService $roleService RoleService.
     */
    protected $roleService;

    /**
     * Admin controller construct.
     *
     * @param RoleService $roleService RoleService.
     */
    public function __construct(
        RoleService $roleService
    )
    {
        $this->roleService = $roleService;
    }

    /**
     * Display a listing of the resource.
     *
     * @param SearchRequest $request SearchRequest.
     *
     * @return mixed
     */
    public function index(SearchRequest $request)
    {
        try {
            $data = $request->all();
            $roles = $this->roleService->list($data);
            foreach ($roles as $permission) {
                $permission->setAttribute('permission', $permission->permissions);
            }
            $roles = $roles->toArray();
            return response()->success($roles);
        } catch (DDException $ex) {
            LogHelper::logTrace($ex);

            return response()->failure($ex->getMessage());
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request Request param from FE.
     * @return mixed
     */
    public function create(Request $request)
    {
        try {
            $permission = $this->roleService->showPermistion($request);
            $result = RoleResource::collection($permission);

            return response()->success($result);
        } catch (DDException $ex) {
            LogHelper::logTrace($ex);

            return response()->failure($ex->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param RoleRequest $request Request.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(RoleRequest $request)
    {
        $role = $this->roleService->createRole($request);
        if ($role) {
            $data = [
                'mess' => 'Create Successfully',
            ];
            return response()->json($data, 200);
        } else {
            return response()->json(['messer' => 'Create Failed']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  mixed $id ID.
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $data = $this->roleService->show($id);
            return response()->success($data);
        } catch (DDException $ex) {
            LogHelper::logTrace($ex);

            return response()->failure($ex->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param RoleRequest $request Request.
     * @param mixed       $id      Id.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(RoleRequest $request, $id)
    {
        $role = $this->roleService->editRole($request, $id);

        if ($role) {
            $data = [
                'mess' => 'Update Successfully',
            ];
            return response()->json($data, 200);
        } else {
            return response()->json(['messer' => 'Update Failed']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param mixed $id Id.
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $result = $this->roleService->delete($id);
            return response()->success($result);
        } catch (DDException $ex) {
            LogHelper::logTrace($ex);

            return response()->failure($ex->getMessage());
        }
    }
}

<?php

namespace Modules\Admin\Controllers;

use App\Exceptions\DDException;
use App\Helpers\LogHelper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Admin\Requests\SearchRequest;
use Modules\Admin\Requests\AuthRequest;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Modules\Admin\Models\Admin;
use Modules\Admin\Requests\AdminRequest;
use Modules\Admin\Resources\AdminResource;
use Modules\Admin\Services\AdminService;

class AdminController extends Controller
{
    /**
     * @var \Modules\Admin\Services\AdminService $adminService AdminService.
     */
    protected $adminService;

    /**
     * Admin controller construct.
     *
     * @param AdminService $adminService AdminService.
     */
    public function __construct(
        AdminService $adminService
    )
    {
        $this->adminService = $adminService;
    }

    /**
     * Display a listing of the resource.
     *
     * @param SearchRequest $request SearchRequest.
     * @return mixed
     */
    public function index(Request $request)
    {
        try {
            $admins = $this->adminService->list($request);
            $result = AdminResource::collection($admins);

            return response()->success($result);
        } catch (DDException $ex) {
            LogHelper::logTrace($ex);

            return response()->failure($ex->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param AdminRequest $request Request.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $isExistEmail = $this->adminService->isExistEmail($request->email);
            if ($isExistEmail) {
                return response()->failure(self::DUPLICATE_EMAIL);
            }
            $admin = $this->adminService->register($request);

            $result = new AdminResource($admin);

            return response()->success($result);
        } catch (DDException $ex) {
            LogHelper::logTrace($ex);

            return response()->failure($ex->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param Admin $admin Admin.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        try {
            $result = new AdminResource($admin);
            return response()->success($result);
        } catch (DDException $ex) {
            LogHelper::logTrace($ex);

            return response()->failure($ex->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param AdminRequest $request Request.
     * @param Admin        $admin   Admin.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(AdminRequest $request, Admin $admin)
    {
        try {
            $input = $request->all();
            $isCheckedEmail = $this->adminService->checkDuplicateEmail($input['email'], $admin->id);
            if ($isCheckedEmail) {
                return response()->failure(self::DUPLICATE_EMAIL);
            }
            $res = $this->adminService->update($request, $admin->id);

            $result = new AdminResource($res);

            return response()->success($result);
        } catch (DDException $ex) {
            LogHelper::logTrace($ex);

            return response()->failure($ex->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param integer $id ID.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        try {
            $result = $this->adminService->destroy($id);
            return response()->success($result);
        } catch (DDException $ex) {
            LogHelper::logTrace($ex);

            return response()->failure($ex->getMessage());
        }
    }

    /**
     * Login admin.
     *
     * @param AuthRequest $request AuthRequest.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(AuthRequest $request)
    {
        try {
            if (! $token = auth()->attempt([
                'email' => $request->email,
                'password' => $request->password,
                'is_active' => self::ACTIVE,
            ])) {
                // Authentication was failure...
                return response()->failure('Email and/or password invalid.', self::LOGIN);
            }

            return response()->success(['access_token' => $token]);
        } catch (DDException $ex) {
            LogHelper::logTrace($ex);

            return response()->failure($ex->getMessage());
        }
    }

    /**
     * Logout admin.
     *
     * @return Response
     */
    public function logout()
    {
        try {
            auth()->logout();

            return response()->success(null);
        } catch (DDException $ex) {
            LogHelper::logTrace($ex);

            return response()->failure($ex->getMessage());
        }
    }

    /**
     * Get auth admin info.
     *
     * @return AdminResource
     */
    public function getProfile()
    {
        try {
            $admin = auth()->user();
            $result = new AdminResource($admin);

            return response()->success($result);
        } catch (DDException $ex) {
            LogHelper::logTrace($ex);

            return response()->failure($ex->getMessage());
        }
    }

    /**
     * Lock or unlock account
     *
     * @param Request $request Request.
     * @param integer $id      ID.
     *
     * @return Response
     */
    public function lockUnlock(Request $request, int $id)
    {
        try {
            $result = $this->adminService->lockUnlock($request, $id);

            return response()->success($result);
        } catch (DDException $ex) {
            LogHelper::logTrace($ex);

            return response()->failure($ex->getMessage());
        }
    }
}

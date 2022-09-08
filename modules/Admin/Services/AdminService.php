<?php

namespace Modules\Admin\Services;

use App\Exceptions\DDException;
use App\Helpers\LogHelper;
use App\Services\BaseService;
use Illuminate\Support\Facades\DB;
use Modules\Admin\Models\Admin;
use Modules\Admin\Repositories\AdminRepository;
use Modules\Admin\Models\Menu;
use Modules\Admin\Models\Role;

class AdminService extends BaseService
{
    /**
     * Construct
     *
     * @param AdminRepository $repository AdminRepository.
     *
     * @return void
     */
    public function __construct(
        AdminRepository $repository
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
     * @return Admin
     */
    public function getModel()
    {
        return Admin::class;
    }

    /**
     * GetMenus
     *
     * @param  Admin $admin Admin.
     *
     * @return mixed
     */
    public function getMenus(Admin $admin)
    {
        try {
            // if ($admin->hasRole(Role::ADMIN) || ! config('setting.permissions')) {
            //     return Menu::with('menus')->where('parent_id', 0)->orderBy('position', 'asc')->get();
            // }

            $roles = $admin->roles->pluck('id');

            if (! count($roles)) {
                return [];
            }

            $menuIds = DB::table(config('permission.table_names.model_has_roles'))
                ->select(config('permission.column_names.model_morph_key'))
                ->whereIn('role_id', $roles)
                ->where('model_type', Menu::class)
                ->get()
                ->pluck(config('permission.column_names.model_morph_key'));
            if (! count($menuIds)) {
                return [];
            }

            $menus = Menu::whereIn('id', $menuIds)->orderBy('parent_id', 'asc')->orderBy('position', 'asc')->get();

            return $this->recursiveMenu($menus);
        } catch (DDException $th) {
            LogHelper::logTrace($th);

            return response()->failure($th->getMessage());
        }
    }

    /**
     * Recursive menu.
     *
     * @param mixed   $menus    Menus.
     * @param integer $parentId Parent.
     *
     * @return Menu
     */
    public function recursiveMenu($menus = [], int $parentId = 0)
    {
        try {
            return collect($menus)
                ->filter(function ($item) use ($parentId) {
                    return $item->parent_id == $parentId;
                })
                ->map(function ($item) use ($menus) {
                    $item->menus = $this->recursiveMenu($menus, $item->id);

                    return $item;
                })
                ->values();
        } catch (DDException $th) {
            LogHelper::logTrace($th);

            throw $th;
        }
    }

    /**
     *  Check exits code.
     *
     *  @param string $code Code.
     *
     *  @return boolean
     */
    public function isExistCode(string $code)
    {
        try {
            return $this->model->where('code', $code)->exists();
        } catch (DDException $th) {
            LogHelper::logTrace($th);

            throw $th;
        }
    }

    /**
     *  Check exits email.
     *
     *  @param mixed $email Email.
     *
     *  @return boolean
     */
    public function isExistEmail($email)
    {
        try {
            return $this->model->where('email', $email)->exists();
        } catch (DDException $th) {
            LogHelper::logTrace($th);

            throw $th;
        }
    }

    /**
     * Register new admin and assgin role to it.
     *
     * @param mixed $request Request.
     *
     * @return Admin $admin
     */
    public function register($request)
    {
        try {
            $data = $request->all();
            $data['avatar_url'] = $request->avatar_url ? $request->avatar_url : '';
            $data['birtday'] = $request->birtday ? $request->birtday : '';
            $data['gender'] = $request->gender ? $request->gender : '';
            $data['password'] = bcrypt($request->password);
            $data['is_active'] = self::ACTIVE;
            $getImage = $request->file('avatar_url');

            if ($getImage) {
                $nameImage = $getImage->getClientOriginalName();
                $newNameImage = time() . $nameImage;
                $getImage->move('images/avatar', $newNameImage);
            } else {
                $newNameImage = '';
            }

            $data['avatar_url'] = $newNameImage;
            return $this->create($data);
        } catch (DDException $th) {
            LogHelper::logTrace($th);

            throw $th;
        }
    }

    /**
     * Check duplicate code.
     *
     * @param string  $code Code.
     * @param integer $id   ID.
     *
     * @return boolean
     */
    public function checkDuplicateCode(string $code, int $id)
    {
        try {
            $adminUpdate = $this->model->find($id);
            $adminCode = $this->model->where('code', $code)->first();
            if (! $adminCode || $adminUpdate->id === $adminCode->id) {
                return false;
            }

            return $this->isExistCode($code);
        } catch (DDException $th) {
            LogHelper::logTrace($th);

            throw $th;
        }
    }

    /**
     * Check duplicate email.
     *
     * @param string  $email Email.
     * @param integer $id    ID.
     *
     * @return boolean
     */
    public function checkDuplicateEmail(string $email, int $id)
    {
        try {
            $adminUpdate = $this->model->find($id);
            $adminEmail = $this->model->where('email', $email)->first();
            if (! $adminEmail || $adminUpdate->id === $adminEmail->id) {
                return false;
            }

            return $this->isExistEmail($email);
        } catch (DDException $th) {
            LogHelper::logTrace($th);

            throw $th;
        }
    }

    /**
     * Login
     *
     * @param Admin $admin Admin model.
     *
     * @return \App\Models\Admin $admin
     */
    public function login(Admin $admin)
    {
        try {
            $admin = $this->detail($admin);

            $this->updateToken($admin);

            return $admin;
        } catch (DDException $th) {
            LogHelper::logTrace($th);

            throw $th;
        }
    }

    /**
     * Update Token.
     *
     * @param Admin $admin Admin model.
     *
     * @return Admin
     */
    public function updateToken(Admin $admin)
    {
        try {
            $adminToken = $admin->createToken($admin->mobile_no);
            if ($adminToken) {
                $admin->api_token = $adminToken->accessToken;
            }

            return $admin;
        } catch (DDException $th) {
            LogHelper::logTrace($th);

            throw $th;
        }
    }

    /**
     * Check exist account.
     *
     * @return boolean
     */
    public function isExistAccount()
    {
        try {
            $result = false;
            $isExistAccount = $this->model->all()->count();
            if ($isExistAccount > 0) {
                $result = true;
            }

            return $result;
        } catch (DDException $th) {
            LogHelper::logTrace($th);

            throw $th;
        }
    }

    /**
     * Insert account admin
     *
     * @param array   $input       Input.
     * @param integer $accountType AccountType.
     * @param string  $roleType    RoleType.
     *
     * @return void
     */
    public function insertAccountAdmin(array $input, int $accountType, string $roleType)
    {
        try {
            $data = [
                'driver_id' => $input['driver_id'] ?? 0,
                'company_id' => $input['company_id'] ?? 0,
                'name' => $input['name'],
                'username' => $input['name'],
                'mobile_no' => $input['mobile_no'],
                'email' => $input['email'] ?? null,
                'address' => $input['address'] ?? null,
                'password' => bcrypt($input['password_show']),
                'is_active' => config('constant.account_is_active.active'),
                'account_type' => $accountType,
            ];

            $admin = $this->repository->create($data);
            // assign role for account
            $admin->assignRole($roleType);
        } catch (DDException $th) {
            LogHelper::logTrace($th);

            throw $th;
        }
    }

    /**
     * Update account admin
     *
     * @param array $dataUpdateAdmin DataUpdateAdmin.
     *
     * @return void
     */
    public function updateAccountAdmin(array $dataUpdateAdmin)
    {
        try {
            $conditions = [
                'first' => true,
                'account_type' => config('constant.account_type.subAdminCompany'),
            ];
            if (!empty($dataUpdateAdmin['driver_id'])) {
                $conditions['driver_id'] = $dataUpdateAdmin['driver_id'];
            } else {
                $conditions['company_id'] = $dataUpdateAdmin['company_id'];
            }
            $admin = $this->repository->list($conditions);
            $data = [
                'name' => $dataUpdateAdmin['name'],
                'username' => $dataUpdateAdmin['name'],
                'mobile_no' => $dataUpdateAdmin['mobile_no'],
                'email' => $dataUpdateAdmin['email'] ?? null,
                'address' => $dataUpdateAdmin['address'] ?? null,
            ];
            $this->repository->update($admin, $data);
        } catch (DDException $th) {
            LogHelper::logTrace($th);

            throw $th;
        }
    }

    /**
     * Lock or unlock account
     *
     * @param mixed   $request Request.
     * @param integer $id      ID.
     *
     * @return Response
     */
    public function lockUnlock($request, int $id)
    {
        $data = $request->all();
        try {
            $account = $this->model::find($id);
            $result = $this->repository->update($account, $data);

            return $result;
        } catch (DDException $th) {
            LogHelper::logTrace($th);

            throw $th;
        }
    }

    /**
     * List user
     *
     * @param mixed $request Request.
     *
     *@return Reponse
     */
    public function list($request)
    {
        $data = $request->all();
        try {
            $result = $this->repository->list($data);

            return $result;
        } catch (DDException $th) {
            LogHelper::logTrace($th);

            throw $th;
        }
    }

    /**
     * Update account
     *
     * @param mixed   $request Request.
     * @param integer $id      ID.
     *
     * @return Reponse
     */
    public function update($request, int $id)
    {
        try {
            $data = $request->all();
            $account = $this->model::find($id);
            if ($request->file('avatar_url')) {
                $getImage = $request->file('avatar_url');

                if ($getImage) {
                    $nameImage = $getImage->getClientOriginalName();
                    $newNameImage = time() . $nameImage;
                    $getImage->move('images/avatar', $newNameImage);
                } else {
                    $newNameImage = '';
                }

                $data['avatar_url'] = $newNameImage;
            };
            if ($request->has('password')) {
                $data['password'] = bcrypt($request->password);
            }
            return $this->repository->update($account, $data);
        } catch (\Throwable $th) {
            LogHelper::logTrace($th);

            throw $th;
        }
    }
    /**
     * Destroy account
     *
     * @param integer $id ID.
     *
     * @return Reponse
     */
    public function destroy(int $id)
    {
        try {
            $account = $this->model::find($id);
            $result = $this->repository->delete($account);

            return $result;
        } catch (DDException $th) {
            LogHelper::logTrace($th);

            throw $th;
        }
    }
}

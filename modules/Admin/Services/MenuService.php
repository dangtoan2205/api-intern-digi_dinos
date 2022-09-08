<?php

namespace Modules\Admin\Services;

use App\Exceptions\DDException;
use App\Helpers\LogHelper;
use App\Services\BaseService;
use DB;
use Modules\Admin\Models\Menu;
use Modules\Admin\Repositories\MenuRepository;
use Symfony\Component\CssSelector\Node\FunctionNode;

class MenuService extends BaseService
{
    /**
     * Construct
     *
     * @param MenuRepository $menuRepo MenuRepository.
     *
     * @return void
     */
    public function __construct(
        MenuRepository $menuRepo
    )
    {
        parent::__construct();
        $this->menuRepo = $menuRepo;
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
     * @return Menu
     */
    public function getModel()
    {
        return Menu::class;
    }

    /**
     * Display a listing of the resource.
     *
     * @param mixed $data Data.
     *
     * @return Menu $menu
     */
    public function getData($data)
    {
        try {
            return $this->menuRepo->list($data);
        } catch (DDException $th) {
            LogHelper::logTrace($th);

            throw $th;
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Renderable
     */
    public function getMenuByParentId()
    {
        try {
            return $this->menuRepo->getMenuByParentId();
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
     * @return Menu $menu
     */
    public function createMenu($request)
    {
        try {
            return $this->menuRepo->createMenu($request);
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
     * @return Menu $menu
     */
    public function findMenu($id)
    {
        try {
            return $this->menuRepo->findMenu($id);
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
     * @return Menu $menu
     */
    public function updateMenu($id, $request)
    {
        try {
            return $this->menuRepo->updateMenu($id, $request);
        } catch (DDException $th) {
            LogHelper::logTrace($th);

            throw $th;
        }
    }

    /**
     * Update resource in storage.
     *
     * @param mixed $request Request.
     * @return Menu $menu
     */
    public function updatePosition($request)
    {
        try {
            return $this->menuRepo->updatePosition($request);
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
     * @return Menu $menu
     */
    public function destroyMenu($id)
    {
        try {
            return $this->menuRepo->destroyMenu($id);
        } catch (DDException $th) {
            LogHelper::logTrace($th);

            throw $th;
        }
    }
}

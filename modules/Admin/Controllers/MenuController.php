<?php

namespace Modules\Admin\Controllers;

use App\Exceptions\DDException;
use App\Helpers\LogHelper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Admin\Requests\SearchMenuRequest;
use Illuminate\Http\Response;
use Modules\Admin\Models\Menu;
use Modules\Admin\Requests\MenuRequest;
use Modules\Admin\Resources\MenuResource;
use Modules\Admin\Services\MenuService;

class MenuController extends Controller
{
    /**
     * @var \Modules\Admin\Services\MenuService $menuService MenuService.
     */
    protected $menuService;

    /**
     * Admin controller construct.
     *
     * @param MenuService $menuService MenuService.
     */
    public function __construct(
        MenuService $menuService
    )
    {
        $this->menuService = $menuService;
    }

    /**
     * Display a listing of the resource.
     *
     * @param SearchMenuRequest $request SearchMenuRequest param from FE.
     * @return mixed
     */
    public function index(SearchMenuRequest $request)
    {
        try {
            $data = $request->all();
            $services = $this->menuService->getData($data);
            $result = MenuResource::collection($services);

            return response()->success($result);
        } catch (DDException $ex) {
            LogHelper::logTrace($ex);

            return response()->failure($ex->getMessage());
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
            $menu = $this->menuService->getMenuByParentId();
            $result = MenuResource::collection($menu);

            return response()->success($result);
        } catch (DDException $ex) {
            LogHelper::logTrace($ex);

            return response()->failure($ex->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param MenuRequest $request Request.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(MenuRequest $request)
    {
        try {
            $menu = $this->menuService->createMenu($request);

            $result = new MenuResource($menu);

            return response()->success($result);
        } catch (DDException $ex) {
            LogHelper::logTrace($ex);

            return response()->failure($ex->getMessage());
        }
    }

    /**
     * Show a resource in storage by id.
     *
     * @param Menu $menu Menu.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        try {
            $menu = $this->menuService->findMenu($menu->id);

            $result = new MenuResource($menu);

            return response()->success($result);
        } catch (DDException $ex) {
            LogHelper::logTrace($ex);

            return response()->failure($ex->getMessage());
        }
    }

    /**
     * Update a resource in storage by id.
     *
     * @param Menu        $menu    Menu.
     * @param MenuRequest $request Request.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Menu $menu, MenuRequest $request)
    {
        try {
            $menu = $this->menuService->updateMenu($menu->id, $request);

            $result = new MenuResource($menu);

            return response()->success($result);
        } catch (DDException $ex) {
            LogHelper::logTrace($ex);

            return response()->failure($ex->getMessage());
        }
    }

    /**
     * Update position of resource in storage by id.
     *
     * @param Request $request Request.
     * @return \Illuminate\Http\Response
     */
    public function updatePosition(Request $request)
    {
        try {
            $menu = $this->menuService->updatePosition($request);
            return response()->json($menu);
        } catch (DDException $ex) {
            LogHelper::logTrace($ex);

            return response()->failure($ex->getMessage());
        }
    }

    /**
     * Delete a resource in storage by id.
     *
     * @param Menu $menu Menu.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        try {
            $menu = $this->menuService->destroyMenu($menu->id);

            return response()->success($menu);
        } catch (DDException $ex) {
            LogHelper::logTrace($ex);

            return response()->failure($ex->getMessage());
        }
    }
}

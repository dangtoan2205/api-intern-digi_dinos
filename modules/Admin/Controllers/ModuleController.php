<?php

namespace Modules\Admin\Controllers;

use Illuminate\Http\Request;
use App\Exceptions\DDException;
use App\Helpers\LogHelper;
use App\Http\Controllers\Controller;
use Modules\Admin\Resources\ModuleResource;
use Modules\Admin\Services\ModuleService;
use Modules\Admin\Models\Module;
use Modules\Admin\Requests\ModuleRequest;
use Modules\Admin\Requests\SearchRequest;

class ModuleController extends Controller
{
    /**
     * @var \Modules\Admin\Services\ModuleService $moduleService ModuleService.
     */
    protected $moduleService;

    /**
     * Admin controller construct.
     *
     * @param ModuleService $moduleService ModuleService.
     */
    public function __construct(
        ModuleService $moduleService
    )
    {
        $this->moduleService = $moduleService;
    }

    /**
     * Display a listing of the resource.
     *
     * @param SearchRequest $request Modules\Admin\Requests\SearchRequest.
     * @return \Illuminate\Http\Response
     */
    public function index(SearchRequest $request)
    {
        try {
            $data = $request->all();
            $modules = $this->moduleService->list($data);
            $result = ModuleResource::collection($modules);
            return response()->success($result);
        } catch (DDException $ex) {
            LogHelper::logTrace($ex);

            return response()->failure($ex->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ModuleRequest $request Modules\Admin\Requests\ModuleRequest.
     * @return \Illuminate\Http\Response
     */
    public function store(ModuleRequest $request)
    {
        try {
            $data = $request->all();
            $module = $this->moduleService->create($data);
            $result = new ModuleResource($module);

            return response()->success($result);
        } catch (DDException $ex) {
            LogHelper::logTrace($ex);

            return response()->failure($ex->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  Module $module Modules\Admin\Models\Module.
     * @return \Illuminate\Http\Response
     */
    public function show(Module $module)
    {
        try {
            $result = new ModuleResource($module);

            return response()->success($result);
        } catch (DDException $ex) {
            LogHelper::logTrace($ex);

            return response()->failure($ex->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ModuleRequest $request Modules\Admin\Requests\ModuleRequest.
     * @param Module        $module  Modules\Admin\Models\Module.
     * @return \Illuminate\Http\Response
     */
    public function update(ModuleRequest $request, Module $module)
    {
        try {
            $input = $request->all();
            $module->update($input);

            $result = new ModuleResource($module);

            return response()->success($result);
        } catch (DDException $ex) {
            LogHelper::logTrace($ex);

            return response()->failure($ex->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Module $module Modules\Admin\Models\Module.
     * @return \Illuminate\Http\Response
     */
    public function destroy(Module $module)
    {
        try {
            $result = $this->moduleService->delete($module);
            return response()->success($result);
        } catch (DDException $ex) {
            LogHelper::logTrace($ex);

            return response()->failure($ex->getMessage());
        }
    }
}

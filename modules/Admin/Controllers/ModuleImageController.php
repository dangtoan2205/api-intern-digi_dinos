<?php

namespace Modules\Admin\Controllers;

use Illuminate\Http\Request;
use App\Exceptions\DDException;
use App\Helpers\LogHelper;
use App\Http\Controllers\Controller;
use Modules\Admin\Models\ModuleImage;
use Modules\Admin\Requests\ModuleImageRequest;
use Modules\Admin\Resources\ModuleImageResource;
use Modules\Admin\Services\ModuleImageService;
use Illuminate\Support\Facades\File;
use Modules\Admin\Requests\SearchRequest;

class ModuleImageController extends Controller
{
    /**
     * @var \Modules\Admin\Services\ModuleImageService $moduleImageService ModuleImageService.
     */
    protected $moduleImageService;

    /**
     * Admin controller construct.
     *
     * @param ModuleImageService $moduleService ModuleImageService.
     */
    public function __construct(
        ModuleImageService $moduleService
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
            $moduleImages = $this->moduleImageService->list($data);
            $result = ModuleImageResource::collection($moduleImages);

            return response()->success($result);
        } catch (DDException $ex) {
            LogHelper::logTrace($ex);

            return response()->failure($ex->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ModuleImageRequest $request Modules\Admin\Resources\ModuleImageResource.
     * @return \Illuminate\Http\Response
     */
    public function store(ModuleImageRequest $request)
    {
        try {
            $data = $request->all();
            $data['image_url'] = $this->moduleImageService->saveImage($request->image_url);
            $moduleImage = $this->moduleImageService->create($data);
            $result = new ModuleImageResource($moduleImage);

            return response()->success($result);
        } catch (DDException $ex) {
            LogHelper::logTrace($ex);

            return response()->failure($ex->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param ModuleImage $moduleImage Modules\Admin\Models\ModuleImage.
     * @return \Illuminate\Http\Response
     */
    public function show(ModuleImage $moduleImage)
    {
        try {
            $result = new ModuleImageResource($moduleImage);

            return response()->success($result);
        } catch (DDException $ex) {
            LogHelper::logTrace($ex);

            return response()->failure($ex->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ModuleImageRequest $request     Modules\Admin\Requests\ModuleImageRequest.
     * @param ModuleImage        $moduleImage Modules\Admin\Models\ModuleImage.
     * @return \Illuminate\Http\Response
     */
    public function update(ModuleImageRequest $request, ModuleImage $moduleImage)
    {
        try {
            $data = $request->all();
            if (isset($data['image_url'])) {
                $data['image_url'] = $this->moduleImageService->saveImage($request->image_url);
            }
            $moduleImage->update($data);
            $result = new ModuleImageResource($moduleImage);

            return response()->success($result);
        } catch (DDException $ex) {
            LogHelper::logTrace($ex);

            return response()->failure($ex->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param ModuleImage $moduleImage Modules\Admin\Models\ModuleImage.
     * @return \Illuminate\Http\Response
     */
    public function destroy(ModuleImage $moduleImage)
    {
        try {
            $result = $this->moduleImageService->delete($moduleImage);
            $path = public_path($moduleImage->image);
            File::delete($path);
            return response()->success($result);
        } catch (DDException $ex) {
            LogHelper::logTrace($ex);

            return response()->failure($ex->getMessage());
        }
    }
}

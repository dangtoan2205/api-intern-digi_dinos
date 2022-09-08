<?php

namespace Modules\Admin\Controllers\Map;

use App\Exceptions\DDException;
use App\Helpers\LogHelper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Admin\Models\Map;
use Modules\Admin\Requests\MapRequest;
use Modules\Admin\Requests\SearchRequest;
use Modules\Admin\Resources\MapResource;
use Modules\Admin\Services\Map\MapService;

class MapController extends Controller
{
     /**
     * @var \Modules\Admin\Services\MapService $mapService MapService.
     */
    protected $mapService;

    /**
     * Admin controller construct.
     *
     * @param MapService $mapService MapService.
     */
    public function __construct(
        MapService $mapService
    )
    {
        $this->mapService = $mapService;
    }
   
    /**
     * Display a listing of the resource.
     *
     * @param SearchRequest $request SearchRequest param from FE.
     * @return mixed
     */
    public function index(SearchRequest $request)
    {
        try {
            $data = $request->all();
            $maps = $this->mapService->getData($data);
            $result = MapResource::collection($maps);

            return response()->success($result);
        } catch (DDException $ex) {
            LogHelper::logTrace($ex);

            return response()->failure($ex->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param MapRequest $request MapRequest.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(MapRequest $request)
    {
        $data = $request->all();

        $data['image_url'] = $this->mapService->saveProductImage($request->image_url);
        
        $this->mapService->create($data);

        return response()->json([
            'msg' => 'Map was created successfully',
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param Map $map Map.
     * @return \Illuminate\Http\Response
     */
    public function show(Map $map)
    {
        try {
            $result = new MapResource($map);

            return response()->success($result);
        } catch (DDException $ex) {
            LogHelper::logTrace($ex);

            return response()->failure($ex->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  MapRequest $request MapRequest.
     * @param  Map        $map     Map.
     * @return \Illuminate\Http\Response
     */
    public function update(MapRequest $request, Map $map)
    {
        try {
            $data = $request->all();

            if ($request->hasFile('image_url')) {
                $data['image_url'] = $this->mapService->saveProductImage($request->image_url);
            }

            $map->update($data);

            $result = new MapResource($map);

            return response()->success($result);
        } catch (DDException $ex) {
            LogHelper::logTrace($ex);

            return response()->failure($ex->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  integer $id ID.
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $map = $this->mapService->find($id);
        $map->delete();
        return response()->json([
            'msg' => 'xóa thành công',
        ]);
    }
}

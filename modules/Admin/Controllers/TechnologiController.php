<?php

namespace Modules\Admin\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Admin\Models\Technologi;
use Modules\Admin\Requests\SearchRequest;
use Modules\Admin\Resources\TechnologiResource;
use Modules\Admin\Requests\TechnologiRequest;
use Modules\Admin\Services\TechnologiService;
use App\Exceptions\DDException;
use App\Helpers\LogHelper;

class TechnologiController extends Controller
{
    /**
     * @var \Modules\Admin\Services\TechnologiService $technologiService TechnologiService.
     */
    protected $technologiService;

    /**
     * Admin controller construct.
     *
     * @param TechnologiService $technologiService TechnologiService.
     */
    public function __construct(TechnologiService $technologiService)
    {
        $this->technologiService = $technologiService;
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
            $data = $request->all();
            $services = $this->technologiService->list($data);
            $result = TechnologiResource::collection($services);

            return response()->success($result);
        } catch (DDException $ex) {
            LogHelper::logTrace($ex);

            return response()->failure($ex->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param TechnologiRequest $request TechnologiRequest.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(TechnologiRequest $request)
    {
        try {
            $technologi = $this->technologiService->createTechnologi($request);
            if ($technologi) {
                $data = [
                    'success' => 'Add Success',
                ];
                return response()->json($data, 200);
            } else {
                return response()->json(['faild' => 'Add Faild']);
            }
            $result = new TechnologiResource($technologi);
            return response()->success($result);
        } catch (DDException $ex) {
            LogHelper::logTrace($ex);

            return response()->failure($ex->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param Technologi $technologi Technologi.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Technologi $technologi)
    {
        try {
            $technologies = $this->technologiService->findTechnologi($technologi->id);

            $result = new TechnologiResource($technologies);
            return response()->success($result);
        } catch (DDException $ex) {
            LogHelper::logTrace($ex);

            return response()->failure($ex->getMessage());
        }
    }

    /**
     * @param Technologi        $technologi Technologi.
     * @param TechnologiRequest $request    Technologi.
     * @return mixed
     */
    public function update(Technologi $technologi, TechnologiRequest $request)
    {
        try {
            $technologi = $this->technologiService->updateProcess($technologi->id, $request);

            $result = new TechnologiResource($technologi);

            return response()->success($result);
        } catch (DDException $ex) {
            LogHelper::logTrace($ex);

            return response()->failure($ex->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Technologi $technologi Technologi.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Technologi $technologi)
    {
        try {
            $technologi = $this->technologiService->destroyTechnologi($technologi->id);

            return response()->success($technologi);
        } catch (DDException $ex) {
            LogHelper::logTrace($ex);

            return response()->failure($ex->getMessage());
        }
    }
}

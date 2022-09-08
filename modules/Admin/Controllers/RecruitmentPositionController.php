<?php

namespace Modules\Admin\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Exceptions\DDException;
use App\Helpers\LogHelper;
use Modules\Admin\Models\RecruitmentPosition;
use Modules\Admin\Requests\RecruitmentPositionRequest;
use Modules\Admin\Requests\SearchRequest;
use Modules\Admin\Resources\RecruitmentPositionResource;
use Modules\Admin\Services\RecruitmentPositionService;

class RecruitmentPositionController extends Controller
{
    /**
     * @var \Modules\Admin\Services\RecruitmentPositionService $recruitmentPositionService RecruitmentPositionService.
     */
    protected $recruitmentPositionService;

    /**
     * Admin controller construct.
     *
     * @param RecruitmentPositionService $recruitmentPositionService RecruitmentPositionService.
     */
    public function __construct(
        RecruitmentPositionService $recruitmentPositionService
    )
    {
        $this->recruitmentPositionService = $recruitmentPositionService;
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
            $recruitmentPositions = $this->recruitmentPositionService->list($data);
            $result = RecruitmentPositionResource::collection($recruitmentPositions);
            return response()->success($result);
        } catch (DDException $ex) {
            LogHelper::logTrace($ex);

            return response()->failure($ex->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  RecruitmentPositionRequest $request Modules\Admin\Requests\RecruitmentPositionRequest.
     * @return \Illuminate\Http\Response
     */
    public function store(RecruitmentPositionRequest $request)
    {
        try {
            $data = $request->all();
            $recruitmentPosition = $this->recruitmentPositionService->create($data);
            $result = new RecruitmentPositionResource($recruitmentPosition);

            return response()->success($result);
        } catch (DDException $ex) {
            LogHelper::logTrace($ex);

            return response()->failure($ex->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  RecruitmentPosition $recruitmentPosition Modules\Admin\Models\RecruitmentPosition.
     * @return \Illuminate\Http\Response
     */
    public function show(RecruitmentPosition $recruitmentPosition)
    {
        try {
            $result = new RecruitmentPositionResource($recruitmentPosition);

            return response()->success($result);
        } catch (DDException $ex) {
            LogHelper::logTrace($ex);

            return response()->failure($ex->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param RecruitmentPositionRequest $request             Modules\Admin\Requests\RecruitmentPositionRequest.
     * @param RecruitmentPosition        $recruitmentPosition Modules\Admin\Models\RecruitmentPosition.
     * @return \Illuminate\Http\Response
     */
    public function update(RecruitmentPositionRequest $request, RecruitmentPosition $recruitmentPosition)
    {
        try {
            $input = $request->all();
            $recruitmentPosition->update($input);

            $result = new RecruitmentPositionResource($recruitmentPosition);

            return response()->success($result);
        } catch (DDException $ex) {
            LogHelper::logTrace($ex);

            return response()->failure($ex->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param RecruitmentPosition $recruitmentPosition Modules\Admin\Models\RecruitmentPosition.
     * @return \Illuminate\Http\Response
     */
    public function destroy(RecruitmentPosition $recruitmentPosition)
    {
        try {
            $result = $this->recruitmentPositionService->delete($recruitmentPosition);
            return response()->success($result);
        } catch (DDException $ex) {
            LogHelper::logTrace($ex);

            return response()->failure($ex->getMessage());
        }
    }
}

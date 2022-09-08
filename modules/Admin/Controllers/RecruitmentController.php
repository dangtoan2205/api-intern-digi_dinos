<?php

namespace Modules\Admin\Controllers;

use App\Http\Controllers\Controller;
use App\Exceptions\DDException;
use App\Helpers\LogHelper;
use Modules\Admin\Requests\RecruitmentRequest;
use modules\Admin\Models\Recruitment;
use Modules\Admin\Requests\SearchRequest;
use Modules\Admin\Resources\RecruitmentResource;
use Modules\Admin\Services\RecruitmentService;

class RecruitmentController extends Controller
{
    /**
     * @var \Modules\Admin\Services\RecruitmentService $recruitmentService RecruitmentService.
     */
    protected $recruitmentService;

    /**
     * Admin controller construct.
     *
     * @param RecruitmentService $recruitmentService RecruitmentService.
     */
    public function __construct(
        RecruitmentService $recruitmentService
    )
    {
        $this->recruitmentService = $recruitmentService;
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
            $recruitments = $this->recruitmentService->list($data);
            $result = RecruitmentResource::collection($recruitments);
            return response()->success($result);
        } catch (DDException $ex) {
            LogHelper::logTrace($ex);

            return response()->failure($ex->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  RecruitmentRequest $request Modules\Admin\Requests\RecruitmentRequest.
     * @return \Illuminate\Http\Response
     */
    public function store(RecruitmentRequest $request)
    {
        try {
            $data = $request->all();
            $recruitment = $this->recruitmentService->create($data);
            $result = new RecruitmentResource($recruitment);

            return response()->success($result);
        } catch (DDException $ex) {
            LogHelper::logTrace($ex);

            return response()->failure($ex->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  Recruitment $recruitment Modules\Admin\Models\Recruitment.
     * @return \Illuminate\Http\Response
     */
    public function show(Recruitment $recruitment)
    {
        try {
            $result = new RecruitmentResource($recruitment);

            return response()->success($result);
        } catch (DDException $ex) {
            LogHelper::logTrace($ex);

            return response()->failure($ex->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param RecruitmentRequest $request     Modules\Admin\Requests\RecruitmentRequest.
     * @param Recruitment        $recruitment Modules\Admin\Models\Recruitment.
     * @return \Illuminate\Http\Response
     */
    public function update(RecruitmentRequest $request, Recruitment $recruitment)
    {
        try {
            $input = $request->all();
            $recruitment->update($input);

            $result = new RecruitmentResource($recruitment);

            return response()->success($result);
        } catch (DDException $ex) {
            LogHelper::logTrace($ex);

            return response()->failure($ex->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Recruitment $recruitment Modules\Admin\Models\Recruitment.
     * @return \Illuminate\Http\Response
     */
    public function destroy(Recruitment $recruitment)
    {
        try {
            $result = $this->recruitmentService->delete($recruitment);
            return response()->success($result);
        } catch (DDException $ex) {
            LogHelper::logTrace($ex);

            return response()->failure($ex->getMessage());
        }
    }
}

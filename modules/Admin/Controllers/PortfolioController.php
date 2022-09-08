<?php

namespace Modules\Admin\Controllers;

use App\Http\Controllers\Controller;
use Modules\Admin\Requests\PortfolioRequest;
use Modules\Admin\Resources\PortfolioResource;
use Modules\Admin\Services\PortfolioService;
use App\Exceptions\DDException;
use App\Helpers\LogHelper;
use Illuminate\Http\Request;
use modules\Admin\Models\Portfolio;

class PortfolioController extends Controller
{
    /**
     * @var \Modules\Portfolio\Services\PortfolioService $portfolioService portfolioService.
     */
    protected $portfolioService;

    /**
     *
     * @param PortfolioService $portfolioService PortfolioService.
     */
    public function __construct(PortfolioService $portfolioService)
    {
        $this->portfolioService = $portfolioService;
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request Request.
     * @return mixed
     */
    public function index(Request $request)
    {
        try {
            $portfolios = $this->portfolioService->list($request);
            $result = PortfolioResource::collection($portfolios);

            return response()->success($result);
        } catch (DDException $ex) {
            LogHelper::logTrace($ex);

            return response()->failure($ex->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PortfolioRequest $request PortfolioRequest.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(PortfolioRequest $request)
    {
        try {
            $portfolio = $this->portfolioService->create($request);

            return response()->success($portfolio);
        } catch (DDException $ex) {
            LogHelper::logTrace($ex);

            return response()->failure($ex->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param integer $id ID.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        try {
            $result = $this->portfolioService->find($id);

            return response()->success($result);
        } catch (DDException $ex) {
            LogHelper::logTrace($ex);

            return response()->failure($ex->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request Request.
     * @param integer $id      ID.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        try {
            $result = $this->portfolioService->update($request, $id);

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
            $result = $this->portfolioService->destroy($id);
            return response()->success($result);
        } catch (DDException $ex) {
            LogHelper::logTrace($ex);
            return response()->failure($ex->getMessage());
        }
    }
}

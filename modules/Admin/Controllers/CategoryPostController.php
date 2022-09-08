<?php

namespace Modules\Admin\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Admin\Resources\CategoryPostResource;
use Modules\Admin\Services\CategoryPostService;
use App\Exceptions\DDException;
use App\Helpers\LogHelper;
use Modules\Admin\Requests\CategoryPostRequest;

class CategoryPostController extends Controller
{
    /**
     * @var \Modules\CategoryPost\Services\CategoryPostService $categoryPostService categoryPostService.
     */
    protected $categoryPostService;

    /**
     * CategoryPost controller construct.
     *
     * @param CategoryPostService $categoryPostService CategoryPostService.
     */
    public function __construct(CategoryPostService $categoryPostService)
    {
        $this->categoryPostService = $categoryPostService;
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
            $categoryPost = $this->categoryPostService->list($request);
            $result = CategoryPostResource::collection($categoryPost);

            return response()->success($result);
        } catch (DDException $ex) {
            LogHelper::logTrace($ex);

            return response()->failure($ex->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CategoryPostRequest $request Request.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryPostRequest $request)
    {
        try {
            $categoryPost = $this->categoryPostService->create($request);

            return response()->success($categoryPost);
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
            $result = $this->categoryPostService->find($id);

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
            $result = $this->categoryPostService->update($request, $id);

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
            $result = $this->categoryPostService->destroy($id);
            return response()->success($result);
        } catch (DDException $ex) {
            LogHelper::logTrace($ex);

            return response()->failure($ex->getMessage());
        }
    }

    /**
     * Update location the specified resource in storage.
     *
     * @param Request $request Request.
     *
     * @return \Illuminate\Http\Response
     */
    public function updateLocation(Request $request)
    {
        try {
            $result = $this->categoryPostService->updateLocation($request);
            return response()->success($result);
        } catch (DDException $ex) {
            LogHelper::logTrace($ex);

            return response()->failure($ex->getMessage());
        }
    }
}

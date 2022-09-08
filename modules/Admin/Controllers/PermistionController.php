<?php

namespace Modules\Admin\Controllers;

use Illuminate\Http\Request;
use Modules\Admin\Requests\PermistionRequest;
use Tymon\JWTAuth\JWT;
use Tymon\JWTAuth\JWTAuth;
use App\Exceptions\DDException;
use Spatie\Permission\Models\Permission;
use Modules\Admin\Resources\PermistionResource;
use App\Helpers\LogHelper;
use Modules\Admin\Services\PermistionService;
use App\Http\Controllers\Controller;

class PermistionController extends Controller
{
    /**
     * @var \Modules\Admin\Services\PermistionService $permistionService PermistionService.
     */
    protected $permistionService;

    /**
     * Admin controller construct.
     *
     * @param PermistionService $permistionService PermistionService.
     */
    public function __construct(
        PermistionService $permistionService
    )
    {
        $this->permistionService = $permistionService;
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request Request param from FE.
     * @return mixed
     */
    public function index(Request $request)
    {
        try {
            $data = $request->all();
            $permistions = $this->permistionService->list($data);
            $result = PermistionResource::collection($permistions);
            return response()->success($result);
        } catch (DDException $ex) {
            LogHelper::logTrace($ex);

            return response()->failure($ex->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  PermistionRequest $request PermistionRequest.
     * @return \Illuminate\Http\Response
     */
    public function store(PermistionRequest $request)
    {
        $permistions = $this->permistionService->createPermistion($request);
        if ($permistions) {
            $data = [
                'mess' => 'Create Successfully',
            ];
            return response()->json($data, 200);
        } else {
            return response()->json(['messer' => 'Create Failed']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  mixed $id ID.
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $result = $this->permistionService->show($id);
            $result = new PermistionResource($result);
            return response()->success($result);
        } catch (DDException $ex) {
            LogHelper::logTrace($ex);

            return response()->failure($ex->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param PermistionRequest $request Request.
     * @param  mixed             $id      Id.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(PermistionRequest $request, $id)
    {
        $permistion = $this->permistionService->editPermistion($request, $id);

        if ($permistion) {
            $data = [
                'mess' => 'Update Successfully',
            ];
            return response()->json($data, 200);
        } else {
            return response()->json(['messer' => 'Update Failed']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  mixed $id ID.
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $result = $this->permistionService->delete($id);
            return response()->success($result);
        } catch (DDException $ex) {
            LogHelper::logTrace($ex);

            return response()->failure($ex->getMessage());
        }
    }
}

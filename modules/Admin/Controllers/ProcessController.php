<?php

namespace Modules\Admin\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Admin\Models\Process;
use Modules\Admin\Requests\SearchRequest;
use Modules\Admin\Resources\ProcessResource;
use Modules\Admin\Requests\ProcessRequest;
use Modules\Admin\Services\ProcessService;
use App\Exceptions\DDException;
use App\Helpers\LogHelper;

class ProcessController extends Controller
{
    /**
     * @var \Modules\Admin\Services\ProcessService $processService ProcessService   .
     */
    protected $processService;

    /**
     * Admin controller construct.
     *
     * @param ProcessService $processService ProcessService.
     */
    public function __construct(ProcessService $processService)
    {
        $this->processService = $processService;
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
            $services = $this->processService->list($data);
            $result = ProcessResource::collection($services);

            return response()->success($result);
        } catch (DDException $ex) {
            LogHelper::logTrace($ex);

            return response()->failure($ex->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ProcessRequest $request ProcessRequest.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(ProcessRequest $request)
    {
        try {
            $process = $this->processService->createProcess($request);
            if ($process) {
                $data = [
                    'success' => 'Add Success',
                ];
                return response()->json($data, 200);
            } else {
                return response()->json(['faild' => 'Add Faild']);
            }
            $result = new ProcessResource($process);
            return response()->success($result);
        } catch (DDException $ex) {
            LogHelper::logTrace($ex);

            return response()->failure($ex->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param Process $process Process.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Process $process)
    {
        try {
            $processes = $this->processService->findProcess($process->id);

            $result = new ProcessResource($processes);
            return response()->success($result);
        } catch (DDException $ex) {
            LogHelper::logTrace($ex);

            return response()->failure($ex->getMessage());
        }
    }

    /**
     * @param Process        $process Process.
     * @param ProcessRequest $request Process.
     * @return mixed
     */
    public function update(Process $process, ProcessRequest $request)
    {
        try {
            $process = $this->processService->updateProcess($process->id, $request);

            $result = new ProcessResource($process);

            return response()->success($result);
        } catch (DDException $ex) {
            LogHelper::logTrace($ex);

            return response()->failure($ex->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Process $process Process.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Process $process)
    {
        try {
            $process = $this->processService->destroyProcess($process->id);

            return response()->success($process);
        } catch (DDException $ex) {
            LogHelper::logTrace($ex);

            return response()->failure($ex->getMessage());
        }
    }
}

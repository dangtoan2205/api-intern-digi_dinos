<?php

namespace Modules\Admin\Services;

use App\Exceptions\DDException;
use App\Helpers\LogHelper;
use App\Services\BaseService;
use Modules\Admin\Repositories\ProcessRepository;
use Modules\Admin\Models\Process;
use Modules\Admin\Requests\ProcessRequest;

class ProcessService extends BaseService
{
    /**
     * Construct
     *
     * @param ProcessRepository $repository ProcessRepository.
     *
     * @return void
     */
    public function __construct(
        ProcessRepository $repository
    )
    {
        parent::__construct();
        $this->repository = $repository;
    }

    /**
     * GetRepository
     *
     * @return object
     */
    public function getRepository()
    {
        return $this->repository;
    }

    /**
     * @return Process
     */
    public function getModel()
    {
        return Process::class;
    }

    /**
     * @param integer $id ID.
     * @return ProcessRepository
     */
    public function findProcess(int $id)
    {
        return $this->repository->findProcess($id);
    }

    /**
     * @param ProcessRequest $request ProcessRequest.
     * @return ProcessRepository
     */
    public function createProcess(ProcessRequest $request)
    {
        try {
            return $this->repository->createProcess($request);
        } catch (DDException $th) {
            LogHelper::logTrace($th);
            throw $th;
        }
    }

    /**
     * @param integer        $id      ID.
     * @param ProcessRequest $request ProcessRequest.
     * @return ProcessRepository
     */
    public function updateProcess(int $id, ProcessRequest $request)
    {
        try {
            return $this->repository->updateProcess($id, $request);
        } catch (DDException $th) {
            LogHelper::logTrace($th);
            throw $th;
        }
    }

    /**
     * @param integer $id ID.
     * @return boolean|Process
     */
    public function destroyProcess(int $id)
    {
        return $this->repository->destroyProcess($id);
    }
}

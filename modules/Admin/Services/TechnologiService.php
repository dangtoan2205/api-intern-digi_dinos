<?php

namespace Modules\Admin\Services;

use App\Exceptions\DDException;
use App\Helpers\LogHelper;
use App\Services\BaseService;
use Modules\Admin\Repositories\TechnologiRepository;
use Modules\Admin\Models\Technologi;
use Modules\Admin\Requests\TechnologiRequest;

class TechnologiService extends BaseService
{
    /**
     * Construct
     *
     * @param TechnologiRepository $repository TechnologiRepository.
     *
     * @return void
     */
    public function __construct(
        TechnologiRepository $repository
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
     * @return Technologi
     */
    public function getModel()
    {
        return Technologi::class;
    }

    /**
     * @param integer $id ID.
     * @return TechnologiRepository
     */
    public function findTechnologi(int $id)
    {
        return $this->repository->findTechnologi($id);
    }

    /**
     * @param TechnologiRequest $request TechnologiRequest.
     * @return TechnologiRepository
     */
    public function createTechnologi(TechnologiRequest $request)
    {
        try {
            return $this->repository->createTechnologi($request);
        } catch (DDException $th) {
            LogHelper::logTrace($th);
            throw $th;
        }
    }

    /**
     * @param integer           $id      ID.
     * @param TechnologiRequest $request TechnologiRequest.
     * @return TechnologiRepository
     */
    public function updateProcess(int $id, TechnologiRequest $request)
    {
        try {
            return $this->repository->updateTechnologi($id, $request);
        } catch (DDException $th) {
            LogHelper::logTrace($th);
            throw $th;
        }
    }

    /**
     * @param integer $id ID.
     * @return boolean|Technologi
     */
    public function destroyTechnologi(int $id)
    {
        return $this->repository->destroyTechnologi($id);
    }
}

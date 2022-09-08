<?php

namespace Modules\Admin\Services;

use App\Services\BaseService;
use Modules\Admin\Repositories\RecruitmentPositionRepository;
use Modules\Admin\Models\RecruitmentPosition;

class RecruitmentPositionService extends BaseService
{
    /**
     * Construct
     *
     * @param RecruitmentPositionRepository $repository RecruitmentPositionRepository.
     *
     * @return void
     */
    public function __construct(
        RecruitmentPositionRepository $repository
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
     * @return RecruitmentPosition
     */
    public function getModel()
    {
        return RecruitmentPosition::class;
    }
}

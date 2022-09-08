<?php

namespace Modules\Admin\Services;

use App\Services\BaseService;
use Modules\Admin\Repositories\RecruitmentRepository;
use Modules\Admin\Models\Recruitment;

class RecruitmentService extends BaseService
{
    /**
     * Construct
     *
     * @param RecruitmentRepository $repository RecruitmentRepository.
     *
     * @return void
     */
    public function __construct(
        RecruitmentRepository $repository
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
     * @return Recruitment
     */
    public function getModel()
    {
        return Recruitment::class;
    }
}

<?php

namespace Modules\Admin\Services;

use App\Services\BaseService;
use DB;
use Modules\Admin\Repositories\ModuleRepository;
use Modules\Admin\Models\Module;

class ModuleService extends BaseService
{
    /**
     * Construct
     *
     * @param ModuleRepository $repository ModuleRepository.
     *
     * @return void
     */
    public function __construct(
        ModuleRepository $repository
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
     * @return Module
     */
    public function getModel()
    {
        return Module::class;
    }
}

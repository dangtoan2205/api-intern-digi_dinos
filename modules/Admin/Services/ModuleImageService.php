<?php

namespace Modules\Admin\Services;

use App\Services\BaseService;
use DB;
use Modules\Admin\Repositories\ModuleImageRepository;
use Modules\Admin\Models\ModuleImage;
use Illuminate\Support\Facades\File;

class ModuleImageService extends BaseService
{
    /**
     * Construct
     *
     * @param ModuleImageRepository $repository ModuleImageRepository.
     *
     * @return void
     */
    public function __construct(
        ModuleImageRepository $repository
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
     * @return ModuleImage
     */
    public function getModel()
    {
        return ModuleImage::class;
    }

    /**
     * Save Image
     *
     * @param Data $data Data.
     * @return string
     */
    public function saveImage(Data $data)
    {
        $image = $data;
        $imageName = time() . $image->getClientOriginalName();

        $patch = public_path('image');
        $image->move($patch, $imageName);
        $data = $imageName;

        return $data;
    }
}

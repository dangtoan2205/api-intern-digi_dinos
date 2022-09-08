<?php

namespace Modules\Admin\Services\Map;

use App\Exceptions\DDException;
use App\Helpers\LogHelper;
use App\Services\BaseService;
use Modules\Admin\Models\Map;
use Modules\Admin\Repositories\Map\MapRepository;

class MapService extends BaseService
{
     /**
     * Construct
     *
     * @param MapRepository $repository MapRepository.
     *
     * @return void
     */
    public function __construct(
        MapRepository $repository
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
     * @return Map
     */
    public function getModel()
    {
        return Map::class;
    }

      /**
     * Save Product Image in storage.
     *
     * @param mixed $data Data.
     *
     * @return $data
     */
    public function saveProductImage($data)
    {
        $image = $data;
        $imageName = time() . $image->getClientOriginalName();
        
        $patch = public_path('image');
        $image->move($patch, $imageName);
        $data = $imageName;

        return $data;
    }

     /**
     * Remove Image in storage.
     *
     * @param mixed $url Url.
     * @return void
     */
    public function removeImage($url)
    {
        $pathShort = public_path('image');
        $oldFile = $pathShort. $url;

        unlink($oldFile);
    }

     /**
     * Get Data in storage.
     *
     * @param mixed $data Data.
     * @return $data
     */
    public function getData($data)
    {
        return $this->repository->list($data);
    }
}

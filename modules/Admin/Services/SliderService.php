<?php

namespace Modules\Admin\Services;

use App\Services\BaseService;
use Modules\Admin\Repositories\SliderRepository;
use Modules\Admin\Models\Slider;

class SliderService extends BaseService
{
    /**
     * Construct
     *
     * @param SliderRepository $repository SliderRepository.
     *
     * @return void
     */
    public function __construct(
        SliderRepository $repository
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
     * @return Slider
     */
    public function getModel()
    {
        return Slider::class;
    }

    /**
     * Create List Slider
     *
     * @param mixed $request Request.
     *
     * @return Slider $slider
     */
    public function createSlider($request)
    {
        return $this->repository->createSlider($request);
    }

    /**
     * Edit List Slider
     *
     * @param mixed $id      ID.
     * @param mixed $request Request.
     *
     * @return Slider $slider
     */
    public function editSlider($id, $request)
    {
        return $this->repository->editSlider($id, $request);
    }

     /**
     * Delete List Slider
     *
     * @param mixed $id ID.
     *
     * @return Slider $slider
     */
    public function destroySlider($id)
    {
        return $this->repository->destroySlider($id);
    }

     /**
     * Search List Slider
     *
     * @param mixed $data Datasearch.
     *
     * @return Slider $slider
     */
    public function list($data)
    {
        return $this->repository->list($data);
    }

     /**
     * Get List Slider
     *
     *
     * @return Slider $slider
     */
    public function getSliders()
    {
        return $this->repository->getSliders();
    }
}

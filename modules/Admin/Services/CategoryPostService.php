<?php

namespace Modules\Admin\Services;

use App\Exceptions\DDException;
use App\Helpers\LogHelper;
use App\Services\BaseService;
use DB;
use Modules\Admin\Models\CategoryPost;
use Modules\Admin\Models\Portfolio;
use Modules\Admin\Repositories\CategoryPostRepository;

class CategoryPostService extends BaseService
{
    /**
     * Construct
     *
     * @param CategoryPostRepository $repository CategoryPostRepository.
     *
     * @return void
     */
    public function __construct(
        CategoryPostRepository $repository
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
     * @return CategoryPost
     */
    public function getModel()
    {
        return CategoryPost::class;
    }

    /**
     * Get CategoryPost
     *
     * @param mixed $request Request.
     *
     * @return CategoryPost $categoryPost
     */
    public function list($request)
    {
        $data = $request->all();
        try {
            if ($data == []) {
                return $this->repository->list([
                    'order_by' => 'location',
                    'order_type' => true,
                ]);
            } else {
                return $this->repository->list($data);
            }
        } catch (DDException $th) {
            LogHelper::logTrace($th);

            throw $th;
        }
    }

    /**
     * Create portfolio.
     *
     * @param mixed $request Request.
     *
     * @return Portfolio $portfolio
     */
    public function create($request)
    {
        $data = $request->all();
        try {
             return $this->repository->create($data);
        } catch (DDException $th) {
            LogHelper::logTrace($th);

            throw $th;
        }
    }

    /**
     * Find CategoryPost.
     *
     * @param integer $id ID.
     *
     * @return CategoryPost $categoryPost
     */
    public function find(int $id)
    {
        try {
            return $this->repository->find($id);
        } catch (DDException $th) {
            LogHelper::logTrace($th);

            throw $th;
        }
    }

    /**
     * Update CategoryPost.
     *
     * @param mixed   $request Request.
     * @param integer $id      ID.
     *
     * @return CategoryPost $categoryPost
     */
    public function update($request, int $id)
    {
        $res = $this->model->find($id);
        $data = $request->all();
        try {
            return $res = $this->repository->update($res, $data);
        } catch (DDException $th) {
            LogHelper::logTrace($th);

            throw $th;
        }
    }

    /**
     * Delete categoryPost.
     *
     * @param integer $id ID.
     *
     * @return mixed
     */
    public function destroy(int $id)
    {
        $res = $this->model->find($id);
        try {
            return $this->repository->delete($res);
        } catch (DDException $th) {
            LogHelper::logTrace($th);

            throw $th;
        }
    }

     /**
     * Update location categoryPost.
     *
     * @param mixed $request Request.
     *
     * @return mixed
     */
    public function updateLocation($request)
    {
        try {
            return $this->repository->updateLocation($request);
        } catch (DDException $th) {
            LogHelper::logTrace($th);

            throw $th;
        }
    }
}

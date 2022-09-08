<?php

namespace Modules\Admin\Services;

use App\Exceptions\DDException;
use App\Helpers\LogHelper;
use App\Services\BaseService;
use DB;
use Modules\Admin\Models\Portfolio;
use Modules\Admin\Repositories\PortfolioRepository;
use App\Traits;
use App\Traits\StorageImage;

class PortfolioService extends BaseService
{
    /**
     * Construct
     *
     * @param PortfolioRepository $repository PortfolioRepository.
     *
     * @return void
     */
    public function __construct(
        PortfolioRepository $repository
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
     * @return Portfolio
     */
    public function getModel()
    {
        return Portfolio::class;
    }

    /**
     * Get Portfolio
     *
     * @param mixed $request Request.
     *
     * @return Portfolio $portfolio
     */
    public function list($request)
    {
        $data = $request->all();
        try {
            return $this->repository->list($data);
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
        $data = [
            'title_vi' => $request->title_vi,
            'title_ja' => $request->title_ja,
            'title_en' => $request->title_en,
            'content_vi' => $request->content_vi,
            'content_ja' => $request->content_ja,
            'content_en' => $request->content_en,
            'status' => $request->status,
        ];

        try {
            $getImage = $request->file('url_image');

            if ($getImage) {
                $nameImage = $getImage->getClientOriginalName();
                $newNameImage = time() . $nameImage;
                $getImage->move('images/portfolio', $newNameImage);
            } else {
                $newNameImage = '';
            }

            $data['url_image'] = $newNameImage;

            $res = $this->repository->create($data);

            return $res;
        } catch (DDException $th) {
            LogHelper::logTrace($th);

            throw $th;
        }
    }

    /**
     * Find portfolio.
     *
     * @param integer $id ID.
     *
     * @return Portfolio $portfolio
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
     * Update portfolio.
     *
     * @param mixed   $request Request.
     * @param integer $id      ID.
     *
     * @return Portfolio $portfolio
     */
    public function update($request, int $id)
    {
        $res = $this->model->find($id);
        $data = $request->all();

        try {
            if ($request->file('url_image')) {
                $getImage = $request->file('url_image');

                if ($getImage) {
                    $nameImage = $getImage->getClientOriginalName();
                    $newNameImage = time() . $nameImage;
                    $getImage->move('images/portfolio', $newNameImage);
                } else {
                    $newNameImage = '';
                }

                $data['url_image'] = $newNameImage;
            }
            return $res = $this->repository->update($res, $data);
        } catch (DDException $th) {
            LogHelper::logTrace($th);

            throw $th;
        }
    }

    /**
     * Delete portfolio.
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
}

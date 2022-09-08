<?php

namespace Modules\Admin\Services;

use App\Exceptions\DDException;
use App\Helpers\LogHelper;
use App\Services\BaseService;
use DB;
use Modules\Admin\Models\Post;
use Modules\Admin\Repositories\PostRepository;

class PostService extends BaseService
{
    /**
     * Construct
     *
     * @param PostRepository $repository PostRepository.
     *
     * @return void
     */
    public function __construct(
        PostRepository $repository
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
     * @return Post
     */
    public function getModel()
    {
        return Post::class;
    }

    /**
     * Get Post
     *
     * @param mixed $request Request.
     *
     * @return Post $post
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
     * Create post.
     *
     * @param mixed $request Request.
     *
     * @return Post $post
     */
    public function create($request)
    {
        $data = $request->all();
        try {
            $getImage = $request->file('url_image');

            if ($getImage) {
                $nameImage = $getImage->getClientOriginalName();
                $newNameImage = time() . $nameImage;
                $getImage->move('images/post', $newNameImage);
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
     * Find post.
     *
     * @param integer $id ID.
     *
     * @return Post $post
     */
    public function find(int $id)
    {
        try {
            return $this->repository->findOrFail($id, ['category_post']);
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
     * @return Post $post
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
                    $getImage->move('images/post', $newNameImage);
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
     * Delete post.
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

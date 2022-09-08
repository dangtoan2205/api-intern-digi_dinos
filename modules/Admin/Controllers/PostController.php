<?php
namespace Modules\Admin\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Exceptions\DDException;
use App\Helpers\LogHelper;
use Modules\Admin\Requests\PostRequest;
use Modules\Admin\Resources\PostResource;
use Modules\Admin\Services\CategoryPostService;
use Modules\Admin\Services\PostService;

class PostController extends Controller
{
    /**
     * @var \Modules\Post\Services\PostService $postService postService.
     * @var \Modules\CategoryPost\Services\PostService $categoryPostService categoryPostService.
     */
    protected $postService;
    protected $categoryPostService;
    /**
     * Post controller construct.
     *
     * @param PostService         $postService         PostService.
     * @param CategoryPostService $categoryPostService CategoryPostService.
     */
    public function __construct(PostService $postService, CategoryPostService $categoryPostService)
    {
        $this->postService = $postService;
        $this->categoryPostService = $categoryPostService;
    }
    /**
     * Display a listing of the resource.
     *
     * @param Request $request Request.
     *
     * @return mixed
     */
    public function index(Request $request)
    {
        try {
            $posts = $this->postService->list($request);
            $result = PostResource::collection($posts);

            return response()->success($result);
        } catch (DDException $ex) {
            LogHelper::logTrace($ex);

            return response()->failure($ex->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PostRequest $request Request.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        try {
            $post = $this->postService->create($request);

            return response()->success($post);
        } catch (DDException $ex) {
            LogHelper::logTrace($ex);

            return response()->failure($ex->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param integer $id ID.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        try {
            $post = $this->postService->find($id);
            return response()->success($post);
        } catch (DDException $ex) {
            LogHelper::logTrace($ex);

            return response()->failure($ex->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param mixed Request $request Request.
     * @param integer       $id      ID.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        try {
            $result = $this->postService->update($request, $id);

            return response()->success($result);
        } catch (DDException $ex) {
            LogHelper::logTrace($ex);

            return response()->failure($ex->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param integer $id ID.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        try {
            $result = $this->postService->destroy($id);
            return response()->success($result);
        } catch (DDException $ex) {
            LogHelper::logTrace($ex);

            return response()->failure($ex->getMessage());
        }
    }
}

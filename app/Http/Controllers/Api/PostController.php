<?php

namespace App\Http\Controllers\Api;

use App\Domain\Services\PostService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\PostRequest;
use App\Http\Resources\PostResource;
use App\Traits\ApiResponder;
use Exception;
use Symfony\Component\HttpFoundation\Response;

class PostController extends Controller
{
    use ApiResponder;

    /**
     * @var PostService
     */
    private $postService;

    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }

    public function getPosts()
    {
        $posts = $this->postService->getPostsPaginatedExceptAuthUserPosts();
        return PostResource::collection($posts);
    }

    public function store(PostRequest $request)
    {
        try{
            $post = $this->postService->createPost($request->validated());
            return $this->successResponse('Post created successfully', new PostResource($post), Response::HTTP_CREATED);
        }catch (Exception $e){
            return $this->errorResponse('Post created failed' , Response::HTTP_EXPECTATION_FAILED);
        }
    }

}

<?php

namespace App\Domain\Services;

use App\Domain\Repositories\PostRepository;

class PostService
{

    /**
     * @var PostRepository
     */
    private PostRepository $postRepository;

    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function getPostsPaginatedExceptAuthUserPosts($user = null)
    {
        $user_id = $user ? $user->id : auth()->user()->id;
        $conditions = [['user_id', '!=', $user_id]];
        return $this->getPostsPaginated($conditions);
    }

    public function getPostsPaginated($conditions = [], $count = 20)
    {
        return $this->postRepository->getPosts($conditions)->orderByDESC('id')->paginate($count);
    }

    public function deleteAllPostsByUserId($user_id)
    {
        $conditions = [['user_id', '=', $user_id]];
        $this->postRepository->getPosts($conditions)->delete();
    }

    public function createPost($createPostData, $user = null)
    {
        $createPostData['user_id'] = $user ? $user->id : auth()->user()->id;
        return $this->postRepository->createPost($createPostData);
    }

    public function findPost($id)
    {
        return $this->postRepository->findPost($id);
    }

    public function getPostsByDate($date)
    {
        return $this->postRepository->getPosts()->whereDate('created_at', $date )->get();
    }

    public function updatePost($updatePostData, $id)
    {
        $updatePostData['user_id'] = $updatePostData['user_id'] ?? auth()->user()->id;
        $post = $this->findPost($id);
        return $this->postRepository->updatePost($updatePostData, $post);
    }

    public function deletePost($id)
    {
        return $this->postRepository->deletePost($id);
    }
}

<?php

namespace App\Domain\Repositories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class PostRepository extends BaseRepository
{

    /**
     * @var Post
     */
    private Post $model;

    public function __construct(Post $model)
    {
        $this->model = $model;
        parent::__construct($this->model);
    }

    public function getPosts($conditions = [], $withRelated = [])
    {
        $withRelated[] = 'user';
        return $this->getModelQuery($conditions,$withRelated);
    }

    public function createPost($createPostData)
    {
        return $this->createModel($createPostData);
    }

    public function updatePost($updatePostData, $post)
    {
        return $this->updateModel($updatePostData, $post);
    }

    public function findPost($id): Model|Collection|Builder|array|null
    {
        return $this->findModel($id, ['user']);
    }

    public function deletePost($id)
    {
        return $this->deleteModel($id);
    }

}

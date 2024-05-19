<?php

namespace App\Domain\Repositories;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class UserRepository extends BaseRepository
{

    /**
     * @var User
     */
    private $model;

    public function __construct(User $model)
    {
        $this->model = $model;
        parent::__construct($this->model);
    }

    public function createUser($createUserData)
    {
        return $this->createModel($createUserData);
    }

    public function findUser($id): Model|Collection|Builder|array|null
    {
        return $this->findModel($id);
    }

    public function updateUser($userdata, $user)
    {
        return $this->updateModel($userdata, $user);
    }

    public function deleteUser($id)
    {
        return $this->deleteModel($id);
    }

    public function getUsers($conditions = [], $withRelated = [])
    {
        return $this->getModelQuery($conditions,$withRelated);
    }

}

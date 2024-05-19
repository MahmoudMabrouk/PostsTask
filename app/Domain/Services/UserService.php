<?php

namespace App\Domain\Services;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use App\Domain\Repositories\UserRepository;

class UserService
{

    /**
     * @var UserRepository
     */
    private UserRepository $userRepository;
    private PostService $postService;

    public function __construct(UserRepository $userRepository, PostService $postService)
    {
        $this->userRepository = $userRepository;
        $this->postService = $postService;
    }

    public function getUsersPaginated($conditions = [], $count = 20)
    {
        $conditions = ['role' =>'user'];
        return $this->userRepository->getUsers($conditions)->orderByDESC('id')->paginate($count);
    }

    public function updateUser($userData, $user = null)
    {
        $user = $user ?? auth()->user();
        if(isset($userData['password'])){
            $userData['password']=  Hash::make($userData['password']);
        }else{
            unset($userData['password']);
        }
        return $this->userRepository->updateUser($userData, $user);
    }

     public function createUser($createUserData)
     {
        if(isset($createUserData['password'])){
            $createUserData['password'] =  Hash::make($createUserData['password']);
        }
        return $this->userRepository->createUser($createUserData);
     }

     public function findUser($id): Model|Collection|Builder|array|null
     {
        return $this->userRepository->findUser($id);
     }

     public function findAdmin($id = null): Model|Collection|Builder|array|null
     {
         $conditions = ['role' => 'admin'];
         return $id ? $this->userRepository->findUser($id) : $this->userRepository->getUsers($conditions)->first();
     }

     public function deleteUser($id)
     {
         $this->postService->deleteAllPostsByUserId($id);
         return $this->userRepository->deleteUser($id);
     }

     public function getUsersByDate($date)
     {
         return $this->userRepository->getUsers()->whereDate('created_at', $date )->where('role','user')->get();
     }
}

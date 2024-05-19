<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use App\Domain\Services\UserService;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Support\Facades\DB;
use Exception;

class UserController extends Controller
{
    /**
     * @var UserService
     */
    private UserService $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(): View|Factory|Application
    {
        $users = $this->userService->getUsersPaginated();
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create(): Factory|\Illuminate\Foundation\Application|View|Application
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(CreateUserRequest $request): RedirectResponse
    {
        $userCheck = $this->userService->createUser($request->all());
        //return redirect back
        if (!$userCheck) {
            return redirect()->back()->with('error', __('Something went wrong User Not created'));
        }
        return redirect()->route('users.index')->with('success', __('User created Successfully'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Factory|\Illuminate\Foundation\Application|View|Application
     */
    public function edit(int $id): Factory|\Illuminate\Foundation\Application|View|Application
    {
        $user = $this->userService->findUser($id);
        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateUserRequest $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(UpdateUserRequest $request, int $id): RedirectResponse
    {
        $userCheck = $this->userService->updateUser($request->all(), $id);
        if (!$userCheck) {
            return redirect()->back()->with([
                'message' => __('Something went wrong Profile Not Updated'),
                'alert-type' => 'error'
            ]);
        }
        return redirect()->route('users.index')->with(
            [
                'message' => __('Profile Updated Successfully'),
                'alert-type' => 'success'
            ]
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy(int $id): RedirectResponse
    {
        DB::beginTransaction();
        try {
            $this->userService->deleteUser($id);
            DB::commit();
            return redirect()->back()->with(['alert-type' => 'success','message' => __('User Deleted Successfully')]);
        } catch (Exception $e) {
            DB::rollback();
            throw $e;
            return redirect()->back()->with(['alert-type' => 'error', 'message' => __('Something went wrong User Not Deleted')]);
        }
    }
}

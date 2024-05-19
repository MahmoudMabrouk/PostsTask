<?php

namespace App\Http\Controllers\Admin;

use App\Domain\Services\PostService;
use App\Http\Requests\CreatePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Controller;


class BlogController extends Controller
{

    /**
     * @var PostService
     */
    private PostService $postService;

    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(): View|Factory|Application
    {
        $blogs = $this->postService->getPostsPaginated();
        return view('admin.blog.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Factory|\Illuminate\Foundation\Application|View|Application
    {
        return view('admin.blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreatePostRequest $request
     * @return RedirectResponse
     */
    public function store(CreatePostRequest $request): RedirectResponse
    {

        $postCheck = $this->postService->createPost($request->validated());
        //return redirect back
        if (!$postCheck) {
            return redirect()->back()->with('error', __('Something went wrong Post Not created'));
        }
        return redirect()->route('blogs.index')->with('success', __('Post created Successfully'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Factory|\Illuminate\Foundation\Application|View|Application
     */
    public function edit(int $id): Factory|\Illuminate\Foundation\Application|View|Application
    {
        $blog = $this->postService->findPost($id);
        return view('admin.blog.edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdatePostRequest $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(UpdatePostRequest $request, int $id): RedirectResponse
    {
        $postCheck = $this->postService->updatePost($request->validated(), $id);
        if (!$postCheck) {
            return redirect()->back()->with(['message' => __('Something went wrong Post Not Updated'),'alert-type' => 'error']);
        }
        return redirect()->route('blogs.index')->with(['message' => __('Post Updated Successfully'),'alert-type' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy(int $id): RedirectResponse
    {
        try
        {
            $this->postService->deletePost($id);
            return redirect()->route('blogs.index')->with(['message' => 'delete success!','alert-type' => 'success']);
        }catch (Exception) {
            return redirect()->route('blogs.index')->with(['message' => 'Something went wrong','alert-type' => 'error']);
        }
    }
}

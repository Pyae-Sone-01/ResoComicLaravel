<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BlogCategory\StoreBlogCategoryRequest;
use App\Interfaces\Repositories\BlogCategoryRepositoryInterface;
use App\Models\BlogCategory;
use App\Traits\Admin\AdminRolePermission;
use Illuminate\Http\Request;

class BlogCategoryController extends Controller
{
    use AdminRolePermission;


    public function __construct(private BlogCategoryRepositoryInterface $blogCategoryRepository)
    {

    }

    public function index(Request $request)
    {
        $data          = $this->blogCategoryRepository->getAll($request, $request->display);

        return view('admin.blog-category.index', compact('data'));
    }


    public function create()
    {
        return view('admin.blog-category.create');
    }


    public function store(StoreBlogCategoryRequest $request)
    {
        $this->blogCategoryRepository->create($request->toArray());

        return redirect()->route('admin.blog-category.index')->with('flash_message', 'Blog category added!');
    }



    public function edit(BlogCategory $blogCategory)
    {
        return view('admin.blog-category.edit', compact('blogCategory'));
    }


    public function update(StoreBlogCategoryRequest $request, BlogCategory $blogCategory)
    {
        $this->blogCategoryRepository->update($blogCategory,$request->toArray());

        return redirect()->route('admin.blog-category.index')->with('flash_message', 'Blog category updated!');
    }


    public function destroy(BlogCategory $blogCategory)
    {
        $this->blogCategoryRepository->delete($blogCategory);

        return redirect()->route('admin.blog-category.index')->with('flash_message', 'Blog category deleted!');
    }

    public function updateStatus(Request $request)
    {
        $blog = $this->blogCategoryRepository->updateStatus($request);

        return response()->json([
            "success"   => true,
            'isPublish' => $blog->status,
            'id'        => $blog->id,
        ]);
    }

    public function updateSort(Request $request)
    {
        $this->blogCategoryRepository->updateSort($request);

        return response()->json([
            'success' => true,
        ]);
    }
}

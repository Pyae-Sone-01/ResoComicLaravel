<?php

namespace App\Http\Controllers\Admin;

use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Blog\StoreBlogRequest;
use App\Http\Requests\Admin\Blog\UpdateBlogRequest;
use App\Interfaces\Repositories\BlogRepositoryInterface;

class BlogController extends Controller
{
    public function __construct(private BlogRepositoryInterface $blogRepository)
    {
        $this->middleware('adminHasPermission:blogs.listing')->only('index');
        $this->middleware('adminHasPermission:blogs.create')->only(['create', 'store']);
        $this->middleware('adminHasPermission:blogs.edit')->only(['edit', 'update']);
        $this->middleware('adminHasPermission:blogs.delete')->only('destroy');
    }

    public function index(Request $request)
    {
        $categories = BlogCategory::sort()->get();
        $data          = $this->blogRepository->getAll( $request,$request->display,['blogCategory','updateUser'],);

        return view('admin.blog.index')->with(['data' => $data, 'categories' => $categories]);
    }

    public function create()
    {
        $blogs      = Blog::sort()->get()->pluck('titles.tc','id')->toArray();
        $categories = BlogCategory::sort()->get();

        return view('admin.blog.create',compact('categories','blogs'));
    }

    public function store(StoreBlogRequest $request)
    {
        $this->blogRepository->create($request->toArray());

        return redirect('admin/blog')->with('flash_message', 'Blog added!');
    }

    public function edit(Blog $blog)
    {
        $blogs      = Blog::sort()->get()->pluck('titles.tc', 'id')->toArray();
        $categories = BlogCategory::sort()->get();

        return view('admin.blog.edit', compact('blog','categories','blogs'));
    }

    public function update(Blog $blog,UpdateBlogRequest $request)
    {
        $this->blogRepository->update($blog,$request->toArray());

        return redirect('admin/blog')->with('flash_message', 'Blog updated!');
    }

    public function destroy(Blog $blog)
    {
        $this->blogRepository->delete($blog);

        return redirect('admin/blog')->with('flash_message', 'Blog deleted!');
    }

    public function updateStatus(Request $request)
    {
        $blog = $this->blogRepository->updateStatus($request);

        return response()->json([
            "success"   => true,
            'isPublish' => $blog->status,
            'id'        => $blog->id,
        ]);
    }

    public function updateSort(Request $request)
    {
        $this->blogRepository->updateSort($request);

        return response()->json([
            'success' => true,
        ]);
    }
}

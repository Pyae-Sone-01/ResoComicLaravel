<?php

namespace App\Repositories;

use App\Interfaces\Repositories\BlogCategoryRepositoryInterface;
use App\Models\Blog;
use Illuminate\Support\Str;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;
// use App\Interfaces\Repositories\BlogRepositoryInterface;
use App\Models\BlogCategory;

class BlogCategoryRepository extends BaseRepository implements BlogCategoryRepositoryInterface
{
    public function __construct(BlogCategory $blogCategory)
    {
        $this->model = $blogCategory;
    }

    public function create(array $data): Model
    {
        $data['created_by']   = auth()->user()->id;
        $data['created_date'] = now();

        return $this->model->create($data);
    }

    public function update(Model $blogCategory, array $data): bool
    {
        $data['updated_by'] = auth()->user()->id;

        return $blogCategory->update($data);
    }

    public function updateStatus($request)
    {
        $blogCategory = BlogCategory::findOrFail($request->id);

        $data['updated_by'] = auth()->user()->id;
        $data['status'] = !$blogCategory->status;
        $blogCategory->update($data);

        return $blogCategory;
    }

    public function updateSort($request)
    {
        $blogCategory             = BlogCategory::findOrFail($request->sort_id);
        $blogCategory->timestamps = true;
        $blogCategory->update(['sort' => $request->sort, 'updated_by' => auth()->user()->id]);

        return $blogCategory;
    }
}

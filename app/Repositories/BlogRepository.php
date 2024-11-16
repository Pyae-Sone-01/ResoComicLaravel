<?php

namespace App\Repositories;

use App\Models\Blog;
use Illuminate\Support\Str;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use App\Interfaces\Repositories\BlogRepositoryInterface;

class BlogRepository extends BaseRepository implements BlogRepositoryInterface
{
    public function __construct(Blog $blog)
    {
        $this->model = $blog;
    }

    public function create(array $data): Model
    {
        $blogData                 = $this->getBlogData($data);
        $blogData['created_date'] = now();
        $blogData['created_by']   = auth()->user()->id;

        return $this->model->create($blogData);
    }

    public function update(Model $blog, array $data): bool
    {
        $blogData               = $this->getBlogData($data);
        $blogData['updated_by'] = auth()->user()->id;

        return $blog->update($blogData);
    }

    public function updateStatus($request)
    {
        $blog = Blog::findOrFail($request->id);
        
        $blog->update(['status' => !$blog->status]);

        return $blog;
    }
    
    public function updateSort($request)
    {
        $blog             = Blog::findOrFail($request->sort_id);
        $blog->timestamps = true;
        $blog->update(['sort' => $request->sort, 'updated_by' => auth()->user()->id]);

        return $blog;
    }

    private function getBlogData(array $data): array
    {
        $blogData = $data;

        $titles = [
            'en' => $data['title_en'],
            'tc' => $data['title_tc'],
        ];

        $short_descriptions = [
            'en' => $data['short_description_en'],
            'tc' => $data['short_description_tc'],
        ];

        $descriptions = [
            'en' => $data['description_en'],
            'tc' => $data['description_tc'],
        ];

        $meta_titles = [
            'en' => $data['meta_title_en'],
            'tc' => $data['meta_title_tc'],
        ];

        $meta_descriptions = [
            'en' => $data['meta_description_en'],
            'tc' => $data['meta_description_tc'],
        ];

        $blogData['titles']             = $titles;
        $blogData['short_descriptions'] = $short_descriptions;
        $blogData['descriptions']       = $descriptions;
        $blogData['gallery_images']     = $data['gallery_images'];
        $blogData['meta_titles']        = $meta_titles;
        $blogData['meta_descriptions']  = $meta_descriptions;
        $blogData['slug']               = Str::slug($titles['en']);

        return $blogData;
    }
}

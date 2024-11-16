<?php

namespace App\Models;

use App\Traits\Sort;
use App\Traits\Active;
use App\Traits\ActionUser;
use App\Models\BlogCategory;
use App\Builders\BlogBuilder;
use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Blog extends Model
{
    use HasFactory;
    use LogsActivity;
    use SoftDeletes;
    use Active, ActionUser, Sort;

    protected $fillable = [
        'blog_category_id',
        'titles',
        'short_descriptions',
        'descriptions',
        'slug',
        'gallery_images',
        'sort',
        'status',
        'published_status',
        'published_date',
        'meta_titles',
        'meta_descriptions',
        'meta_image',
        'related_articles',
        'created_date',
        'created_by',
        'updated_by',
    ];

    protected $casts    = [
        'titles'             => 'array',
        'short_descriptions' => 'array',
        'descriptions'       => 'array',
        'meta_titles'        => 'array',
        'meta_descriptions'  => 'array',
        'related_articles'   => 'array',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function (self $blog) {
            $blog->sort = static::max('sort') + 1;
        });
    }

    public function blogCategory()
    {
        return $this->belongsTo(BlogCategory::class, 'blog_category_id');
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['id', 'blog_category_id', 'titles', 'status', 'published_status', 'published_date', 'meta_titles', 'updated_by'])
            ->setDescriptionForEvent(function ($eventName) {
                return "Blog model has been $eventName";
            });
    }

    public function getGalleryImagesAttribute(?string $value): string
    {
        if ($value) {
            $decodedImages = json_decode($value);
            $fullUrlImages = [];
            foreach ($decodedImages as $image) {
                $fullUrlImages[] = asset($image);
            }
            return implode(',', $fullUrlImages);
        }

        return '';
    }

    public function newEloquentBuilder($query)
    {
        return new BlogBuilder($query);
    }
}

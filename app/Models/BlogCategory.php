<?php

namespace App\Models;

use App\Builders\BlogCategoryBuilder;
use App\Traits\Active;
use App\Traits\ActionUser;
use App\Traits\Sort;
use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BlogCategory extends Model
{
    use HasFactory;
    use LogsActivity;
    use SoftDeletes;
    use Active, ActionUser, Sort;

    protected $guarded = [];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['id', 'title_en', 'title_tc', 'status', 'sorting'])
            ->setDescriptionForEvent(function ($eventName) {
                return "BlogCategory model has been $eventName";
            });
    }


    public function newEloquentBuilder($query)
    {
        return new BlogCategoryBuilder($query);
    }
}

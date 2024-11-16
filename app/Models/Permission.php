<?php

namespace App\Models;

use Spatie\Activitylog\LogOptions;
use App\Builders\PermissionBuilder;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Models\Permission as SpatiePermission;

class Permission extends SpatiePermission
{
    use LogsActivity;

    protected $fillable = [
        'parent_id','name','label','guard_name','created_at','updated_at'
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['name', 'label'])
            ->setDescriptionForEvent(function ($eventName) {
                return "Permission model has been $eventName";
            });
    }

    public function newEloquentBuilder($query)
    {
        return new PermissionBuilder($query);
    }
}

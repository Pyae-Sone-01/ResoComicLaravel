<?php

namespace App\Models;

use App\Builders\RoleBuilder;
use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Permission\Models\Role as SpatieRole;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Role extends SpatieRole
{
    use LogsActivity;

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logOnly(['name', 'label'])
        ->setDescriptionForEvent(function ($eventName) {
            return "Role model has been $eventName";
        });
    }

    public function newEloquentBuilder($query)
    {
        return new RoleBuilder($query);
    }
}

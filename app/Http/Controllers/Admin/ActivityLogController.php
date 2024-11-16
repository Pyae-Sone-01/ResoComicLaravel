<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Activitylog\Models\Activity;

class ActivityLogController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = $request->display ?: 10;

        $data = Activity::with('causer')->when(request('search'), function ($query) {
            $query->where('description', 'LIKE', '%'. request('search') .'%');
        })->latest()->paginate($perPage);

        return view('admin.activity-log.index', compact('data',  'keyword', 'perPage'));
    }

    public function show($id)
    {
        $activitylog = Activity::findOrFail($id);

        return view('admin.activity-log.show', compact('activitylog'));
    }

    
    public function destroy($id)
    {
        Activity::destroy($id);

        return redirect()->route('admin.activity.log.index')->with('flash_message', 'Activity deleted!');
    }
}

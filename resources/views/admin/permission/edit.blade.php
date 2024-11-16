@extends('admin.layouts.master')
@section('title', __('backend.permission.permissions'))
@section('breadcrumb', __('backend.permission.permissions'))
@section('breadcrumb-info', __('backend.permission.edit_permission'))
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row mx-1">
                    @if ($errors->any())
                        <x-admin.errors :errors="$errors" />
                    @endif
                </div>

                {{ 
                    html()->model($permission)
                            ->form('PATCH', route('admin.permission.update', $permission))
                            ->class('form-horizontal')
                            ->open() 
                }}

                @include('admin.permission.form', ['formMode' => 'edit'])

                {{ html()->form()->close() }}

            </div>
        </div>
    </div>
@endsection

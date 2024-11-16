@extends('admin.layouts.master')
@section('title', __('backend.user.users'))
@section('breadcrumb', __('backend.user.users'))
@section('breadcrumb-info', __('backend.user.edit_user'))
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
                    html()->model($user)
                            ->form('PATCH', route('admin.user.update', $user))
                            ->class('form-horizontal')
                            ->open() 
                }}

                @include('admin.user.form', ['formMode' => 'edit'])

                {{ html()->form()->close() }}

            </div>
        </div>
    </div>
@endsection

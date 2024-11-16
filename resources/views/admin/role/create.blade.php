@extends('admin.layouts.master')
@section('title', __('backend.role.roles'))
@section('breadcrumb', __('backend.role.roles'))
@section('breadcrumb-info', __('backend.role.create_role'))
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
                    html()->form('POST', route('admin.role.store'))
                                ->class('form-horizontal')
                                ->open() 
                }}

                    @include('admin.role.form', ['formMode' => 'create'])

                {{ html()->form()->close() }}
            </div>
        </div>
    </div>
@endsection

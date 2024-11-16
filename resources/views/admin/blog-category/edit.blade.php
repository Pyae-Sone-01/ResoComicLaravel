@extends('admin.layouts.master')
@section('title', __('backend.sidebar.blog_category'))
@section('breadcrumb', __('backend.sidebar.blog_category'))
@section('breadcrumb-info', __('backend.sidebar.blog_category'))
@section('blog-catgory-active', 'active')
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
                    html()->model($blogCategory)
                            ->form('PATCH', route('admin.blog-category.update', $blogCategory))
                            ->class('form-horizontal')
                            ->open()
                }}

                @include('admin.blog-category.form', ['formMode' => 'edit'])

                {{ html()->form()->close() }}

            </div>
        </div>
    </div>
@endsection

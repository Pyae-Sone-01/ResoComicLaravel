@extends('admin.layouts.master')
@section('title', __('backend.sidebar.blog'))
@section('breadcrumb', __('backend.sidebar.blog'))
@section('breadcrumb-info', __('backend.sidebar.blog'))
@section('blog-active', 'active')

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
                    html()->form('POST', route('admin.blog.store'))
                                ->class('form-horizontal')
                                ->open()
                }}

                    @include('admin.blog.form', ['formMode' => 'create'])

                {{ html()->form()->close() }}

            </div>
        </div>
    </div>
@endsection


<div class="col-md-4">
    <div class="card mt-4">
        <div class="card-header">
            <h3 class="card-title">{{ __('backend.blog.gallery') }}</h3>
        </div>
        <div class="card-body">
            <div class="list-title mb-3">
                <label for="kt_ecommerce_add_product_store_template" class="form-label">
                    <span style="color: #B5B5C3">{{ __('backend.common.image_size') }} ( 600p x 600 )px</span>
                </label>
            </div>
            <div class="panel-block">
                <div class="form-group{{ $errors->has('gallery_images') ? 'has-error' : ''}} mb-4">
                    <ul class="dragGroup" id="holder3">
                        @if((isset($blog) && $blog->gallery_images) || is_array(old('image_order')))
                            @php
                                // $images= isset($blog->gallery_images) ? json_decode($blog->gallery_images) : old('image_order');
                                $images = isset($blog) ? explode(',', $blog->gallery_images) : ( is_array(old('image_order') ) ? old('image_order') : [] );
                            @endphp
                            @foreach ($images as $key => $img)
                                <li class="draggable lfmimage-container w-100 thumbnail3lfmc{{$key}} draggableItem{{$key}}" draggable="true" class='lfmimage-container lfmcfeatureimage'>
                                    <input type="hidden" name="image_order[]" value="{{asset($img)}}" id="galleryImage{{$key}}">
                                    <img src="{{ asset($img) }}" class='lfmimage w-100'>
                                    <div>
                                        <button type="button" onclick="removeGImage(this)" class='btn btn-sm btn-danger w-100'><i class="bi bi-trash"></i></button>
                                    </div>
                                </li>
                            @endforeach
                        @else
                            <img src="{{ asset('backend/media/laravel/images/blank-image.svg') }}" class="img-thumbnail">
                        @endif
                    </ul>
                    <div class="input-group mt-3">
                        <span class="input-group-btn">
                            <a id="lfm-pro" data-input="thumbnail3" data-ptype="g" data-preview="holder3" class="btn btn-primary text-white">
                                <i class="fa fa-picture-o"></i> {{ __('backend.blog.choose') }}
                            </a>
                        </span>
                        <input id="thumbnail3" class="form-control" type="text" name="gallery_images" multiple value="{{ isset($blog) ? $blog->gallery_images : ( is_array(old('image_order')) ? implode(", ", old('image_order')) : '' )}}" readonly>
                    </div>
                    {!! $errors->first('gallery_images', '<p class="help-block">:message</p>') !!}
                </div>
                <span class="text-warning">*{{ __('backend.blog.upload_multi_image') }}</span>
            </div>
        </div>
    </div>
    <div class="card mt-4">
        <div class="card-header">
            <div class="card-title">{{  __('backend.blog.blog_category') }}</div>
        </div>
        <div class="card-body" style="overflow-y: scroll;max-height: 200px;">
            <div class="overflow">
                <div class="overflow-hidden">
                    @foreach ($categories as $category)
                        <div class="form-check mb-5"><input type="radio" name="blog_category_id" class="form-check-input page-radio"
                            style="margin-top: 0;"
                                {{ isset($blog) ? $category->id == $blog->blog_category_id ? 'checked' : '' : ''}} value="{{ $category->id }}"/>
                            {{ $category->{'title_'.session('locale')} }}</div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="card mt-4">
        <div class="card-header">
            <div class="card-title">
                {{ __('backend.blog.related_articles') }}
            </div>
        </div>
        <div class="card-body">
            <div class="row" id="hk-product">
                <div class="col-md-12">
                    <div class="form-group{{ $errors->has('related_articles') ? 'has-error' : ''}}">
                        {{ html()->label(__('backend.blog.related_articles'), 'related_articles')->class('control-label mb-3') }}
                        {{ html()->multiselect('related_articles[]',$blogs)
                                    ->value(isset($blog) && isset($blog->related_articles) ? $blog->related_articles : null)
                                    ->class('form-select form-select-lg form-select h-150px overflow-scroll')
                                    ->attribute('data-control', 'select2')
                                    ->attribute('data-placeholder', __('backend.blog.related_articles'))
                                    ->attribute('data-allow-clear', 'true')
                                    ->attribute('multiple', 'multiple')
                        }}
                        {!! $errors->first('related_articles', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card mt-4">
        <div class="card-header">
            <h3 class="card-title">
                {{  __('backend.blog.publish_status') }}
            </h3>
        </div>
        <div class="card-body">
            <div class="card-body pt-0" style="padding-left: 0 !important; padding-right: 0 !important;">
                <div class="d-flex justify-content nopadding">
                    <label for="" class="control-label">{{  __('backend.blog.current_status') }}</label>
                    @if(isset($blog))
                        @if($blog->published_status == 1 )
                            <p style="padding-left: 15px;">{{  __('backend.blog.published') }}</p>
                        @else
                            <p style="padding-left: 15px;">{{  __('backend.blog.draft') }}</p>
                        @endif
                    @else
                        <p style="padding-left: 15px;">{{  __('backend.blog.draft') }}</p>
                    @endif
                </div>
                <div class="row mt-4">
                    <div class="col-md-3 mt-2 publish-change-to">
                        {{  __('backend.blog.change_to') }}
                    </div>
                    <div class="col-md-4 publish-status">
                        <div class="card-toolbar">
                            <div class="d-flex justify-content-center">
                                <select class="filters form-select form-select-sm" data-control="select2" data-hide-search="true" placeholder="Select" data-placeholder="Select" style="min-width: 95px;" name="published_status" id="published-status">
                                    <option></option>
                                    <option value="1" @if(isset($blog)) {{ $blog->published_status == 1 ? 'selected' : '' }} @endif>Published</option>
                                    <option value="0" @if(isset($blog)) {{ $blog->published_status == 0 ? 'selected' : '' }} @endif>Draft</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-1 mt-2 publish-on" style="padding : 0; text-align: center;">
                        {{  __('backend.blog.on') }}
                    </div>
                    <div class="col-md-4 publish-date">
                        <div class="form-group{{ $errors->has('published_date') ? 'has-error' : ''}}">
                            {{ html()->label(__('backend.blog.publish_date'), 'published_date')->class('control-label mb-3 required') }}
                            {{ html()->date('published_date')->class('form-control published-date') }}
                            {!! $errors->first('published_date', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

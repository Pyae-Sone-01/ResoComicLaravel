@php
    $formLabel = $formMode === 'create' ? __('backend.common.create') : __('backend.common.edit'); ;
@endphp
<div class="row">
    <div class="col-md-8">
        <h2 class="fs-1"> {{ $formLabel }}  {{ __('backend.permission.permissions') }}</h2>
    </div>
    <div class="col-md-4 text-end">
        <div class="form-group">
            <div class="form-group">
                <div class="float-left">
                    <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i>
                        {{ __('backend.common.save') }}</button>
                    <button type="button" class="btn btn-secondary cancel" onclick="window.location='{{ url('/admin/permissions')}}'"><i class="bi bi-x"
                            aria-hidden="true"></i> {{ __('backend.common.cancel') }}</button>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row mt-4">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : ''}}">
                            <div class="list-title mb-3">
                                {{ html()->label(__('backend.permission.name'), 'name')->class('control-label mb-3 required') }}
                            </div>
                            {{ html()->text('name')->class('form-control') }}
                            {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-md-12">
                        <div class="form-group{{ $errors->has('label') ? ' has-error' : ''}}">
                            <div class="list-title mb-3">
                                {{ html()->label(__('backend.permission.label'), 'label')->class('control-label mb-3 required') }}
                            </div>
                            {{ html()->input('text', 'label')->class('form-control') }}
                            {!! $errors->first('label', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
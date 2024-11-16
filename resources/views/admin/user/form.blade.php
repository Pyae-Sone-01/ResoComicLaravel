@php
    $formLabel = $formMode === 'create' ? __('backend.common.create') : __('backend.common.edit'); ;
@endphp
<div class="row">
    <div class="col-md-8">
        <h2 class="fs-1"> {{ $formLabel }} {{ __('backend.user.users') }} </h2>
    </div>
    <div class="col-md-4 text-end">
        <div class="form-group">
            <div class="form-group">
                <div class="float-left">
                    <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i>
                        {{ __('backend.common.save') }}</button>
                    <button type="button" class="btn btn-secondary cancel" onclick="window.location='{{ url('/admin/users')}}'"><i class="bi bi-x"
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
                                {{ html()->label(__('backend.user.name'), 'name')->class('control-label mb-3 required') }}
                            </div>
                            {{ html()->input('text', 'name')->class('form-control') }}
                            {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-md-12">
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : ''}}">
                            <div class="list-title mb-3">
                                {{ html()->label(__('backend.user.email'), 'email')->class('control-label mb-3 required') }}
                            </div>
                            {{ html()->input('email', 'email')->class('form-control') }}
                            {!! $errors->first('email', '<p class="text-danger">:message</p>') !!}
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-md-12">
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : ''}}">
                            <div class="list-title mb-3">
                                {{ html()->label(__('backend.user.password'), 'password')->class('control-label mb-3 required') }}
                            </div>
                            @php
                                $passwordOptions = ['class' => 'form-control required'];
                                if ($formMode === 'create') {
                                    $passwordOptions = array_merge($passwordOptions, ['required' => 'required']);
                                }
                            @endphp
                            {{ html()->input('password', 'password')->class('form-control') }}
                            {!! $errors->first('password', '<p class="text-danger">:message</p>') !!}
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-md-12">
                        <div class="form-group{{ $errors->has('roles') ? ' has-error' : ''}}">
                            <div class="list-title mb-3">
                                {{ html()->label(__('backend.user.role'), 'role')->class('control-label mb-3 required') }}
                            </div>
                            @if ($formMode === 'create')
                                {{ html()->select('roles[]',$roles, null)->class('form-control') }}
                            @else
                                {{ html()->select('roles[]', $roles,$user->roles->pluck('id')->toArray())->class('form-control') }}
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@php
    $formLabel = $formMode === 'create' ? __('backend.common.create') : __('backend.common.edit'); ;
@endphp
<div class="row">
    <div class="col-md-8">
        <h2 class="fs-1">  {{ $formLabel }} {{ __('backend.role.roles') }}</h2>
    </div>
    <div class="col-md-4 text-end">
        <div class="form-group">
            <div class="form-group">
                <div class="float-left">
                    <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i>
                        {{ __('backend.common.save') }}</button>
                    <button type="button" class="btn btn-secondary cancel" onclick="window.location='{{ url('/admin/roles')}}'"><i class="bi bi-x"
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
                                {{ html()->label(__('backend.role.name'), 'name')->class('control-label mb-3 required') }}
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
                                {{ html()->label(__('backend.role.label'), 'label')->class('control-label mb-3 required') }}
                            </div>
                            {{ html()->input('text', 'label')->class('form-control') }}
                            {!! $errors->first('label', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                </div>

                <label class="mt-4">{{ __('backend.role.permissions') }}</label>
                <div class="row-cols-xl-4 g-5 g-xl-9 mt-4{{ $errors->has('permissions') ? ' has-error' : ''}}" style="overflow: scroll; height: 450px; border: 1px solid #eceac9;">
                    <table class="table table-stripped table-hover">
                        @foreach($permissions as $item)
                            @if($item->parent_id == 0)
                                <tr class="parent" style="background-color: #e7eaec;">
                                    <td class="p-5">
                                        <strong style="text-align: center;">{{ $item->label }}</strong>
                                    </td>
                                    <td>
                                        <input type="checkbox" class="form-check-input check-all" id="check-all">
                                    </td>
                                </tr>
                            @else
                            <tr class="child">
                                    <td class="ps-12">
                                        {{$item->label}}
                                    </td>
                                    <td>
                                        @if($formMode === 'edit')
                                            <input class="form-check-input"  type="checkbox" name="permissions[]" value="{{ $item->id }}" {{ in_array($item->id, $role->permissions->pluck('id')->toArray() ) ? 'checked' : '' }}>
                                        @else
                                            <input class="form-check-input" type="checkbox" name="permissions[]" value="{{ $item->id }}">
                                        @endif
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
<script>
    var $checkAll = $(".check-all");
    $checkAll.click(function(e){
        var $children = $(this).parents('tr').nextUntil('tr.parent');
        var $input = $children.find('input');
        $input.prop('checked', this.checked);
    });

    $(".parent").each(function(i, $parent) {
        var $childrenOfParent = $($parent).nextUntil('tr.parent');
        $childrenOfParent.click(function() {
            var totalCount   = $childrenOfParent.length;
            var checkedCount = $childrenOfParent.filter(function(count,$child){

                return $($child).find('input').prop('checked');
            }).length;
            $($parent).find('input').prop('checked',totalCount === checkedCount);
        });
    });
</script>
@endpush

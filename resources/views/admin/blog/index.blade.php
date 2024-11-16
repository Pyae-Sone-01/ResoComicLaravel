@extends('admin.layouts.master')
@section('title',  __('backend.sidebar.blog'))
@section('breadcrumb',  __('backend.sidebar.blog'))
@section('breadcrumb-info',  __('backend.sidebar.blog'))
@section('blog-active', 'active')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header border-0">
                        <h3 class="card-title">
                            {{  __('backend.sidebar.blog') }}
                        </h3>
                        <div class="card-toolbar">
                            <a href="{{ url('/admin/blog/create') }}" class="btn btn-primary " title="Add New User">
                                <i class="bi bi-plus-lg"></i> {{  __('backend.common.add_new') }}
                            </a>
                        </div>
                    </div>
                    <form method="get" action="{{ url('/admin/blog') }}" id="blog-form" class="filter-clear-form">
                        <div class="card-header border-0">
                            <div class="card-title filter-style">
                                <div class="filter-section d-flex align-items-center position-relative my-1 me-3">
                                    <div class="input-group input-group">
                                        <input type="text" id="search" class="search-box form-control form-control-solid" aria-label="Sizing example input" name="search"
                                            placeholder="{{ __('backend.filter.search') }}" aria-describedby="inputGroup-sizing-sm"
                                            @isset(request()->search) value="{{ request()->search }}" @endisset style="background-color: #F3F6F9;">
                                            @if(request()->search)<i class="bi bi-x" onclick="clearSearch()" style="position: absolute; top: 11px; right: 70px; font-size: 22px;"></i>@endif
                                        <button class="btn btn-sm btn-secondary input-group-text" type="submit">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="currentColor"></rect>
                                                <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="currentColor"></path>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                                <div class="filter-section">
                                    <div class="card-toolbar mx-4">
                                        <label class="fs-7 me-3 fw-bold text-gray-600">{{  __('backend.filter.status') }}</label>
                                        <div class="d-flex justify-content-center min-w-150px">
                                            <select class="form-select form-select-solid" id="status" name="status" data-control="select2" data-hide-search="true" data-placeholder="{{  __('backend.filter.status') }}" data-kt-ecommerce-product-filter="status" data-allow-clear="true">
                                                <option></option>
                                                <option value="all" {{ Request::get('status') == 'all' ? 'selected' : '' }}>{{  __('backend.filter.all') }}</option>
                                                <option value="1" {{ Request::get('status') == '1' ? 'selected' : '' }}>{{  __('backend.filter.active') }}</option>
                                                <option value="0" {{ Request::get('status') == '0' ? 'selected' : '' }}>{{  __('backend.filter.inactive') }}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>


                                <div class="filter-section">
                                    <div class="card-toolbar mx-4">
                                        <label
                                            class="fs-7 me-3 fw-bold text-gray-600">{{ __('backend.filter.category') }}</label>
                                        <div class="d-flex justify-content-center min-w-150px">
                                            <select class="form-select form-select-solid" id="categoryFilter" name="category"
                                                data-control="select2" data-hide-search="true"
                                                data-placeholder="{{ __('backend.filter.category') }}"
                                                data-kt-ecommerce-product-filter="status" data-allow-clear="true">
                                                <option></option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}"
                                                        {{ Request::get('category') == $category->id ? 'selected' : '' }}>
                                                        {{  $category->{'title_'.session('locale')} }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="card-toolbar">
                                <x-admin.table-display />
                            </div>
                        </div>
                    </form>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table align-middle table-row-bordered fs-6 gy-5 dataTable no-footer">
                                <thead>
                                    <tr class="text-start text-gray-600 fw-boldest fs-7 text-uppercase gs-0">
                                        <th class="w-50px" style="padding-left: 10px;">#</th>
                                        <th class="min-w-250px">{{  __('backend.blog.blog_title') }}</th>
                                        <th class="min-w-150px">{{  __('backend.blog.blog_category') }}</th>
                                        <th class="min-w-100px">{{  __('backend.common.enable') }}</th>
                                        <th class="min-w-200px">{{ __('backend.common.sorting') }}</th>
                                        <th class="min-w-150px">{{  __('backend.common.last_updated') }}</th>
                                        <th class="sticky text-center min-w-150px">{{  __('backend.common.actions') }}</th>
                                    </tr>
                                </thead>
                                <tbody class="fw-bold text-gray-600">
                                    @foreach($data as $item)
                                        <tr>
                                            <td style="padding-left: 10px;">{{ $loop->iteration }}</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                        <div>
                                                            {{ isset($item) && isset($item->titles) ? $item->titles[session('locale')] : '' }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                {{ isset($item) && isset($item->blogCategory) ? $item->blogCategory->{'title_' . session('locale')} : '' }}
                                            </td>
                                            <td>
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" id="switcher_checkbox_{{ $item->id }}"
                                                        type="checkbox" onclick="statusChange({{ $item->id }}, '/admin/blog/update-status')"
                                                        name="status{{ $item->id }}"
                                                        {{ $item->status ? 'checked' : '' }}>
                                                </div>
                                            </td>
                                            <td>
                                                <input type="number" id="sortInput" style="width:100px" name="sort{{$item->id}}" min="1" value="{{ $item->sort}}" class="sortVal">
                                                <button type="button" class="btn btn-icon btn-active-light-info btn btn-info w-30px h-30px updatesort" data-sort={{$item->sort}} data-sort-id={{$item->id}}><i class="fa fa-save ico"></i></button>
                                                <div id="msgSort" style="color: blue" class="sorting"></div>
                                            </td>
                                            <td>
                                                <span class="fw-bolder text-gray-600">{{ $item->updateUser ? $item->updateUser->name : ($item->createUser ? $item->createUser->name : '') }}</span><br>
                                                <span class="text-muted">{{ $item->updated_at }}</span>
                                            </td>
                                            <td class="sticky text-center">
                                                <a href="{{ route('admin.blog.edit', $item)}}" title="Edit Blog">
                                                    <button class="btn btn-icon btn-active-light-primary btn btn-primary w-30px h-30px"><i class="bi bi-pencil-square" aria-hidden="true"></i></button></a>
                                                <form method="POST" action="{{ route('admin.blog.destroy', $item)  }}" class="deleteForm" style="display: inline;">
                                                    <input name="_method" type="hidden" value="DELETE">
                                                    <input name="_token" type="hidden" value="{{ csrf_token() }}">
                                                    <button type="submit" class="btn btn-icon btn-active-light-danger btn btn-danger w-30px h-30px show_confirm_delete" title='Delete'><i class="bi bi-trash" aria-hidden="true"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="row my-3">
                            <div class="col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start">
                                {{ Admin::tableLength($data) }}
                            </div>
                            <div class="col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end">
                                <div class="pagination-wrapper"> {!! $data->appends([
                                    'search'  => Request::get('search'),
                                    'page'    => Request::get('page'),
                                    'status'  => Request::get('status'),
                                    'display' => Request::get('display'),
                                ])->links('pagination::bootstrap-4')->render() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
            $('#status').on('change', function() {
                $('#blog-form').submit();
            });

            $('#display').on('change', function () {
                $('#blog-form').submit();
            })

            $('#categoryFilter').on('change', function() {
                $('#blog-form').submit();
            })

            $('.updatesort').click(function(){
                var sort_id = $(this).attr('data-sort-id');
                var sort    = $("input[name=sort"+sort_id+"]").val();

                axios({
                    method: 'post',
                    url   : '/admin/blog/update-sort',
                    data: { sort_id : sort_id, sort: sort},
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                }).then(function(response) {
                    // location.reload(true);
                    toastr.success("產品排序更新成功");
                })
                .catch(function(error) {
                    console.error("There was an error!", error);
                });
            })
        })
    </script>
@endpush

<div id="kt_aside" class="aside aside-dark aside-hoverable" data-kt-drawer="true" data-kt-drawer-name="aside"
    data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true"
    data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="start"
    data-kt-drawer-toggle="#kt_aside_mobile_toggle">
    <div class="aside-logo flex-column-auto" id="kt_aside_logo">
        <a href="#">
            <img alt="Logo" src="{{ asset('backend/media/laravel/images/laravel-sidebar-logo.svg') }}"
                class="logo" style="width: 100%; height: 50px;" />
        </a>
        <div id="kt_aside_toggle" class="btn btn-icon w-auto px-0 btn-active-color-primary aside-toggle"
            data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body"
            data-kt-toggle-name="aside-minimize">
            <span class="svg-icon svg-icon-1 rotate-180">
                <svg xmlns="{{ asset('bootstrap-icons') }}" width="24" height="24" viewBox="0 0 24 24"
                    fill="none">
                    <path opacity="0.5"
                        d="M 14.3 11.4 L 18.4 7.3 C 18.9 6.8 18.9 6.2 18.4 5.8 C 18 5.3 17.4 5.3 16.9 5.8 L 11.4 11.3 C 11 11.7 11 12.3 11.4 12.7 L 16.9 18.3 C 17.4 18.7 18 18.7 18.4 18.3 C 18.9 17.8 18.9 17.2 18.4 16.8 L 14.3 12.6 C 14 12.3 14 11.7 14.3 11.4 Z"
                        fill="currentColor" />
                    <path
                        d="M 8.3 11.4 L 12.4 7.3 C 12.9 6.8 12.9 6.2 12.4 5.8 C 12 5.3 11.4 5.3 10.9 5.8 L 5.4 11.3 C 5 11.7 5 12.3 5.4 12.7 L 10.9 18.3 C 11.4 18.7 12 18.7 12.4 18.3 C 12.9 17.8 12.9 17.2 12.4 16.8 L 8.3 12.6 C 8 12.3 8 11.7 8.3 11.4 Z"
                        fill="currentColor" />
                </svg>
            </span>
        </div>
    </div>
    <div class="aside-menu flex-column-fluid">
        <div class="hover-scroll-overlay-y my-5 my-lg-5" id="kt_aside_menu_wrapper" data-kt-scroll="true"
            data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-height="auto"
            data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_footer" data-kt-scroll-wrappers="#kt_aside_menu"
            data-kt-scroll-offset="0">
            <div class="menu menu-column menu-title-gray-800 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500"
                id="#kt_aside_menu" data-kt-menu="true" data-kt-menu-expand="false">
                {{--
                    --------------------------------------------------------------------------
                    -- Dashboard
                    --------------------------------------------------------------------------
                    --}}
                @can('dashboard.listing')
                    <x-admin.side-bar.menu-title :title="__('backend.sidebar.main')" />
                    <x-admin.side-bar.menu-link :title="__('backend.sidebar.dashboard')" :route="route('admin.dashboard')" :active="['admin.dashboard.*']">
                        @slot('icon')
                            <svg xmlns="{{ asset('bootstrap-icons') }}" width="16" height="16" fill="#009EF7"
                                class="bi bi-grid" viewBox="0 0 16 16">
                                <path
                                    d="M 1 2.5 A 1.5 1.5 0 0 1 2.5 1 h 3 A 1.5 1.5 0 0 1 7 2.5 v 3 A 1.5 1.5 0 0 1 5.5 7 h -3 A 1.5 1.5 0 0 1 1 5.5 v -3 z M 2.5 2 a 0.5 0.5 0 0 0 -0.5 0.5 v 3 a 0.5 0.5 0 0 0 0.5 0.5 h 3 a 0.5 0.5 0 0 0 0.5 -0.5 v -3 a 0.5 0.5 0 0 0 -0.5 -0.5 h -3 z m 6.5 0.5 A 1.5 1.5 0 0 1 10.5 1 h 3 A 1.5 1.5 0 0 1 15 2.5 v 3 A 1.5 1.5 0 0 1 13.5 7 h -3 A 1.5 1.5 0 0 1 9 5.5 v -3 z m 1.5 -0.5 a 0.5 0.5 0 0 0 -0.5 0.5 v 3 a 0.5 0.5 0 0 0 0.5 0.5 h 3 a 0.5 0.5 0 0 0 0.5 -0.5 v -3 a 0.5 0.5 0 0 0 -0.5 -0.5 h -3 z M 1 10.5 A 1.5 1.5 0 0 1 2.5 9 h 3 A 1.5 1.5 0 0 1 7 10.5 v 3 A 1.5 1.5 0 0 1 5.5 15 h -3 A 1.5 1.5 0 0 1 1 13.5 v -3 z m 1.5 -0.5 a 0.5 0.5 0 0 0 -0.5 0.5 v 3 a 0.5 0.5 0 0 0 0.5 0.5 h 3 a 0.5 0.5 0 0 0 0.5 -0.5 v -3 a 0.5 0.5 0 0 0 -0.5 -0.5 h -3 z m 6.5 0.5 A 1.5 1.5 0 0 1 10.5 9 h 3 a 1.5 1.5 0 0 1 1.5 1.5 v 3 a 1.5 1.5 0 0 1 -1.5 1.5 h -3 A 1.5 1.5 0 0 1 9 13.5 v -3 z m 1.5 -0.5 a 0.5 0.5 0 0 0 -0.5 0.5 v 3 a 0.5 0.5 0 0 0 0.5 0.5 h 3 a 0.5 0.5 0 0 0 0.5 -0.5 v -3 a 0.5 0.5 0 0 0 -0.5 -0.5 h -3 z" />
                            </svg>
                        @endslot
                    </x-admin.side-bar.menu-link>
                @endcan
                {{--
                    --------------------------------------------------------------------------
                    -- Pages
                    --------------------------------------------------------------------------
                    --}}
                <x-admin.side-bar.menu-title :title="__('backend.sidebar.pages')" />
                

                {{-- blog start --}}
                @canany(['blogs.listing'])
                    <x-admin.side-bar.menu-accordion :title="__('backend.sidebar.blog')" :active="['admin.blog*']">
                        @slot('icon')
                            <svg xmlns="{{ asset('bootstrap-icons') }}" width="16" height="16" fill="#009EF7"
                                class="bi bi-journals" viewBox="0 0 16 16">
                                <path
                                    d="M5 0h8a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2 2 2 0 0 1-2 2H3a2 2 0 0 1-2-2h1a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1H1a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v9a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H5a1 1 0 0 0-1 1H3a2 2 0 0 1 2-2z" />
                                <path
                                    d="M1 6v-.5a.5.5 0 0 1 1 0V6h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V9h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 2.5v.5H.5a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1H2v-.5a.5.5 0 0 0-1 0z" />
                            </svg>
                        @endslot
                        @slot('menu')
                            @can('blogs.listing')
                                <x-admin.side-bar.menu-item :title="__('backend.sidebar.blog_category')" :active="['admin.blog-category.*']" :route="route('admin.blog-category.index')" />
                            @endcan
                            @can('blogs.listing')
                                <x-admin.side-bar.menu-item :title="__('backend.sidebar.blog')" :active="['admin.blog.*']" :route="route('admin.blog.index')" />
                            @endcan
                        @endslot
                    </x-admin.side-bar.menu-accordion>
                @endcan

                {{--
                    --------------------------------------------------------------------------
                    -- Media Library
                    --------------------------------------------------------------------------
                    --}}
                @can('media_library.listing')
                    <x-admin.side-bar.menu-title :title="__('backend.sidebar.media')" />
                    <x-admin.side-bar.menu-link :title="__('backend.sidebar.media_library')" :route="route('admin.file.manager.index')" :active="['admin.file.manager', 'admin.file.manager.*']">
                        @slot('icon')
                            <svg xmlns="{{ asset('bootstrap-icons') }}" width="16" height="16" fill="#009EF7"
                                class="bi bi-images" viewBox="0 0 16 16">
                                <path d="M4.502 9a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z" />
                                <path
                                    d="M14.002 13a2 2 0 0 1-2 2h-10a2 2 0 0 1-2-2V5A2 2 0 0 1 2 3a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2v8a2 2 0 0 1-1.998 2zM14 2H4a1 1 0 0 0-1 1h9.002a2 2 0 0 1 2 2v7A1 1 0 0 0 15 11V3a1 1 0 0 0-1-1zM2.002 4a1 1 0 0 0-1 1v8l2.646-2.354a.5.5 0 0 1 .63-.062l2.66 1.773 3.71-3.71a.5.5 0 0 1 .577-.094l1.777 1.947V5a1 1 0 0 0-1-1h-10z" />
                            </svg>
                        @endslot
                    </x-admin.side-bar.menu-link>
                @endcan
                {{--
                    --------------------------------------------------------------------------
                    -- General Setting
                    --------------------------------------------------------------------------
                    --}}


                @if (
                    (auth()->user()->email == 'laraadmin@laravel.com' && auth()->user()->hasRole('Admin')) ||
                        auth()->user()->hasRole(strtolower('Admin')) ||
                        auth()->user()->hasRole(strtoupper('Admin')))
                    @canany(['users.listing', 'roles.listing', 'permissions.listing'])
                        <x-admin.side-bar.menu-title :title="__('backend.sidebar.general_setting')" />
                        <x-admin.side-bar.menu-accordion :title="__('backend.sidebar.backend_user')" :active="['admin.user.*', 'admin.role.*', 'admin.permission.*']">
                            @slot('icon')
                                <svg xmlns="{{ asset('bootstrap-icons') }}" width="16" height="16" fill="#009EF7"
                                    class="bi bi-gear" viewBox="0 0 16 16">
                                    <path
                                        d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492zM5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0z" />
                                    <path
                                        d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52l-.094-.319zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115l.094-.319z" />
                                </svg>
                            @endslot
                            @slot('menu')
                                @can('users.listing')
                                    <x-admin.side-bar.menu-item :title="__('backend.sidebar.user')" :active="['admin.user.*']" :route="route('admin.user.index')" />
                                @endcan
                                @can('roles.listing')
                                    <x-admin.side-bar.menu-item :title="__('backend.sidebar.role')" :active="['admin.role.*']" :route="route('admin.role.index')" />
                                @endcan
                                @can('permissions.listing')
                                    <x-admin.side-bar.menu-item :title="__('backend.sidebar.permission')" :active="['admin.permission.*']" :route="route('admin.permission.index')" />
                                @endcan
                            @endslot
                        </x-admin.side-bar.menu-accordion>
                    @endcan
                @endif

                {{--
                --------------------------------------------------------------------------
                -- Sticky Sidebar
                --------------------------------------------------------------------------
                --}}
                <div class="sticky-sidebar">
                    <div class="menu-item">
                        <div class="">
                            <div class="separator mx-1 my-4"></div>
                        </div>
                    </div>
                    <div class="menu-item">
                        <a class="menu-link" href="#">
                            <span class="menu-icon">
                                <span class="svg-icon svg-icon-2">
                                    <svg xmlns="{{ asset('bootstrap-icons') }}" width="16" height="16"
                                        fill="#009EF7" class="bi bi-headset" viewBox="0 0 16 16">
                                        <path
                                            d="M 8 1 a 5 5 0 0 0 -5 5 v 1 h 1 a 1 1 0 0 1 1 1 v 3 a 1 1 0 0 1 -1 1 H 3 a 1 1 0 0 1 -1 -1 V 6 a 6 6 0 1 1 12 0 v 6 a 2.5 2.5 0 0 1 -2.5 2.5 H 9.4 a 1 1 0 0 1 -0.9 0.5 h -1 a 1 1 0 1 1 0 -2 h 1 a 1 1 0 0 1 0.9 0.5 H 11.5 A 1.5 1.5 0 0 0 13 12 h -1 a 1 1 0 0 1 -1 -1 V 8 a 1 1 0 0 1 1 -1 h 1 V 6 a 5 5 0 0 0 -5 -5 z" />
                                    </svg>
                                </span>
                            </span>
                            <span class="menu-title">{{ __('backend.sidebar.look_for_support') }}</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a class="menu-link" href="#">
                            <span class="menu-icon">
                                <span class="svg-icon svg-icon-2">
                                    <svg xmlns="{{ asset('bootstrap-icons') }}" width="16" height="16"
                                        fill="#009EF7" class="bi bi-telephone-outbound" viewBox="0 0 16 16">
                                        <path
                                            d="M 3.7 1.3 a 0.7 0.7 0 0 0 -1 -0.1 L 1.6 2.3 c -0.5 0.5 -0.7 1.2 -0.5 1.8 a 17.6 17.6 0 0 0 4.2 6.6 a 17.6 17.6 0 0 0 6.6 4.2 c 0.6 0.2 1.3 0 1.8 -0.5 l 1 -1 a 0.7 0.7 0 0 0 -0.1 -1 l -2.3 -1.8 a 0.7 0.7 0 0 0 -0.6 -0.1 l -2.2 0.5 a 1.7 1.7 0 0 1 -1.7 -0.5 L 5.5 8.1 a 1.7 1.7 0 0 1 -0.5 -1.7 l 0.5 -2.2 a 0.7 0.7 0 0 0 -0.1 -0.6 L 3.7 1.3 z M 1.9 0.5 a 1.7 1.7 0 0 1 2.6 0.2 L 6.3 3 c 0.3 0.4 0.4 1 0.3 1.5 l -0.5 2.2 a 0.7 0.7 0 0 0 0.2 0.6 l 2.5 2.5 a 0.7 0.7 0 0 0 0.6 0.2 l 2.2 -0.5 a 1.7 1.7 0 0 1 1.5 0.3 l 2.3 1.8 c 0.8 0.6 0.9 1.9 0.2 2.6 l -1 1 c -0.7 0.7 -1.8 1.1 -2.9 0.7 a 18.6 18.6 0 0 1 -7 -4.4 a 18.6 18.6 0 0 1 -4.4 -7 c -0.4 -1 0 -2.1 0.7 -2.9 L 1.9 0.5 z M 11 0.5 a 0.5 0.5 0 0 1 0.5 -0.5 h 4 a 0.5 0.5 0 0 1 0.5 0.5 v 4 a 0.5 0.5 0 0 1 -1 0 V 1.7 l -4.1 4.1 a 0.5 0.5 0 0 1 -0.7 -0.7 L 14.3 1 H 11.5 a 0.5 0.5 0 0 1 -0.5 -0.5 z" />
                                    </svg>
                                </span>
                            </span>
                            <span class="menu-title">{{ __('backend.sidebar.contact_web_developer') }}</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a class="menu-link" href="{{ url('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <span class="menu-icon">
                                <span class="svg-icon svg-icon-2">
                                    <svg xmlns="{{ asset('bootstrap-icons') }}" width="16" height="16"
                                        fill="#009EF7" class="bi bi-power" viewBox="0 0 16 16">
                                        <path d="M 7.5 1 v 7 h 1 V 1 h -1 z" />
                                        <path
                                            d="M 3 8.8 a 5 5 0 0 1 2.6 -4.4 l -0.5 -0.9 A 6 6 0 1 0 11 3.6 l -0.5 0.9 A 5 5 0 1 1 3 8.8 z" />
                                    </svg>
                                </span>
                            </span>
                            <span class="menu-title sidebar-text">{{ __('backend.sidebar.logout') }}</span>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                @csrf
                            </form>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

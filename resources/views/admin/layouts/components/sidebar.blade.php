<nav id="sidebar" class="sidebar js-sidebar">
    @if(\Illuminate\Support\Facades\App::getLocale() == 'ar')
        <div class="sidebar-content js-simplebar" data-simplebar-direction='rtl'>
            @else
                <div class="sidebar-content js-simplebar">
                    @endif
                    <a class="sidebar-brand" href="#">
            <span class="sidebar-brand-text align-middle">
            <img src="https://hwdolive.hilwawater.sa/images/hilwa-water-logo.svg" alt="" height="80px" width="180px">
            </span>
                    </a>

                    <div class="sidebar-user">
                        <div class="d-flex justify-content-center">
                            <div class="flex-shrink-0">
                                <img src="{{URL::asset('storage/img/'.auth('admin')->user()->image)}}"
                                     class="avatar img-fluid rounded me-1" alt="Administrator"/>
                            </div>
                            <div class="flex-grow-1 ps-2">
                                <a class="sidebar-user-title dropdown-toggle" href="#" data-bs-toggle="dropdown">
                                    {{auth()->user()->name}}
                                </a>
                                <div class="dropdown-menu dropdown-menu-start">
                                    <a class="dropdown-item" href="#"><i class="align-middle me-1"
                                                                         data-feather="settings"></i> {{__('admin/layouts/components/sidebar.settings')}}
                                    </a>
                                    <div class="dropdown-divider"></div>
                                                                        <form method="post" action="{{route('admin.logout')}}">
                                                                            @csrf
                                                                            <button type="submit" class="dropdown-item">
                                                                                <i class="align-middle me-2" data-feather="log-out"></i>
                                                                                {{__('admin/layouts/components/sidebar.logout')}}
                                                                            </button>
                                                                        </form>
                                </div>

                                <div
                                    class="sidebar-user-subtitle">{{--{{auth('admin')->user()->roles->pluck('name','name')->first()}}--}}</div>
                            </div>
                        </div>
                    </div>

                    <ul class="sidebar-nav">
                        <li class="sidebar-header"></li>
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link">
                                <i class="align-middle" data-feather="sliders"></i> <span
                                    class="align-middle">{{__('admin/layouts/components/sidebar.dashboard')}}</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a data-bs-target="#categories" data-bs-toggle="collapse" class="sidebar-link collapsed">
                                <i class="align-middle me-2 fas fa-fw fa-list"></i> <span
                                    class="align-middle">{{__('admin/layouts/components/sidebar.categories')}}</span>
                            </a>
                            <ul id="categories" class="sidebar-dropdown list-unstyled collapse {{request()->route()->named(['types.index','categories.index']) ? 'show' : ''}}" data-bs-parent="#sidebar">
                                <li class="sidebar-item {{request()->route()->named('types.index') ? 'active' : ''}}"><a class="sidebar-link"
                                                            href="{{route('types.index')}}">{{__('admin/layouts/components/sidebar.types')}}</a></li>
                                <li class="sidebar-item {{request()->route()->named('categories.index') ? 'active' : ''}}"><a class="sidebar-link"
                                                            href="{{route('categories.index')}}">{{__('admin/layouts/components/sidebar.categories')}}</a></li>
                            </ul>
                        </li>

                        <li class="sidebar-item">
                            <a data-bs-target="#location" data-bs-toggle="collapse" class="sidebar-link collapsed">
                                <i class="fas fa-globe"></i> <span
                                    class="align-middle">{{__('admin/layouts/components/sidebar.location.management')}}</span>
                            </a>
                            <ul id="location" class="sidebar-dropdown list-unstyled collapse {{request()->route()->named(['zones.index','cities.index']) ? 'show' : ''}}" data-bs-parent="#sidebar">
                                <li class="sidebar-item {{request()->route()->named('zones.index') ? 'active' : ''}}"><a class="sidebar-link"
                                                            href="{{route('zones.index')}}">{{__('admin/layouts/components/sidebar.zones')}}</a></li>
                                <li class="sidebar-item {{request()->route()->named('cities.index') ? 'active' : ''}}"><a class="sidebar-link"
                                                            href="{{route('cities.index')}}">{{__('admin/layouts/components/sidebar.cites')}}</a></li>
                            </ul>
                        </li>

                        <li class="sidebar-item">
                            <a class="sidebar-link" href="#">
                                <i class="fas fa-star"></i>
                                <span
                                    class="align-middle">{{__('admin/layouts/components/sidebar.services')}}</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a data-bs-target="#ad" data-bs-toggle="collapse" class="sidebar-link collapsed">
                                <i class="fas fa-ad"></i> <span
                                    class="align-middle">{{__('admin/layouts/components/sidebar.advertisements')}}</span>
                            </a>
                            <ul id="ad" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
                                <li class="sidebar-item"><a class="sidebar-link"
                                                            href="#">{{__('admin/layouts/components/sidebar.advertisements')}}</a></li>
                                <li class="sidebar-item"><a class="sidebar-link"
                                                            href="#">{{__('admin/layouts/components/sidebar.advertising.requests')}}</a></li>
                            </ul>
                        </li>

                        <li class="sidebar-item">
                            <a data-bs-target="#settings" data-bs-toggle="collapse" class="sidebar-link collapsed">
                                <i class="fas fa-cogs"></i><span
                                    class="align-middle">{{__('admin/layouts/components/sidebar.settings')}}</span>
                            </a>
                            <ul id="settings" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
                                <li class="sidebar-item"><a class="sidebar-link"
                                                            href="#">{{__('admin/layouts/components/sidebar.pages')}}</a></li>
                                <li class="sidebar-item"><a class="sidebar-link"
                                                            href="#">{{__('admin/layouts/components/sidebar.social.media.links')}}</a></li>
                                <li class="sidebar-item"><a class="sidebar-link"
                                                            href="#">{{__('admin/layouts/components/sidebar.messages')}}</a></li>
                            </ul>
                        </li>
                        <li class="sidebar-item">
                            <a data-bs-target="#users" data-bs-toggle="collapse" class="sidebar-link collapsed">
                                <i class="fas fa-key"></i><span
                                    class="align-middle">{{__('admin/layouts/components/sidebar.users')}}</span>
                            </a>
                            <ul id="users" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
                                <li class="sidebar-item"><a class="sidebar-link"
                                                            href="#">{{__('admin/layouts/components/sidebar.users')}}</a></li>
                                <li class="sidebar-item"><a class="sidebar-link"
                                                            href="#">{{__('admin/layouts/components/sidebar.roles')}}</a></li>
                            </ul>
                        </li>

                            <li class="sidebar-item">
                                <a class="sidebar-link" href="#">
                                    <i class="align-middle me-2" data-feather="users"></i> <span
                                        class="align-middle">{{__('admin/layouts/components/sidebar.customers')}}</span>
                                </a>
                            </li>
                    </ul>
                </div>
</nav>

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
                                <img src="{{URL::asset('img/admins/')}}"
                                     class="avatar img-fluid rounded me-1" alt="Administrator"/>
                            </div>
                            <div class="flex-grow-1 ps-2">
                                <a class="sidebar-user-title dropdown-toggle" href="#" data-bs-toggle="dropdown">

                                </a>
                                <div class="dropdown-menu dropdown-menu-start">
                                    <a class="dropdown-item" href="#"><i class="align-middle me-1"
                                                                         data-feather="user"></i>
                                        {{__('Front-end/sidebar.profile')}}</a>
                                    <a class="dropdown-item" href="#"><i class="align-middle me-1"
                                                                         data-feather="settings"></i> {{__('Front-end/sidebar.settings')}}
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    {{--                                    <form method="post" action="{{route('admin.logout')}}">--}}
                                    {{--                                        @csrf--}}
                                    {{--                                        <button type="submit" class="dropdown-item">--}}
                                    {{--                                            <i class="align-middle me-2" data-feather="log-out"></i>--}}
                                    {{--                                            {{__('Front-end/sidebar.logout')}}--}}
                                    {{--                                        </button>--}}
                                    {{--                                    </form>--}}
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
                                    class="align-middle">Dashboard</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a data-bs-target="#categories" data-bs-toggle="collapse" class="sidebar-link collapsed">
                                <i class="align-middle me-2 fas fa-fw fa-list"></i> <span
                                    class="align-middle">Categories</span>
                            </a>
                            <ul id="categories" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
                                <li class="sidebar-item"><a class="sidebar-link"
                                                            href="#">Types</a></li>
                                <li class="sidebar-item"><a class="sidebar-link"
                                                            href="#">Categories</a></li>
                            </ul>
                        </li>

                        <li class="sidebar-item">
                            <a data-bs-target="#location" data-bs-toggle="collapse" class="sidebar-link collapsed">
                                <i class="fas fa-globe"></i> <span
                                    class="align-middle">Location Management</span>
                            </a>
                            <ul id="location" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
                                <li class="sidebar-item"><a class="sidebar-link"
                                                            href="#">States</a></li>
                                <li class="sidebar-item"><a class="sidebar-link"
                                                            href="#">Cites</a></li>
                            </ul>
                        </li>

                        <li class="sidebar-item">
                            <a class="sidebar-link" href="#">
                                <i class="fas fa-star"></i>
                                <span
                                    class="align-middle">Services</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a data-bs-target="#ad" data-bs-toggle="collapse" class="sidebar-link collapsed">
                                <i class="fas fa-ad"></i> <span
                                    class="align-middle">Advertisements</span>
                            </a>
                            <ul id="ad" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
                                <li class="sidebar-item"><a class="sidebar-link"
                                                            href="#">Advertisements</a></li>
                                <li class="sidebar-item"><a class="sidebar-link"
                                                            href="#">Advertising requests</a></li>
                            </ul>
                        </li>

                        <li class="sidebar-item">
                            <a data-bs-target="#settings" data-bs-toggle="collapse" class="sidebar-link collapsed">
                                <i class="fas fa-cogs"></i><span
                                    class="align-middle">Settings</span>
                            </a>
                            <ul id="settings" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
                                <li class="sidebar-item"><a class="sidebar-link"
                                                            href="#">Pages</a></li>
                                <li class="sidebar-item"><a class="sidebar-link"
                                                            href="#">Social media links</a></li>
                                <li class="sidebar-item"><a class="sidebar-link"
                                                            href="#">Messages</a></li>
                            </ul>
                        </li>
                        <li class="sidebar-item">
                            <a data-bs-target="#users" data-bs-toggle="collapse" class="sidebar-link collapsed">
                                <i class="fas fa-key"></i><span
                                    class="align-middle">Users</span>
                            </a>
                            <ul id="users" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
                                <li class="sidebar-item"><a class="sidebar-link"
                                                            href="#">Users</a></li>
                                <li class="sidebar-item"><a class="sidebar-link"
                                                            href="#">Roles</a></li>
                            </ul>
                        </li>

                            <li class="sidebar-item">
                                <a class="sidebar-link" href="#">
                                    <i class="align-middle me-2" data-feather="users"></i> <span
                                        class="align-middle">Customers</span>
                                </a>
                            </li>

                        {{--                        <li class="sidebar-item {{ request()->route()->named(['products.index','products.create','products.edit','products.show']) ? "active" : '' }}">--}}
                        {{--                            <a class="sidebar-link" href="{{route('products.index')}}">--}}
                        {{--                                <i class="align-middle me-2 fab fa-fw fa-product-hunt"></i> <span--}}
                        {{--                                    class="align-middle">{{__('Front-end/sidebar.products')}}</span>--}}
                        {{--                            </a>--}}
                        {{--                        </li>--}}
                        {{--                        <li class="sidebar-item {{ request()->route()->named(['attributes.index','attributes.create','attributes.edit']) ? "active" : '' }}">--}}
                        {{--                            <a class="sidebar-link" href="{{route('attributes.index')}}">--}}
                        {{--                                <i class="align-middle me-2 fas fa-fw fa-align-center"></i> <span--}}
                        {{--                                    class="align-middle">{{__('Front-end/sidebar.attribute')}}</span>--}}
                        {{--                            </a>--}}
                        {{--                        </li>--}}
                        {{--                        <li class="sidebar-item">--}}
                        {{--                            <a class="sidebar-link" href="#">--}}
                        {{--                                <i class="align-middle me-2 fas fa-fw fa-comments"></i> <span--}}
                        {{--                                    class="align-middle">{{__('Front-end/sidebar.comments')}}</span>--}}
                        {{--                            </a>--}}
                        {{--                        </li>--}}
                        {{--                        <li class="sidebar-item">--}}
                        {{--                            <a data-bs-target="#ui" data-bs-toggle="collapse" class="sidebar-link collapsed">--}}
                        {{--                                <i class="align-middle me-2" data-feather="target"></i> <span--}}
                        {{--                                    class="align-middle">{{__('Front-end/sidebar.pre.sales')}}</span>--}}
                        {{--                            </a>--}}
                        {{--                            <ul id="ui" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">--}}
                        {{--                                <li class="sidebar-item"><a class="sidebar-link"--}}
                        {{--                                                            href="#">{{__('Front-end/sidebar.customers')}}</a></li>--}}
                        {{--                            </ul>--}}
                        {{--                        </li>--}}
                        {{--                        <li class="sidebar-item">--}}
                        {{--                            <a data-bs-target="#marketing" data-bs-toggle="collapse" class="sidebar-link collapsed">--}}
                        {{--                                <i class="align-middle me-2" data-feather="target"></i> <span--}}
                        {{--                                    class="align-middle">{{__('Front-end/sidebar.marketing')}}</span>--}}
                        {{--                            </a>--}}
                        {{--                            <ul id="marketing" class="sidebar-dropdown list-unstyled collapse "--}}
                        {{--                                data-bs-parent="#sidebar">--}}
                        {{--                                <li class="sidebar-item"><a class="sidebar-link"--}}
                        {{--                                                            href="#">{{__('Front-end/sidebar.advertisement')}}</a></li>--}}
                        {{--                                <li class="sidebar-item"><a class="sidebar-link"--}}
                        {{--                                                            href="#">{{__('Front-end/sidebar.marketing')}}</a></li>--}}
                        {{--                                <li class="sidebar-item"><a class="sidebar-link"--}}
                        {{--                                                            href="#">{{__('Front-end/sidebar.gift.vouchers')}}</a></li>--}}
                        {{--                                <li class="sidebar-item"><a class="sidebar-link"--}}
                        {{--                                                            href="#">{{__('Front-end/sidebar.coupons')}}</a></li>--}}
                        {{--                                <li class="sidebar-item"><a class="sidebar-link"--}}
                        {{--                                                            href="#">{{__('Front-end/sidebar.rewards')}}</a></li>--}}
                        {{--                                <li class="sidebar-item"><a class="sidebar-link"--}}
                        {{--                                                            href="#">{{__('Front-end/sidebar.notification')}}</a></li>--}}
                        {{--                            </ul>--}}
                        {{--                        </li>--}}
                        {{--                        <li class="sidebar-item">--}}
                        {{--                            <a data-bs-target="#definitions" data-bs-toggle="collapse" class="sidebar-link collapsed">--}}
                        {{--                                <i class="align-middle me-2" data-feather="check-square"></i> <span--}}
                        {{--                                    class="align-middle">{{__('Front-end/sidebar.definitions')}}</span>--}}
                        {{--                            </a>--}}
                        {{--                            <ul id="definitions"--}}
                        {{--                                class="sidebar-dropdown list-unstyled collapse{{ request()->route()->named(['users.index', 'roles.index','cities.index','zones.index','timeslots.index','units.index','stores.index',--}}
                        {{--                                                                                                'users.create', 'roles.create','cities.create','zones.create','timeslots.create','stores.create',--}}
                        {{--                                                                                                'users.edit', 'roles.edit','cities.edit','zones.edit','timeslots.edit','stores.edit','users.show', 'roles.show']) ? ' show' : '' }}"--}}
                        {{--                                data-bs-parent="#sidebar">--}}
                        {{--                                @can('view_user')--}}
                        {{--                                    <li class="sidebar-item {{ request()->route()->named(['users.index','users.create','users.edit','users.show']) ? "active" : '' }}">--}}
                        {{--                                        <a class="sidebar-link"--}}
                        {{--                                           href="{{route('users.index')}}">{{__('Front-end/sidebar.users')}}</a></li>--}}
                        {{--                                @endcan--}}
                        {{--                                @can('view_role')--}}
                        {{--                                    <li class="sidebar-item {{ request()->route()->named(['roles.index','roles.create','roles.edit','roles.show']) ? "active" : '' }}">--}}
                        {{--                                        <a class="sidebar-link"--}}
                        {{--                                           href="{{route('roles.index')}}">{{__('Front-end/sidebar.roles')}}</a></li>--}}
                        {{--                                @endcan--}}
                        {{--                                    @can('view_timeslot')--}}
                        {{--                                <li class="sidebar-item {{ request()->route()->named(["timeslots.index", "timeslots.create", "timeslots.edit"]) ? "active" : '' }}">--}}
                        {{--                                    <a class="sidebar-link"--}}
                        {{--                                       href="{{route('timeslots.index')}}">{{__('Front-end/sidebar.timeslots')}}</a>--}}
                        {{--                                </li>--}}
                        {{--                                        @endcan--}}
                        {{--                                    @can('view_unit')--}}
                        {{--                                <li class="sidebar-item {{ request()->route()->named(["units.index"]) ? "active" : '' }}">--}}
                        {{--                                    <a class="sidebar-link"--}}
                        {{--                                       href="{{route('units.index')}}">{{__('Front-end/sidebar.units')}}</a></li>--}}
                        {{--                                    @endcan--}}
                        {{--                                    @can('view_store')--}}
                        {{--                                <li class="sidebar-item {{ request()->route()->named(["stores.index", "stores.create", "stores.edit"]) ? "active" : '' }}">--}}
                        {{--                                    <a class="sidebar-link"--}}
                        {{--                                       href="{{route('stores.index')}}">{{__('Front-end/sidebar.stores')}}</a></li>--}}
                        {{--                                    @endcan--}}
                        {{--                                <li class="sidebar-item">--}}
                        {{--                                    <a data-bs-target="#location" data-bs-toggle="collapse"--}}
                        {{--                                       class="sidebar-link collapsed">{{__('Front-end/sidebar.location.management')}}</a>--}}
                        {{--                                    <ul id="location"--}}
                        {{--                                        class="sidebar-dropdown list-unstyled collapse {{ request()->route()->named(['cities.index', 'zones.index', 'zones.create', 'zones.edit']) ? ' show' : '' }}">--}}
                        {{--                                        @can('view_city')--}}
                        {{--                                            <li class="sidebar-item {{ request()->route()->named("cities.index") ? "active" : '' }}">--}}
                        {{--                                                <a class="sidebar-link"--}}
                        {{--                                                   href="{{route('cities.index')}}">{{__('Front-end/sidebar.city')}}</a>--}}
                        {{--                                            </li>--}}
                        {{--                                        @endcan--}}
                        {{--                                        <li class="sidebar-item {{ request()->route()->named(['zones.index', 'zones.create', 'zones.edit']) ? "active" : '' }}">--}}
                        {{--                                            <a class="sidebar-link"--}}
                        {{--                                               href="{{route('zones.index')}}">{{__('Front-end/sidebar.zone')}}</a>--}}
                        {{--                                        </li>--}}

                        {{--                                    </ul>--}}
                        {{--                                </li>--}}
                        {{--                            </ul>--}}
                        {{--                        </li>--}}
                        {{--                        <li class="sidebar-item">--}}
                        {{--                            <a data-bs-target="#system" data-bs-toggle="collapse" class="sidebar-link collapsed">--}}
                        {{--                                <i class="align-middle me-2" data-feather="hard-drive"></i> <span--}}
                        {{--                                    class="align-middle">{{__('Front-end/sidebar.system')}}</span>--}}
                        {{--                            </a>--}}
                        {{--                            <ul id="system"--}}
                        {{--                                class="sidebar-dropdown list-unstyled collapse {{ request()->route()->named(['settings.index']) ? ' show' : '' }}"--}}
                        {{--                                data-bs-parent="#sidebar">--}}
                        {{--                                @can('view_setting')--}}
                        {{--                                    <li class="sidebar-item {{ request()->route()->named("settings.index") ? "active" : '' }}">--}}
                        {{--                                        <a class="sidebar-link"--}}
                        {{--                                           href="{{route('settings.index')}}">{{__('Front-end/sidebar.settings')}}</a>--}}
                        {{--                                    </li>--}}
                        {{--                                @endcan--}}
                        {{--                                <li class="sidebar-item"><a class="sidebar-link"--}}
                        {{--                                                            href="#">{{__('Front-end/sidebar.logs')}}</a></li>--}}
                        {{--                                <li class="sidebar-item"><a class="sidebar-link"--}}
                        {{--                                                            href="#">{{__('Front-end/sidebar.pages')}}</a></li>--}}
                        {{--                            </ul>--}}
                        {{--                        </li>--}}
                        {{--                        <li class="sidebar-item">--}}
                        {{--                            <a data-bs-target="#other" data-bs-toggle="collapse" class="sidebar-link collapsed">--}}
                        {{--                                <i class="align-middle me-2" data-feather="plus-square"></i> <span--}}
                        {{--                                    class="align-middle">{{__('Front-end/sidebar.others')}}</span>--}}
                        {{--                            </a>--}}
                        {{--                            <ul id="other" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">--}}
                        {{--                                <li class="sidebar-item"><a class="sidebar-link"--}}
                        {{--                                                            href="#">{{__('Front-end/sidebar.payment.services')}}</a>--}}
                        {{--                                </li>--}}
                        {{--                                <li class="sidebar-item"><a class="sidebar-link"--}}
                        {{--                                                            href="#">{{__('Front-end/sidebar.return.products')}}</a>--}}
                        {{--                                </li>--}}
                        {{--                                <li class="sidebar-item"><a class="sidebar-link"--}}
                        {{--                                                            href="#">{{__('Front-end/sidebar.holidays')}}</a></li>--}}
                        {{--                            </ul>--}}
                        {{--                        </li>--}}
                    </ul>
                </div>
</nav>

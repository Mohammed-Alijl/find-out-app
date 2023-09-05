<nav class="navbar navbar-expand navbar-light navbar-bg">
    <a class="sidebar-toggle js-sidebar-toggle">
        <i class="hamburger align-self-center"></i>
    </a>

    <ul class="navbar-nav d-none d-lg-flex">
    </ul>

    <div class="navbar-collapse collapse">
        <ul class="navbar-nav navbar-align">
            <li class="nav-item dropdown">
                <a class="nav-flag dropdown-toggle" href="#" id="languageDropdown" data-bs-toggle="dropdown">
                    <img src="{{URL::asset('img/flags/'. \Illuminate\Support\Facades\App::getLocale() . '.png')}}" />
                </a>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="languageDropdown">
                    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                    <a class="dropdown-item" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                        <img src="{{URL::asset('img/flags/' . $localeCode . '.png')}}" alt="English" width="20" class="align-middle me-1" />
                        <span class="align-middle">{{ $properties['native'] }}</span>
                    </a>
                    @endforeach
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-icon js-fullscreen d-none d-lg-block" href="#">
                    <div class="position-relative">
                        <i class="align-middle" data-feather="maximize"></i>
                    </div>
                </a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-icon pe-md-0 dropdown-toggle" href="#" data-bs-toggle="dropdown">
                    <img src="{{URL::asset('storage/img/' . auth('admin')->user()->image)}}" class="avatar img-fluid rounded" alt="admin" />
                </a>
                <div class="dropdown-menu dropdown-menu-end">
                    <a class="dropdown-item" href="#"><i class="align-middle me-1" data-feather="settings"></i>
                        {{__('admin/layouts/components/header.settings')}}</a>
                    <div class="dropdown-divider"></div>
                    <form  method="post" action="{{route('admin.logout')}}">
                        @csrf
                        <button type="submit" class="dropdown-item">
                            <i class="align-middle me-2" data-feather="log-out"></i>
                            {{__('admin/layouts/components/header.logout')}}
                        </button>
                    </form>
                </div>
            </li>
        </ul>
    </div>
</nav>

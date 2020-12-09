<header class="navbar navbar-expand-md navbar-light d-print-none">
    <div class="container-xl">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu">
            <span class="navbar-toggler-icon"></span>
        </button>
        <h1 class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pr-0 pr-md-3">
            <a href="{{ url('/') }}">
                <img src="{{ asset('theme/img/demo/tsm-logo-small.png') }}" height="30" alt="TSM Logo" class="navbar-brand-image">
            </a>
        </h1>
        <div class="navbar-nav flex-row order-md-last">
            <div class="nav-item dropdown">
                <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown"
                    aria-label="Open user menu">
                    <span class="avatar avatar-sm"
                        style="background-image: url({{ asset('theme/img/demo/avatar.png') }})"></span>
                    <div class="d-none d-xl-block pl-2">
                        <div>{{ $logged_in_user->name }}</div>
                        <div class="mt-1 small text-muted">{{ $logged_in_user->roles_label }}</div>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                    {{-- <a href="#" class="dropdown-item">Set status</a>
                    <a href="#" class="dropdown-item">Profile & account</a>
                    <a href="#" class="dropdown-item">Feedback</a>
                    <div class="dropdown-divider"></div> --}}
                    <a href="{{ route('admin.auth.user.show', $logged_in_user) }}" class="dropdown-item">@lang('Profile')</a>
                    <x-utils.link
                        class="dropdown-item"
                        onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                        <x-slot name="text">
                            @lang('Logout')
                            <x-forms.post :action="route('frontend.auth.logout')" id="logout-form" class="d-none" />
                        </x-slot>
                    </x-utils.link>
                </div>
            </div>
        </div>
        <div class="collapse navbar-collapse mr-2" id="navbar-menu">
            <div class="d-flex flex-column flex-md-row-reverse flex-fill align-items-stretch align-items-md-center">
              <ul class="navbar-nav">
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#navbar-third" data-bs-toggle="dropdown" role="button" aria-expanded="false">
                    <span class="nav-link-title">
                        @lang(__(getLocaleName(app()->getLocale())))
                        {{-- {{ __(getLocaleName(app()->getLocale())) == 'English' ? 'EN' : 'ID' }} --}}
                    </span>
                  </a>
                  <div class="dropdown-menu">
                    @include('includes.partials.lang')
                  </div>
                </li>
              </ul>
            </div>
          </div>
    </div>
</header>

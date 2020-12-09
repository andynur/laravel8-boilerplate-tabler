<!doctype html>
<html lang="{{ htmlLang() }}" @langrtl dir="rtl" @endlangrtl>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ appName() }} | @yield('title')</title>
    <!-- Favicon -->
    <link rel="icon" type="image/vnd.microsoft.icon" href="{{ asset('theme/img/demo/favicon.ico') }}"/>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('theme/img/demo/favicon.ico') }}"/>
    <meta name="description" content="@yield('meta_description', appName())">
    <meta name="author" content="@yield('meta_author', 'Andy Nur')">
    @yield('meta')

    @stack('before-styles')
    <link href="{{ mix('css/backend.css') }}" rel="stylesheet">
    <livewire:styles />
    @stack('after-styles')
</head>

<body class="antialiased {{ isset($is_frontend) ? 'border-top-wide border-primary d-flex flex-column' : '' }}">
    @isset($is_frontend)
        <div class="flex-fill d-flex flex-column justify-content-center py-4">
            <div class="container-tight py-6">
                <div class="text-center mb-4">
                    <a href="{{ url('/') }}">
                        <img src="{{ asset('theme/img/demo/tsm-logo-small.png') }}" height="36" alt="TSM Logo">
                    </a>
                    <h3 class="mt-2">Truck Management System</h3>
                </div>
                {{-- Alert message --}}
                @include('includes.partials.messages')
                <!-- Content here -->
                @yield('content')
            </div>
            </div>
        </div>
    @else
        <div class="page">
            @include('backend.includes.theme.header')
            @include('backend.includes.theme.navbar')

            <div class="content">
                <div class="container-xl">
                    {{-- Alert message --}}
                    @include('includes.partials.messages')
                    <!-- Content here -->
                    @yield('content')
                </div>

                @include('backend.includes.theme.footer')
            </div>
        </div>
    @endisset

    @stack('before-scripts')
    <script src="{{ asset('theme/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('theme/js/tabler.min.js') }}"></script>
    {{-- <script src="{{ mix('js/backend.js') }}"></script> --}}
    <livewire:scripts />
    @stack('after-scripts')
</body>

</html>

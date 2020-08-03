<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="google-signin-client_id" content="{{env('GOOGLE_CLIENT_ID')}}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    {{-- <script src="{{ asset('js/app.js') }}"></script>
    @stack('scripts') --}}

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}?cache={{ rand() }}" rel="stylesheet">
</head>

<body>
    <div id="app" class="vh-100">

        @sectionMissing('hidenav')
        @include('layouts.navigation')
        @endif

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    @stack('modals')

</body>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
@stack('scripts')

</html>
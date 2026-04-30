<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    {!! settings()->get("scripts_head") !!}

    <title>{{ settings()->get("page_title") }}</title>
    <meta charset="utf-8">
    <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge"><![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="{{ settings()->get("page_description") }}">
    <meta name="robots" content="{{ settings()->get("page_robots") }}">
    <meta name="author" content="{{ settings()->get("page_author") }}">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @if(1 == 2)
    <link rel="shortcut icon" href="/uploads/{{ settings()->get("page_favicon") }}">
    @endif

    <link rel="preload" href="{{ asset('fonts/sora-latin-ext.woff2') }}" as="font" type="font/woff2" crossorigin>

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}?v=1.0.6" />

    <!-- Preloads -->
    <link rel="preload" href="{{ asset('images/logo-white-png.png') }}" as="image" />
    <!-- /Preloads -->

    @stack('style')
</head>
<body id="page-home" class="position-relative">
{!! settings()->get("scripts_afterbody") !!}

    @include('layouts.partials.header')

    @yield('content')

    @auth
        @include('layouts.partials.inline')
    @endauth

    @include('layouts.partials.footer')

    @stack('scripts')

    {!! settings()->get("scripts_beforebody") !!}
</body>
</html>

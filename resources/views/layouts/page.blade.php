<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    {!! settings()->get("scripts_head") !!}

    <title>@hasSection('seo_title')@yield('seo_title')@else{{ settings()->get("page_title") }} - @yield('meta_title')@endif</title>

    <meta charset="utf-8">
    <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge"><![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="@hasSection('seo_description')@yield('seo_description')@else{{ settings()->get("page_description") }}@endif">
    <meta name="robots" content="@hasSection('seo_robots')@yield('seo_robots')@else{{ settings()->get("page_robots") }}@endif">
    <meta name="author" content="{{ settings()->get("page_author") }}">

    @hasSection('opengraph')@yield('opengraph')@endif

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @if(1 == 2)
        <link rel="shortcut icon" href="/uploads/{{ settings()->get("page_favicon") }}">
    @endif

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}?v=1.0.1" />

    <!-- Preloads -->
    <link rel="preload" href="{{ asset('images/logo-white-png.png') }}" as="image" />
    <!-- /Preloads -->

    @yield('schema')

    @stack('style')
</head>
<body id="{{ !empty($body_id) ? $body_id : '' }}" class="{{ !empty($body_class) ? $body_class : '' }}">
{!! settings()->get("scripts_afterbody") !!}
@include('layouts.partials.header')

@yield('pagehader')

@yield('content')

@include('layouts.partials.footer')

@stack('scripts')

{!! settings()->get("scripts_beforebody") !!}
</body>
</html>

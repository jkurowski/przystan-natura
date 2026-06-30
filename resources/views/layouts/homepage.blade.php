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

    <link rel="preload"
          href="{{ asset('css/bootstrap.min.css') }}"
          as="style"
          onload="this.onload=null;this.rel='stylesheet'">

    <link rel="preload"
          href="{{ asset('css/style.css?v=1.0.11') }}"
          as="style"
          onload="this.onload=null;this.rel='stylesheet'">

    <noscript>
        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/style.css?v=1.0.14') }}">
    </noscript>

    <!-- Preloads -->
    <link rel="preload" href="{{ asset('fonts/sora-latin-ext.woff2') }}" as="font" type="font/woff2" crossorigin>
    <link
        rel="preload"
        as="image"
        href="{{ asset('images/hero-mobile.webp') }}"
        imagesrcset="
{{ asset('images/hero-mobile.webp') }} 768w,
{{ asset('images/hero-tablet.webp') }} 1200w,
{{ asset('images/hero.webp') }} 1600w"
        imagesizes="100vw">
    <link rel="preconnect" href="https://www.googletagmanager.com">
    <link rel="preconnect" href="https://connect.facebook.net">
    <link rel="preconnect" href="https://www.google.com">
    <link rel="dns-prefetch" href="//www.googletagmanager.com">
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

@if (settings()->get('popup_status') == 1)
    <div class="modal" tabindex="-1" id="popModal">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    {!! settings()->get('popup_text') !!}
                </div>
            </div>
        </div>
    </div>
@endif
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const popupEnabled = {{ settings()->get('popup_status') == 1 ? 'true' : 'false' }};
        const shouldShow = {{ $popup == 1 ? 'true' : 'false' }};
        const timeout = {{ settings()->get('popup_timeout') }};
        if (!popupEnabled) return;

        const popModal = new bootstrap.Modal(document.getElementById('popModal'), {
            keyboard: false
        });

        if (shouldShow) {
            popModal.show();

            setTimeout(() => {
                popModal.hide();
            }, timeout);
        }
    });
</script>

    {!! settings()->get("scripts_beforebody") !!}
</body>
</html>

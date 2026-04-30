<!-- NAVIGATION -->
<header>
    <div class="container-fluid container-xl">
        <div class="row">
            <div class="col-3 col-md-2">
                <div id="logo">
                    <a href="/">
                        <img src="{{ asset('images/SVG/logo.svg') }}" alt="" width="172" height="213">
                    </a>
                </div>
            </div>
            <div class="col-9 col-md-10">
                <nav class="h-100 align-items-start align-items-xl-center justify-content-end">
                    <ul class="mb-0 list-unstyled d-flex justify-content-end">
                        <li class="rwd-menu"><a href="/">Strona główna</a></li>
                        <li class="rwd-menu"><a href="{{ route('front.developro.plan') }}">Oferta domów</a></li>
                        <li class="rwd-menu"><a href="{{ route('front.menu.show', ['uri' => 'lokalizacja']) }}">Lokalizacja</a></li>
                        <li class="rwd-menu"><a href="{{ route('front.menu.show', ['uri' => 'galeria']) }}">Galeria</a></li>
                        <li class="rwd-menu"><a href="{{ route('front.menu.show', ['uri' => 'o-inwestorze']) }}">O inwestorze</a></li>
                        <li class="rwd-menu"><a href="{{ route('front.menu.show', ['uri' => 'kontakt']) }}">Kontakt</a></li>
                        <li>
                            <a href="tel:+48888367956" class="bttn bttn-active">
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_270_22)">
                                        <path d="M18.3952 13.1277C17.1707 13.1277 15.9684 12.9362 14.8291 12.5597C14.2708 12.3693 13.5845 12.544 13.2438 12.8939L10.995 14.5915C8.38703 13.1994 6.78057 11.5934 5.40745 9.00505L7.0551 6.81484C7.48318 6.38734 7.63672 5.76286 7.45276 5.17693C7.07464 4.03161 6.88255 2.8299 6.88255 1.6049C6.8826 0.719948 6.16266 0 5.27776 0H1.60484C0.719948 0 0 0.719948 0 1.60484C0 11.7481 8.25198 20 18.3952 20C19.2801 20 20.0001 19.2801 20.0001 18.3952V14.7325C20 13.8477 19.2801 13.1277 18.3952 13.1277Z" fill="white"/>
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_270_22">
                                            <rect width="20" height="20" fill="white"/>
                                        </clipPath>
                                    </defs>
                                </svg>
                                888 367 956
                            </a>
                        </li>
                    </ul>
                    <span class="bttn bttn-active d-block d-xl-none" id="triggermenu">
                            <svg version="1.1" id="menubar" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                 viewBox="0 0 283.426 283.426" xml:space="preserve">
<g>
    <rect x="0" y="40.84" style="fill:#ffffff;" width="283.426" height="47.735"/>
    <rect x="0" y="117.282" style="fill:#ffffff;" width="283.426" height="47.735"/>
    <rect x="0" y="194.851" style="fill:#ffffff;" width="283.426" height="47.735"/>
</g>
                            </svg></span>
                </nav>
            </div>
        </div>
    </div>
</header>
<!-- END -> NAVIGATION -->

@extends('layouts.page', ['body_class' => 'position-relative', 'body_id' => 'page-wynajem-single'])

@section('meta_title', $page->title ?? 'Wynajem')
@section('seo_title',$page->meta_title ?? '')
@section('seo_description', $page->meta_description ?? '')
@section('seo_robots', $page->meta_robots ?? '')

@section('content')
    <!-- MAIN SECTION -->
    <main class="overflow-hidden">
        <!-- BREADCRUMB -->
        <div class="container breadcrumb-section">
            <div class="row">
                <div class="col-12">
                    <a href="/">Strona główna</a> / <a href="/wynajem/">Wynajem / Wołowska Business Park</a>
                </div>
            </div>
        </div>
        <!-- PAGE ENTRY -->
        <div class="container mt-5 apartament-slider">
            <div class="row">
                <div class="col-12 col-xl-6 col-xxl-5 d-flex flex-column align-items-start justify-content-center order-2 order-xl-1 mt-30 mt-xl-0">
                    <h1 class="text-uppercase mb-30">wołowska<br>business park</h1>
                    <p>Wołowska Business Park to kompleks nowoczesnych budynków skupiających w sobie powierzchnie biurowe oraz hale magazynowe.</p>
                    <p>Budowa kompleksu obejmuje 4 etapy:</p>
                    <ul>
                        <li><b>I etap – budynek A – w trakcie realizacji – planowany termin zakończenia to I kwartał 2026 r.</b></li>
                        <li><b>II etap – budynek B – w trakcie realizacji – planowany termin zakończenia to III kwartał 2026 r.</b></li>
                        <li>II etap - budynek C i D - planowane</li>
                        <li>III etap – budynek E - planowane</li>
                    </ul>
                    <p>Aktualnie w ofercie najmu dostępny jest budynek B, w którego skład wchodzą:</p>
                    <ul>
                        <li><b>hale: łącznie ok 3500 m2, z podziałem na moduły (klasa odporności p/poż E (Q<4000 MJ/m²):</b>
                            <ul>
                                <li>H1: powierzchnia 474 m2 + część biurowo – socjalna</li>
                                <li>H2: powierzchnia 453 m2 + część biurowo – socjalna</li>
                                <li>H3: powierzchnia 222 m2 + część biurowo – socjalna</li>
                                <li>H4: powierzchnia 477 m2 + część biurowo – socjalna</li>
                                <li>H5: powierzchnia 491 m2 + część biurowo – socjalna</li>
                                <li>H6: powierzchnia 229 m2 + część biurowo – socjalna</li>
                                <li>H7: powierzchnia 467 m2 + część biurowo – socjalna</li>
                                <li>H8: powierzchnia 490 m2 + część biurowo – socjalna</li>
                            </ul>
                        </li>
                        <li><b>część biurowa: łącznie ok. 1200 m2, zlokalizowane na 2 kondygnacjach (ZL3 w klasie odporności p/poż B)</b> strefa biurowa podzielona jest na moduły po ok. 220 m2</li>
                        <li>każdy najemca ma możliwość wynajęcia miejsca parkingowego przed budynkiem</li>
                    </ul>
                </div>
                <div class="col-12 col-lg-10 col-xl-6 offset-0 offset-lg-1 offset-xl-0 offset-xxl-1 order-1 order-xl-2">
                    {!! carouselWithThumbs(145) !!}
                </div>
            </div>
        </div>
        <!-- TEKST -->
        <div class="container-fluid wynajem-text px-0 position-relative">
            <div class="container ">
                <div class="row">
                    <div class="col-12 col-xl-6 scroll-anim-top">
                        <img src="{{ asset('img/temp/wynajem-rzut.png') }}" alt="O nas" class="wynajem-text__img">
                    </div>

                    <div class="col-12 col-xl-6 col-xxl-5 d-flex flex-column align-items-start justify-content-start mt-20 mt-xl-0 pt-0 pt-xl-100 scroll-anim-bottom">
                        <p>Na terenie realizowanej inwestycji obowiązuje MPZP dla którego została podjęta uchwała nr XXXIV/2318/05 Rady Miejskiej Wrocławia z dnia 10 lutego 2005 r. Dz. U. W. D. z dnia 12 kwietnia 2005 r. Nr 64, poz. 1357), zgodnie z którą ustalono następujące przeznaczenie terenu: aktywność gospodarcza cenotwórcza wraz z urządzeniami towarzyszącymi obiektom budowlanym tj.:</p>
                        <ul>
                            <li>obsługa firm i klienta</li>
                            <li>handel detaliczny</li>
                            <li>handel hurtowy</li>
                            <li>gastronomia</li>
                            <li>pośrednictwo finansowe</li>
                            <li>rzemiosło</li>
                            <li>turystyka</li>
                            <li>nauka</li>
                            <li>łączność</li>
                            <li>transport</li>
                            <li>produkcja</li>
                            <li>kultura</li>
                            <li>administracja</li>
                        </ul>
                        <p>Atrakcyjna lokalizacja inwestycji – skrzyżowanie ul. Wołowskiej/ Żmigrodzkiej</p>
                        <ul>
                            <li>doskonały dojazd z centrum miasta</li>
                            <li>możliwość dojazdu komunikacją miejską, tuż obok przystanki autobusowe i tramwajowe</li>
                            <li>bliskość dróg ekspresowych S5 i S8 oraz dogodny dojazd do autostrady A4</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- CTA -->
        @props([
            'show_header' => 1
        ])
        @if($show_header)
            <div class="container-fluid cta-img px-0 ">
                <img class="cta-img__img w-100" src="{{ asset('/img/temp/cta-bg.png') }}" width="1920" height="871" alt="Zdjęcie w tle">
            </div>
        @endif
        <div class="container-flud cta position-relative z-2 px-0">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-xxl-10 offset-0 offset-xxl-1">
                        <svg width="0" height="0" style="position:absolute;">
                            <defs>
                                <clipPath id="cta-01" clipPathUnits="objectBoundingBox">
                                    <path d="M0.6,0.999H0V0.543C0.001,0.537,0.007,0.523,0.012,0.516V0.017H0.204C0.218,0.011,0.226,0.007,0.229,0.001H1V0.456c-0.001,0.006-0.007,0.02-0.012,0.027V0.983H0.619C0.613,0.987,0.605,0.993,0.6,0.999Z"/>
                                </clipPath>
                            </defs>
                        </svg>
                        <div class="cta__wrapper d-flex flex-row align-items-center justify-content-center">
                            <div class="cta__left d-flex flex-column align-items-start justify-content-center">

                                <h2 class="mb-15 text-start text-uppercase">Umów się<br>na spotkanie</h2>
                                <p>&nbsp;</p>
                                <h3>Ewa Sieniawska</h3>
                                <a href="tel:+48609000201" class="cta__link d-flex align-items-center justify-content-start gap-2 mt-15"><svg xmlns="http://www.w3.org/2000/svg" width="31" height="31" viewBox="0 0 31 31"><g id="phone" transform="translate(-546.5 -3478.5)"><path id="Subtraction_13" data-name="Subtraction 13" d="M-7725,3461.5a15.4,15.4,0,0,1-10.959-4.54A15.4,15.4,0,0,1-7740.5,3446a15.4,15.4,0,0,1,4.541-10.96A15.4,15.4,0,0,1-7725,3430.5a15.4,15.4,0,0,1,10.96,4.54,15.4,15.4,0,0,1,4.54,10.96,15.4,15.4,0,0,1-4.54,10.96A15.4,15.4,0,0,1-7725,3461.5Zm0-30a14.405,14.405,0,0,0-10.252,4.247A14.405,14.405,0,0,0-7739.5,3446a14.405,14.405,0,0,0,4.248,10.253A14.4,14.4,0,0,0-7725,3460.5a14.4,14.4,0,0,0,10.253-4.247A14.406,14.406,0,0,0-7710.5,3446a14.406,14.406,0,0,0-4.247-10.253A14.406,14.406,0,0,0-7725,3431.5Zm6.336,22.5a13.851,13.851,0,0,1-13.835-13.835,1.665,1.665,0,0,1,1.664-1.664h2.663a1.665,1.665,0,0,1,1.662,1.664,7.716,7.716,0,0,0,.391,2.432l0,.009a1.677,1.677,0,0,1-.387,1.662l-.982,1.3a8.411,8.411,0,0,0,3.414,3.413l1.347-1.015a1.638,1.638,0,0,1,1.121-.42,1.6,1.6,0,0,1,.518.083,7.687,7.687,0,0,0,2.422.385,1.665,1.665,0,0,1,1.664,1.664v2.656A1.665,1.665,0,0,1-7718.664,3454Zm-12.172-14.5a.664.664,0,0,0-.664.664A12.85,12.85,0,0,0-7718.664,3453a.664.664,0,0,0,.664-.663v-2.656a.664.664,0,0,0-.664-.664,8.691,8.691,0,0,1-2.741-.437.611.611,0,0,0-.2-.031.644.644,0,0,0-.435.148l-.027.028-.031.023-1.886,1.421-.282-.15a9.486,9.486,0,0,1-4.257-4.257l-.149-.281,1.407-1.869.025-.025a.679.679,0,0,0,.167-.681,8.71,8.71,0,0,1-.44-2.742.663.663,0,0,0-.662-.664Z" transform="translate(8287 48)"></path></g></svg>609 000 201</a>
                                <a href="tel:+48713871150" class="cta__link d-flex align-items-center justify-content-start gap-2 mt-15"><svg xmlns="http://www.w3.org/2000/svg" width="31" height="31" viewBox="0 0 31 31"><g id="phone" transform="translate(-546.5 -3478.5)"><path id="Subtraction_13" data-name="Subtraction 13" d="M-7725,3461.5a15.4,15.4,0,0,1-10.959-4.54A15.4,15.4,0,0,1-7740.5,3446a15.4,15.4,0,0,1,4.541-10.96A15.4,15.4,0,0,1-7725,3430.5a15.4,15.4,0,0,1,10.96,4.54,15.4,15.4,0,0,1,4.54,10.96,15.4,15.4,0,0,1-4.54,10.96A15.4,15.4,0,0,1-7725,3461.5Zm0-30a14.405,14.405,0,0,0-10.252,4.247A14.405,14.405,0,0,0-7739.5,3446a14.405,14.405,0,0,0,4.248,10.253A14.4,14.4,0,0,0-7725,3460.5a14.4,14.4,0,0,0,10.253-4.247A14.406,14.406,0,0,0-7710.5,3446a14.406,14.406,0,0,0-4.247-10.253A14.406,14.406,0,0,0-7725,3431.5Zm6.336,22.5a13.851,13.851,0,0,1-13.835-13.835,1.665,1.665,0,0,1,1.664-1.664h2.663a1.665,1.665,0,0,1,1.662,1.664,7.716,7.716,0,0,0,.391,2.432l0,.009a1.677,1.677,0,0,1-.387,1.662l-.982,1.3a8.411,8.411,0,0,0,3.414,3.413l1.347-1.015a1.638,1.638,0,0,1,1.121-.42,1.6,1.6,0,0,1,.518.083,7.687,7.687,0,0,0,2.422.385,1.665,1.665,0,0,1,1.664,1.664v2.656A1.665,1.665,0,0,1-7718.664,3454Zm-12.172-14.5a.664.664,0,0,0-.664.664A12.85,12.85,0,0,0-7718.664,3453a.664.664,0,0,0,.664-.663v-2.656a.664.664,0,0,0-.664-.664,8.691,8.691,0,0,1-2.741-.437.611.611,0,0,0-.2-.031.644.644,0,0,0-.435.148l-.027.028-.031.023-1.886,1.421-.282-.15a9.486,9.486,0,0,1-4.257-4.257l-.149-.281,1.407-1.869.025-.025a.679.679,0,0,0,.167-.681,8.71,8.71,0,0,1-.44-2.742.663.663,0,0,0-.662-.664Z" transform="translate(8287 48)"></path></g></svg>71 387 11 50</a>

                                <a href="mailto:wolowska@triadadom.pl" class="cta__link d-flex align-items-center justify-content-start gap-2 mt-15"><svg xmlns="http://www.w3.org/2000/svg" width="31" height="31" viewBox="0 0 31 31"><g id="mail" transform="translate(-546.5 -3528.5)"><path id="Subtraction_2" data-name="Subtraction 2" d="M-1975,30.5a15.4,15.4,0,0,1-10.96-4.54A15.4,15.4,0,0,1-1990.5,15a15.4,15.4,0,0,1,4.54-10.96A15.4,15.4,0,0,1-1975-.5a15.4,15.4,0,0,1,10.96,4.54A15.4,15.4,0,0,1-1959.5,15a15.4,15.4,0,0,1-4.54,10.96A15.4,15.4,0,0,1-1975,30.5Zm0-30a14.406,14.406,0,0,0-10.253,4.247A14.406,14.406,0,0,0-1989.5,15a14.4,14.4,0,0,0,4.247,10.252A14.406,14.406,0,0,0-1975,29.5a14.4,14.4,0,0,0,10.253-4.247A14.4,14.4,0,0,0-1960.5,15a14.406,14.406,0,0,0-4.247-10.253A14.4,14.4,0,0,0-1975,.5Zm5.958,21.727h-11.916a3,3,0,0,1-2.995-2.995V11.894l8.7,5.314a.45.45,0,0,0,.239.066.449.449,0,0,0,.233-.063l.006,0,8.724-5.313v7.337A3,3,0,0,1-1969.042,22.227Zm-13.911-8.55v5.556a2,2,0,0,0,1.995,1.995h11.916a2,2,0,0,0,1.995-1.995V13.675l-7.2,4.386a1.455,1.455,0,0,1-.761.214,1.445,1.445,0,0,1-.764-.215Zm7.963,3.248-8.946-5.454.074-.347a2.986,2.986,0,0,1,2.9-2.351h11.916a2.986,2.986,0,0,1,2.9,2.351l.074.347ZM-1982.781,11l7.791,4.75,7.772-4.749a1.982,1.982,0,0,0-1.824-1.231h-11.916A1.982,1.982,0,0,0-1982.781,11Z" transform="translate(2537 3529)"></path></g></svg>wolowska@triadadom.pl</a>
                            </div>
                            <div class="cta__right d-none d-lg-flex">
                                <img class="cta__img" src="{{ asset('/img/temp/cta-person.png') }}" width="489" height="564" alt="Zdjęcie w tle">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- FORM -->
        @include('front.contact.offer-ask-form', ['pageTitle' => 'Wołowska Business Park', 'back' => true])
    </main>
    <!-- END -> MAIN SECTION -->
@endsection

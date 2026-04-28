@extends('layouts.page', ['body_class' => 'position-relative', 'body_id' => 'page-location'])

@section('meta_title', $page->title ?? 'Lokalizacja')
@section('seo_title',$page->meta_title ?? '')
@section('seo_description', $page->meta_description ?? '')
@section('seo_robots', $page->meta_robots ?? '')


@section('pagehader')
    <div id="pageheader">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1>Lokalizacja</h1>
                    <nav class="breadcrumbs">
                        <a href="/">Strona główna</a>
                        <span class="sep">
                            <svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M7.7779 4.6098L3.32777 0.159755C3.22485 0.0567475 3.08745 0 2.94095 0C2.79445 0 2.65705 0.0567475 2.55412 0.159755L2.2264 0.487394C2.01315 0.700889 2.01315 1.04788 2.2264 1.26105L5.96328 4.99793L2.22225 8.73895C2.11933 8.84196 2.0625 8.97928 2.0625 9.1257C2.0625 9.27228 2.11933 9.4096 2.22225 9.51269L2.54998 9.84025C2.65298 9.94325 2.7903 10 2.9368 10C3.0833 10 3.2207 9.94325 3.32363 9.84025L7.7779 5.38614C7.88107 5.2828 7.93774 5.14484 7.93741 4.99817C7.93774 4.85094 7.88107 4.71305 7.7779 4.6098Z" fill="#A4804D"/></svg>
                        </span>
                        <span class="current">Lokalizacja</span>
                    </nav>
                </div>
            </div>
        </div>
        <div class="pageheader-end"></div>
    </div>
@endsection

@section('content')
    <main>

        <section class="pb-0">
            <!-- Brakuje mapy -->
            <div class="container">
                <div class="row flex-wrap-nowrap">
                    <div class="col-7">
                        <div class="section-text pe-0">
                            <span>LOKALIZACJA</span>
                            <h2>Między naturą <i>a wygodą</i></h2>
                            <p>W pobliżu i na terenie osiedla zaplanowano udogodnienia sprzyjające aktywnemu i spokojnemu stylowi życia, takie jak mini-park, plac zabaw, siłownia plenerowa, drogi rowerowe, miejsca do wspólnego spędzania czasu oraz parkingi dla gości. To miejsce, które łączy bliskość natury z przestrzenią do odpoczynku, aktywności i wygodnego życia na co dzień.</p>
                        </div>

                        <div class="row location-points mt-100">
                            <div class="col-6">
                                <div class="location-point">
                                <span class="circle">
                                    <img src="{{ asset('images/icons/horse.svg') }}" alt="" width="50" height="50">
                                </span>
                                    <div>
                                        <h3>2 min</h3>
                                        <p>STADNINA KONI I SZKÓŁKA</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="location-point">
                                <span class="circle">
                                    <img src="{{ asset('images/icons/cart.svg') }}" alt="" width="50" height="50">
                                </span>
                                    <div>
                                        <h3>4 min</h3>
                                        <p>MARKET DINO I PIZZERIA</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row location-points">
                            <div class="col-6">
                                <div class="location-point">
                                <span class="circle">
                                    <img src="{{ asset('images/icons/grocery-zabka.svg') }}" alt="" width="50" height="50">
                                </span>
                                    <div>
                                        <h3>4 min</h3>
                                        <p>SKLEP ŻABKA</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="location-point">
                                <span class="circle">
                                    <img src="{{ asset('images/icons/playground.svg') }}" alt="" width="50" height="50">
                                </span>
                                    <div>
                                        <h3>5 min</h3>
                                        <p>PLAC ZABAW DLA DZIECI</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row location-points">
                            <div class="col-6">
                                <div class="location-point">
                                <span class="circle">
                                    <img src="{{ asset('images/icons/baby.svg') }}" alt="" width="50" height="50">
                                </span>
                                    <div>
                                        <h3>5 min</h3>
                                        <p>LEŚNE PRZEDSZKOLE</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="location-point">
                                <span class="circle">
                                    <img src="{{ asset('images/icons/medical.svg') }}" alt="" width="50" height="50">
                                </span>
                                    <div>
                                        <h3>5 min</h3>
                                        <p>PRZYCHODNIA LEKARSKA</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="pb-0">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <img src="{{ asset('images/wizualizacja-inwestycji-1.jpg') }}" alt="" class="w-100 big-borders" width="1620" height="825">
                    </div>
                </div>
                <div class="row row-under">
                    <div class="col-5 d-flex justify-content-center offset-1">
                        <div class="big-stroke">
                            <img src="{{ asset('images/horse.jpg') }}" alt="" class="big-borders" width="590" height="500">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="d-flex justify-content-end align-items-end h-100">
                            <h3>W bezpośrednim <br>sąsiedztwie ze <i>stadniną <br>koni i szkółką</i></h3>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        @include('front.contact.page-contact', [
            'page_name' => 'Lokalizacja',
            'back' => true
        ])
    </main>
@endsection
@push('scripts')
    <script type="text/javascript">

    </script>
@endpush

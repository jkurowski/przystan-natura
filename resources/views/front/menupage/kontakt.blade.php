@extends('layouts.page', ['body_class' => 'position-relative', 'body_id' => 'page-kontakt'])

@section('meta_title', $page->title ?? 'Kontakt')
@section('seo_title',$page->meta_title ?? '')
@section('seo_description', $page->meta_description ?? '')
@section('seo_robots', $page->meta_robots ?? '')

@section('pagehader')
    <x-page-header title="Skontaktuj się z nami" :breadcrumbs="[['label' => 'Kontakt', 'url' => '#']]" />
@endsection
@section('content')
    <main>
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-4">
                    <div class="contact-box">
                        <span>
                            <img src="{{ asset('images/icons/contact/si_phone.svg') }}" alt="" width="36" height="36" class="icon">
                        </span>
                        <h4>Telefon</h4>
                        <div class="contact-data">
                            <a href="tel:+48888367956" class="contact-link">+48 888 367 956</a>
                        </div>
                        <a href="tel:+48888367956" class="bttn bttn-icon">
                            Zadzwoń do nas
                            <svg class="icon" viewBox="0 0 26 26">
                                <path d="M17.3375 10.1985L8.01328 19.5228L6.48145 17.9909L15.8046 8.66667H7.58753V6.5H19.5042V18.4167H17.3375V10.1985Z" fill="currentColor"/>
                            </svg>
                        </a>
                    </div>
                </div>
                <div class="col-12 col-lg-4 mt-4 mt-lg-0">
                    <div class="contact-box">
                        <span>
                            <img src="{{ asset('images/icons/contact/si_email.svg') }}" alt="" width="36" height="36" class="icon">
                        </span>
                        <h4>E-mail</h4>
                        <div class="contact-data">
                            <a href="mailto:konrad.dzialak@janton-invest.pl" class="contact-link">konrad.dzialak@janton-invest.pl</a>
                        </div>
                        <a href="mailto:konrad.dzialak@janton-invest.pl" class="bttn bttn-icon">
                            Napisz do nas
                            <svg class="icon" viewBox="0 0 26 26">
                                <path d="M17.3375 10.1985L8.01328 19.5228L6.48145 17.9909L15.8046 8.66667H7.58753V6.5H19.5042V18.4167H17.3375V10.1985Z" fill="currentColor"/>
                            </svg>
                        </a>
                    </div>
                </div>
                <div class="col-12 col-lg-4 mt-4 mt-lg-0">
                    <div class="contact-box">
                        <span>
                            <img src="{{ asset('images/icons/contact/si_marker.svg') }}" alt="" width="36" height="36" class="icon">
                        </span>
                        <h4>Adres</h4>
                        <div class="contact-data">
                            <a href="https://maps.app.goo.gl/h9YnsXtc5qQhzHU97" class="contact-link" target="_blank">ul. Sempołowskiej 4 <br>Pabianice 95-200</a>
                        </div>
                        <a href="https://maps.app.goo.gl/h9YnsXtc5qQhzHU97" class="bttn bttn-icon" target="_blank">
                            SPRAWDŹ JAK TRAFIĆ
                            <svg class="icon" viewBox="0 0 26 26">
                                <path d="M17.3375 10.1985L8.01328 19.5228L6.48145 17.9909L15.8046 8.66667H7.58753V6.5H19.5042V18.4167H17.3375V10.1985Z" fill="currentColor"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
            <div class="row mt-130">
                <div class="col-12 col-xl-6">
                    <x-section-header title="Napisz <i>do nas!</i>" subtitle="FORMULARZ KONTAKTOWY" />
                    <div class="pe-0 pe-xl-6">
                        @include('front.contact.form', ['page_name' => 'Kontakt'])
                    </div>
                </div>
                <div class="col-12 col-xl-6 mt-6 mt-xl-0">
                    <div id="map">
                        <img src="{{ asset('images/contact-map.jpg') }}" alt="Mapa lokalizacji" class="d-none d-xl-block w-100">
                        <img src="{{ asset('images/contact-map-mobile.jpg') }}" alt="Mapa lokalizacji" class="d-block d-xl-none w-100">
                    </div>
                </div>
            </div>
        </div>
        <div class="container pt-0 mt-130">
            <div class="row">
                <div class="col-12">
                    <img src="{{ asset('images/contact-photo.jpg') }}" alt="" class="w-100 big-borders" width="1620" height="765">
                </div>
            </div>
        </div>
    </main>
@endsection

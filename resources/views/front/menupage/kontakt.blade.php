@extends('layouts.page', ['body_class' => 'position-relative', 'body_id' => 'page-kontakt'])

@section('meta_title', $page->title ?? 'Kontakt')
@section('seo_title',$page->meta_title ?? '')
@section('seo_description', $page->meta_description ?? '')
@section('seo_robots', $page->meta_robots ?? '')

@section('pagehader')
    <div id="pageheader">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1>Skontaktuj się z nami</h1>
                    <nav class="breadcrumbs">
                        <a href="/">Strona główna</a>
                        <span class="sep">
                            <svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M7.7779 4.6098L3.32777 0.159755C3.22485 0.0567475 3.08745 0 2.94095 0C2.79445 0 2.65705 0.0567475 2.55412 0.159755L2.2264 0.487394C2.01315 0.700889 2.01315 1.04788 2.2264 1.26105L5.96328 4.99793L2.22225 8.73895C2.11933 8.84196 2.0625 8.97928 2.0625 9.1257C2.0625 9.27228 2.11933 9.4096 2.22225 9.51269L2.54998 9.84025C2.65298 9.94325 2.7903 10 2.9368 10C3.0833 10 3.2207 9.94325 3.32363 9.84025L7.7779 5.38614C7.88107 5.2828 7.93774 5.14484 7.93741 4.99817C7.93774 4.85094 7.88107 4.71305 7.7779 4.6098Z" fill="#A4804D"/></svg>
                        </span>
                        <span class="current">Kontakt</span>
                    </nav>
                </div>
            </div>
        </div>
        <div class="pageheader-end"></div>
    </div>
@endsection
@section('content')
    <main>
        <div class="container">
            <div class="row">
                <div class="col-4">
                    <div class="contact-box">
                        <span></span>
                        <h4>Telefon</h4>
                        <div class="contact-data">
                            <a href="" class="contact-link">+48 888 367 956</a>
                        </div>
                        <a href="" class="bttn bttn-icon">
                            Zadzwoń do nas
                            <svg class="icon" viewBox="0 0 26 26">
                                <path d="M17.3375 10.1985L8.01328 19.5228L6.48145 17.9909L15.8046 8.66667H7.58753V6.5H19.5042V18.4167H17.3375V10.1985Z" fill="currentColor"/>
                            </svg>
                        </a>
                    </div>
                </div>
                <div class="col-4">
                    <div class="contact-box">
                        <span></span>
                        <h4>E-mail</h4>
                        <div class="contact-data">
                            <a href="" class="contact-link">konrad.dzialak@janton-invest.pl</a>
                        </div>
                        <a href="" class="bttn bttn-icon">
                            Napisz do nas
                            <svg class="icon" viewBox="0 0 26 26">
                                <path d="M17.3375 10.1985L8.01328 19.5228L6.48145 17.9909L15.8046 8.66667H7.58753V6.5H19.5042V18.4167H17.3375V10.1985Z" fill="currentColor"/>
                            </svg>
                        </a>
                    </div>
                </div>
                <div class="col-4">
                    <div class="contact-box">
                        <span></span>
                        <h4>Adres</h4>
                        <div class="contact-data">
                            <a href="" class="contact-link">ul. Sempołowskiej 4 <br>Pabianice 95-200</a>
                        </div>
                        <a href="" class="bttn bttn-icon">
                            SPRAWDŹ JAK TRAFIĆ
                            <svg class="icon" viewBox="0 0 26 26">
                                <path d="M17.3375 10.1985L8.01328 19.5228L6.48145 17.9909L15.8046 8.66667H7.58753V6.5H19.5042V18.4167H17.3375V10.1985Z" fill="currentColor"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
            <div class="row mt-130">
                <div class="col-6">
                    <div class="section-text">
                        <span>FORMULARZ KONTAKTOWY</span>
                        <h2>Napisz <i>do nas!</i></h2>
                    </div>
                    <div class="pe-6">
                        @include('front.contact.form', ['page_name' => 'Kontakt'])
                    </div>
                </div>
                <div class="col-6">
                    <div id="map"></div>
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

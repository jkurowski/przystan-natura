@extends('layouts.page', ['body_class' => 'position-relative', 'body_id' => 'page-location'])

@section('meta_title', $page->title ?? 'Lokalizacja')
@section('seo_title',$page->meta_title ?? '')
@section('seo_description', $page->meta_description ?? '')
@section('seo_robots', $page->meta_robots ?? '')


@section('pagehader')
    <x-page-header title="Lokalizacja" :breadcrumbs="[['label' => 'Lokalizacja', 'url' => '#']]" />
@endsection

@section('content')
    <main>

        <section class="pb-0 location-map">
            <!-- Brakuje mapy -->
            <div class="container">
                <div class="row flex-wrap flex-xl-nowrap">
                    <div class="col-12 col-xl-6">
                        <x-section-header title="Między naturą, <br><i>a wygodą</i>" subtitle="LOKALIZACJA" class="pe-0">
                            <p>W pobliżu i na terenie osiedla zaplanowano udogodnienia sprzyjające aktywnemu i spokojnemu stylowi życia, takie jak mini-park, plac zabaw, siłownia plenerowa, drogi rowerowe, miejsca do wspólnego spędzania czasu oraz parkingi dla gości. To miejsce, które łączy bliskość natury z przestrzenią do odpoczynku, aktywności i wygodnego życia na co dzień.</p>
                        </x-section-header>

                        <div class="row location-points mt-100">
                            <div class="col-6">
                                <x-location-point icon="horse.svg" time="2 min" title="STADNINA KONI I SZKÓŁKA" />
                            </div>
                            <div class="col-6">
                                <x-location-point icon="cart.svg" time="4 min" title="MARKET DINO I PIZZERIA" />
                            </div>
                        </div>
                        <div class="row location-points">
                            <div class="col-6">
                                <x-location-point icon="grocery-zabka.svg" time="4 min" title="SKLEP ŻABKA" />
                            </div>
                            <div class="col-6">
                                <x-location-point icon="playground.svg" time="5 min" title="PLAC ZABAW DLA DZIECI" />
                            </div>
                        </div>
                        <div class="row location-points">
                            <div class="col-6">
                                <x-location-point icon="baby.svg" time="5 min" title="LEŚNE PRZEDSZKOLE" />
                            </div>
                            <div class="col-6">
                                <x-location-point icon="medical.svg" time="5 min" title="PRZYCHODNIA LEKARSKA" />
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-xl-6 vw-50 p-0 d-flex align-items-end">
                        <img src="{{ asset('images/location-map.jpg') }}" alt="" class="w-100" width="1160" height="787">
                    </div>
                </div>
            </div>
        </section>

        <x-visual-section
            imageTop="wizualizacja-inwestycji-1.jpg"
            imageBottom="horse.jpg"
            title="W bezpośrednim <br>sąsiedztwie ze <i>stadniną <br>koni i szkółką</i>"
        />

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

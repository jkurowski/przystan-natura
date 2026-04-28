@extends('layouts.page', ['body_class' => 'position-relative', 'body_id' => 'page-about'])

@section('meta_title', $page->title ?? 'O inwestorze')
@section('seo_title',$page->meta_title ?? '')
@section('seo_description', $page->meta_description ?? '')
@section('seo_robots', $page->meta_robots ?? '')


@section('pagehader')
    <div id="pageheader">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1>O inwestorze</h1>
                    <nav class="breadcrumbs">
                        <a href="/">Strona główna</a>
                        <span class="sep">
                            <svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M7.7779 4.6098L3.32777 0.159755C3.22485 0.0567475 3.08745 0 2.94095 0C2.79445 0 2.65705 0.0567475 2.55412 0.159755L2.2264 0.487394C2.01315 0.700889 2.01315 1.04788 2.2264 1.26105L5.96328 4.99793L2.22225 8.73895C2.11933 8.84196 2.0625 8.97928 2.0625 9.1257C2.0625 9.27228 2.11933 9.4096 2.22225 9.51269L2.54998 9.84025C2.65298 9.94325 2.7903 10 2.9368 10C3.0833 10 3.2207 9.94325 3.32363 9.84025L7.7779 5.38614C7.88107 5.2828 7.93774 5.14484 7.93741 4.99817C7.93774 4.85094 7.88107 4.71305 7.7779 4.6098Z" fill="#A4804D"/></svg>
                        </span>
                        <span class="current">O inwestorze</span>
                    </nav>
                </div>
            </div>
        </div>
        <div class="pageheader-end"></div>
    </div>
@endsection

@section('content')
    <main>
        <section class="pt-0 pb-0">
            <div class="container">
                <div class="row flex-wrap-nowrap">
                    <div class="col-6">
                        <div class="section-text">
                            <span>KILKA SŁÓW</span>
                            <h2>Wartość to nie tylko <br><i>pomnażanie majątku</i></h2>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="section-text mt-2 pe-0">
                            <span>&nbsp;</span>
                            <p>JF Invest jest firmą zarządzającą prywatnym majątkiem – jej celem jest identyfikacja, sfinansowanie i nadzór nad projektami, które mają ten majątek zwiększyć – budować wartość dla kolejnych pokoleń. Determinacja w dążeniu do celu, wizja lepszego jutra i dynamika inwestycyjna to fundamenty naszej działalności.</p>
                        </div>
                    </div>
                </div>

                <div class="row mt-6">
                    <div class="col-12">
                        <img src="{{ asset('images/investor.jpg') }}" alt="">
                    </div>
                </div>

                <div class="row mt-170">
                    <div class="col-6">
                        <div class="section-text">
                            <span>SEKTORY</span>
                            <h2>Obszary <br><i>działalności</i></h2>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="mainFeatures" class="py-5">
            <div class="container">
                <div class="row">
                    <!-- ITEM -->
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="feature-box">
                            <img src="{{ asset('/images/icons/real-estate.svg') }}" alt="" class="icon">
                            <h2 class="fw-bold">Nieruchomości</h2>
                            <p>Tworzymy nowoczesne inwestycje mieszkaniowe, łącząc funkcjonalność, jakość wykonania i przemyślane podejście do codziennego komfortu.</p>
                        </div>
                    </div>
                    <!-- ITEM -->
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="feature-box">
                            <img src="{{ asset('/images/icons/solar-energy.svg') }}" alt="" class="icon">
                            <h2 class="fw-bold">Fotowoltaika</h2>
                            <p>Rozwijamy projekty z obszaru energii odnawialnej, stawiając na nowoczesne rozwiązania, efektywność i odpowiedzialne podejście do przyszłości.</p>
                        </div>
                    </div>
                    <!-- ITEM -->
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="feature-box">
                            <img src="{{ asset('/images/icons/startup.svg') }}" alt="" class="icon">
                            <h2 class="fw-bold">Venture Capital</h2>
                            <p>Inwestujemy w perspektywiczne przedsięwzięcia, wspierając innowacyjne pomysły, rozwój biznesu i projekty z realnym potencjałem wzrostu.</p>
                        </div>
                    </div>
                    <!-- ITEM -->
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="feature-box">
                            <img src="{{ asset('/images/icons/profit.svg') }}" alt="" class="icon">
                            <h2 class="fw-bold">Rynki finansowe</h2>
                            <p>Działamy w obszarze finansów, opierając decyzje na doświadczeniu, analizie  i długofalowym podejściu do budowania wartości.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="pb-0">
            <div class="container">
                <div class="row flex-wrap-nowrap">
                    <div class="col-7">
                        <div class="section-text pe-0">
                            <span>PROJEKTY</span>
                            <h2>Zrealizowane <br><i>inwestycje</i></h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-4">
                        <a href="">
                            <div class="house-model-item invest-model">
                                <div class="house-model-thumb position-relative">
                                    <div class="card-shape">
                                        <img src="{{ asset('/images/dom-70.jpg') }}" alt="" class="w-100" width="467" height="359">
                                    </div>
                                    <div class="circle">
                                        <svg class="icon" viewBox="0 0 26 26">
                                            <path d="M17.3375 10.1985L8.01328 19.5228L6.48145 17.9909L15.8046 8.66667H7.58753V6.5H19.5042V18.4167H17.3375V10.1985Z" fill="currentColor"/>
                                        </svg>
                                    </div>
                                </div>
                                <div class="house-model-content">
                                    <h2>Apartamenty Narutowicza 10/12 Pabianice</h2>
                                    <p>Narutowicza 10/12 to wyjątkowa realizacja w odległości 120 m od centrum Pabianic. To projekt łączący w sobie cechy historycznej architektury Pabianic z nowoczesnym designem.</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-4">
                        <a href="">
                            <div class="house-model-item invest-model">
                                <div class="house-model-thumb position-relative">
                                    <div class="card-shape">
                                        <img src="{{ asset('/images/dom-90.jpg') }}" alt="" class="w-100" width="467" height="359">
                                    </div>
                                    <div class="circle">
                                        <svg class="icon" viewBox="0 0 26 26">
                                            <path d="M17.3375 10.1985L8.01328 19.5228L6.48145 17.9909L15.8046 8.66667H7.58753V6.5H19.5042V18.4167H17.3375V10.1985Z" fill="currentColor"/>
                                        </svg>
                                    </div>
                                </div>
                                <div class="house-model-content">
                                    <h2>Przystań Natura</h2>
                                    <p>Nowoczesne osiedle 12 domków skandynawskich pod Łodzią. Zaprojektowano je zgodnie z filozofią Hygge łączącą w sobie w najlepszy sposób minimalizm z przytulną, domową atmosferą.</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-4">
                        <a href="">
                            <div class="house-model-item invest-model">
                                <div class="house-model-thumb position-relative">
                                    <div class="card-shape">
                                        <img src="{{ asset('/images/dom-12.jpg') }}" alt="" class="w-100" width="467" height="359">
                                    </div>
                                    <div class="circle">
                                        <svg class="icon" viewBox="0 0 26 26">
                                            <path d="M17.3375 10.1985L8.01328 19.5228L6.48145 17.9909L15.8046 8.66667H7.58753V6.5H19.5042V18.4167H17.3375V10.1985Z" fill="currentColor"/>
                                        </svg>
                                    </div>
                                </div>
                                <div class="house-model-content">
                                    <h2>”Lido” Jurata</h2>
                                    <p>Projekt odnowy Hotelu Lido, który powstał w latach 1932-33 i cieszył się dużą popularnością ze względu na swoją nowoczesność i ekskluzywność w ówczesnych czasach.</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <section class="">
            <div class="container">
                <div class="row flex-wrap-nowrap flex-row-reverse">
                    <div class="col-6 d-flex align-items-center">
                        <div class="section-text">
                            <span>PLANOWANE INWESTYCJE</span>
                            <h2>Apartamentowiec <br><i>Traugutta 7 Łódź</i></h2>
                            <p>Apartamentowiec Traugutta 7 to prestiżowa inwestycja w samym centrum Łodzi, w sąsiedztwie EC1 i Bramy Miasta. Projekt łączy funkcje mieszkaniowe, komercyjne i gastronomiczne, oferując 32 apartamenty, 12 lokali usługowych oraz przestrzeń HORECA z ogródkami. Wyróżnia go unikatowa architektura, zielony ogród na dachu, wertykalne ogrody na tarasach i elewacji oraz podziemny parking ze stacją ładowania pojazdów elektrycznych.</p>
                        </div>
                    </div>
                    <div class="col-6 vw-50 ps-0">
                        <img src="{{ asset('images/family-house.jpg') }}" alt="" class="w-100" width="1160" height="787">
                    </div>
                </div>
            </div>
        </section>

        <section class="pt-0">
            <div class="container">
                <div class="row flex-wrap-nowrap">
                    <div class="col-6 d-flex align-items-center">
                        <div class="section-text">
                            <span>WARTOŚCI</span>
                            <h2>Zamieniamy pomysły <br><i>w realizacje</i></h2>
                            <p>JF Invest rozwija się w oparciu o odpowiedzialność, elastyczność i odwagę w podejmowaniu nowych wyzwań. To firma rodzinna, która przez lata nauczyła się uważnie obserwować rynek i mądrze odpowiadać na zmieniające się potrzeby. Dziś łączy doświadczenie zdobywane w różnych branżach z nowoczesnym podejściem do inwestowania, stawiając na jakość, długofalowe myślenie i projekty, które mają realną wartość dla ludzi i otoczenia.</p>
                            <a href="" class="bttn bttn-icon mt-5">
                                Strona inwestora
                                <svg class="icon" viewBox="0 0 26 26">
                                    <path d="M17.3375 10.1985L8.01328 19.5228L6.48145 17.9909L15.8046 8.66667H7.58753V6.5H19.5042V18.4167H17.3375V10.1985Z" fill="currentColor"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                    <div class="col-6 vw-50 pe-0">
                        <img src="{{ asset('images/family-house.jpg') }}" alt="" class="w-100" width="1160" height="787">
                    </div>
                </div>
            </div>
        </section>

        <section class="pt-0 pb-0">
            <div class="container">
                <div class="row flex-wrap-nowrap flex-row-reverse">
                    <div class="col-6 d-flex align-items-center">
                        <div class="section-text">
                            <span>DOŚWIADCZENIE</span>
                            <h2>Historia, która <br><i>rozwija</i></h2>
                            <p>Historia JF Invest sięga 1976 roku. Od początku firma rozwijała się w różnych branżach, elastycznie odpowiadając na zmieniające się warunki rynkowe i nowe potrzeby. Każdy etap tej drogi budował doświadczenie, które dziś przekłada się na świadome decyzje biznesowe i długofalowe myślenie o rozwoju. To historia oparta na odwadze, konsekwencji i umiejętności dostrzegania nowych kierunków tam, gdzie pojawia się realny potencjał.</p>
                            <a href="" class="bttn bttn-icon mt-5">
                                Strona inwestora
                                <svg class="icon" viewBox="0 0 26 26">
                                    <path d="M17.3375 10.1985L8.01328 19.5228L6.48145 17.9909L15.8046 8.66667H7.58753V6.5H19.5042V18.4167H17.3375V10.1985Z" fill="currentColor"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                    <div class="col-6 vw-50 ps-0">
                        <img src="{{ asset('images/family-house.jpg') }}" alt="" class="w-100" width="1160" height="787">
                    </div>
                </div>
            </div>
        </section>

        @include('front.contact.page-contact', [
            'page_name' => 'O inwestorze',
            'back' => true
        ])
    </main>
@endsection
@push('scripts')
    <script type="text/javascript">

    </script>
@endpush

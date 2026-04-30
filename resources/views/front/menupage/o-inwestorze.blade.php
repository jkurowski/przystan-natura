@extends('layouts.page', ['body_class' => 'position-relative', 'body_id' => 'page-about'])

@section('meta_title', $page->title ?? 'O inwestorze')
@section('seo_title',$page->meta_title ?? '')
@section('seo_description', $page->meta_description ?? '')
@section('seo_robots', $page->meta_robots ?? '')


@section('pagehader')
    <x-page-header title="O inwestorze" :breadcrumbs="[['label' => 'O inwestorze', 'url' => '#']]" />
@endsection

@section('content')
    <main>
        <section class="pt-0 pb-0">
            <div class="container">
                <div class="row flex-wrap flex-xl-nowrap">
                    <div class="col-12 col-xl-6">
                        <div class="section-text">
                            <span>KILKA SŁÓW</span>
                            <h2>Wartość to nie tylko <br><i>pomnażanie majątku</i></h2>
                        </div>
                    </div>
                    <div class="col-12 col-xl-6">
                        <div class="section-text mt-2 pe-0">
                            <span class="d-none d-xl-block">&nbsp;</span>
                            <p>JF Invest jest firmą zarządzającą prywatnym majątkiem – jej celem jest identyfikacja, sfinansowanie i nadzór nad projektami, które mają ten majątek zwiększyć – budować wartość dla kolejnych pokoleń. Determinacja w dążeniu do celu, wizja lepszego jutra i dynamika inwestycyjna to fundamenty naszej działalności.</p>
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

        <section id="mainFeatures" class="py-0 py-sm-3 py-md-5">
            <div class="container">
                <div class="row">
                    <x-feature-box
                        icon="real-estate.svg"
                        title="Nieruchomości"
                        text="Tworzymy nowoczesne inwestycje mieszkaniowe, łącząc funkcjonalność, jakość wykonania i przemyślane podejście do codziennego komfortu."
                    />
                    <x-feature-box
                        icon="solar-energy.svg"
                        title="Fotowoltaika"
                        text="Rozwijamy projekty z obszaru energii odnawialnej, stawiając na nowoczesne rozwiązania, efektywność i odpowiedzialne podejście do przyszłości."
                    />
                    <x-feature-box
                        icon="startup.svg"
                        title="Venture Capital"
                        text="Inwestujemy w perspektywiczne przedsięwzięcia, wspierając innowacyjne pomysły, rozwój biznesu i projekty z realnym potencjałem wzrostu."
                    />
                    <x-feature-box
                        icon="profit.svg"
                        title="Rynki finansowe"
                        text="Działamy w obszarze finansów, opierając decyzje na doświadczeniu, analizie  i długofalowym podejściu do budowania wartości."
                    />
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
                        <a href="https://narutowicza1012.pl/" target="_blank">
                            <div class="house-model-item invest-model">
                                <div class="house-model-thumb position-relative">
                                    <div class="card-shape">
                                        <img src="{{ asset('/images/narutowicza.jpg') }}" alt="" class="w-100" width="467" height="359">
                                    </div>
                                    <div class="circle d-none">
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
                        <a href="{{ route('front.developro.plan') }}">
                            <div class="house-model-item invest-model">
                                <div class="house-model-thumb position-relative">
                                    <div class="card-shape">
                                        <img src="{{ asset('/images/borkowice.jpg') }}" alt="" class="w-100" width="467" height="359">
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
                        <a href="https://lidojurata.pl/" target="_blank">
                            <div class="house-model-item invest-model">
                                <div class="house-model-thumb position-relative">
                                    <div class="card-shape">
                                        <img src="{{ asset('/images/lido.jpg') }}" alt="" class="w-100" width="467" height="359">
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
                <div class="row flex-wrap flex-xl-nowrap flex-row-reverse">
                    <div class="col-12 col-xl-6 d-flex align-items-center">
                        <div class="section-text">
                            <span>PLANOWANE INWESTYCJE</span>
                            <h2>Apartamentowiec <br><i>Traugutta 7 Łódź</i></h2>
                            <p>Apartamentowiec Traugutta 7 to prestiżowa inwestycja w samym centrum Łodzi, w sąsiedztwie EC1 i Bramy Miasta. Projekt łączy funkcje mieszkaniowe, komercyjne i gastronomiczne, oferując 32 apartamenty, 12 lokali usługowych oraz przestrzeń HORECA z ogródkami. Wyróżnia go unikatowa architektura, zielony ogród na dachu, wertykalne ogrody na tarasach i elewacji oraz podziemny parking ze stacją ładowania pojazdów elektrycznych.</p>
                        </div>
                    </div>
                    <div class="col-12 col-xl-6 vw-50 ps-3 ps-xl-0 mt-4 mt-sm-5 mt-xl-0">
                        <img src="{{ asset('images/Traugutta-7.jpg') }}" alt="" class="w-100" width="950" height="645">
                    </div>
                </div>
            </div>
        </section>

        <section class="pt-0">
            <div class="container">
                <div class="row flex-wrap flex-xl-nowrap">
                    <div class="col-12 col-xl-6 d-flex align-items-center">
                        <div class="section-text">
                            <span>WARTOŚCI</span>
                            <h2>Zamieniamy pomysły <br><i>w realizacje</i></h2>
                            <p>JF Invest rozwija się w oparciu o odpowiedzialność, elastyczność i odwagę w podejmowaniu nowych wyzwań. To firma rodzinna, która przez lata nauczyła się uważnie obserwować rynek i mądrze odpowiadać na zmieniające się potrzeby. Dziś łączy doświadczenie zdobywane w różnych branżach z nowoczesnym podejściem do inwestowania, stawiając na jakość, długofalowe myślenie i projekty, które mają realną wartość dla ludzi i otoczenia.</p>
                            <a href="https://jf-invest.pl/" target="_blank" class="bttn bttn-icon mt-4 mt-sm-5">
                                Strona inwestora
                                <svg class="icon" viewBox="0 0 26 26">
                                    <path d="M17.3375 10.1985L8.01328 19.5228L6.48145 17.9909L15.8046 8.66667H7.58753V6.5H19.5042V18.4167H17.3375V10.1985Z" fill="currentColor"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                    <div class="col-12 col-xl-6 vw-50 pe-3 pe-xl-0 mt-4 mt-sm-5 mt-xl-0">
                        <img src="{{ asset('images/zmieniamy-pomysly.jpg') }}" alt="" class="w-100" width="950" height="645">
                    </div>
                </div>
            </div>
        </section>

        <section class="pt-0 pb-0">
            <div class="container">
                <div class="row flex-wrap flex-xl-nowrap flex-row-reverse">
                    <div class="col-12 col-xl-6 d-flex align-items-center">
                        <div class="section-text">
                            <span>DOŚWIADCZENIE</span>
                            <h2>Historia, która <br><i>rozwija</i></h2>
                            <p>Historia JF Invest sięga 1976 roku. Od początku firma rozwijała się w różnych branżach, elastycznie odpowiadając na zmieniające się warunki rynkowe i nowe potrzeby. Każdy etap tej drogi budował doświadczenie, które dziś przekłada się na świadome decyzje biznesowe i długofalowe myślenie o rozwoju. To historia oparta na odwadze, konsekwencji i umiejętności dostrzegania nowych kierunków tam, gdzie pojawia się realny potencjał.</p>
                            <a href="https://jf-invest.pl/" target="_blank" class="bttn bttn-icon mt-4 mt-sm-5">
                                Strona inwestora
                                <svg class="icon" viewBox="0 0 26 26">
                                    <path d="M17.3375 10.1985L8.01328 19.5228L6.48145 17.9909L15.8046 8.66667H7.58753V6.5H19.5042V18.4167H17.3375V10.1985Z" fill="currentColor"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                    <div class="col-12 col-xl-6 vw-50 ps-3 ps-xl-0 mt-4 mt-sm-5 mt-xl-0">
                        <img src="{{ asset('images/doswiadczenie.jpg') }}" alt="" class="w-100" width="950" height="645">
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

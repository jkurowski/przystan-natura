@extends('layouts.page', ['body_class' => 'position-relative', 'body_id' => 'page-standard'])

@section('meta_title', $page->title ?? 'Standard wykończenia')
@section('seo_title',$page->meta_title ?? '')
@section('seo_description', $page->meta_description ?? '')
@section('seo_robots', $page->meta_robots ?? '')


@section('pagehader')
    <x-page-header title="Standard wykończenia" :breadcrumbs="[['label' => 'Standard wykończenia', 'url' => '#']]" />
@endsection

@section('content')
    <main>
        <div class="container">
            <nav class="standard-tabs" aria-label="Standard wykończenia">
                <a href="#zagospodarowanie" class="active"><span>01</span>Zagospodarowanie</a>
                <a href="#budynek"><span>02</span>Budynek</a>
                <a href="#wykonczenie-wewnetrzne"><span>03</span>Wykończenie wewnętrzne</a>
                <a href="#wiata"><span>04</span>Wiata zintegrowana <br class="d-none d-xl-inline">z bryłą budynku</a>
                <div class="standard-tabs-claim">Przestrzeń <br>która daje więcej</div>
            </nav>
        </div>

        <section id="zagospodarowanie" class="standard-section">
            <div class="container">
                <div class="row standard-section-header">
                    <div class="col-12 col-lg-7 d-flex">
                        <span class="standard-number">01</span>
                        <div>
                            <h2>Zagospodarowanie</h2>
                            <p class="standard-subtitle">Otoczenie, które tworzy komfort na co dzień</p>
                        </div>
                    </div>
                    <div class="col-12 col-lg-5">
                        <p class="standard-lead">Funkcjonalne zagospodarowanie terenu, pełne uzbrojenie i wygodne rozwiązania dla mieszkańców.</p>
                    </div>
                </div>
                <div class="row standard-section-body">
                    <div class="col-12 col-xl-3">
                        <div class="standard-photo">
                            <img src="{{ asset('images/standard/zagospodarowanie.jpg') }}" alt="Zagospodarowanie terenu osiedla Przystań Natura" width="960" height="720" loading="lazy">
                            <span>Zielona <br>przestrzeń <br>do życia</span>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-xl-4 offset-xl-1">
                        <x-standard-item title="Droga wewnętrzna" :items="[
                            'droga szerokości 6 m, wykonanie z kostki betonowej',
                            'jezdnia szerokości 3,5 m, wykonanie z kostki betonowej',
                            'ciąg pieszo-rowerowy szer. 2,5 m, wykonanie z kostki',
                            'oświetlenie części wspólnych – latarnie uliczne',
                        ]" />
                        <x-standard-item title="Ogrodzenie od drogi wewnętrznej" :items="[
                            'ogrodzenie tylne z paneli ogrodzeniowych h=120 cm',
                            'ogrodzenie między budynkami h=120 cm lub wyższe',
                            'ogrodzenie frontowe we własnym zakresie',
                        ]" />
                        <x-standard-item title="Śmietnik" :items="['śmietniki indywidualne']" />
                        <x-standard-item title="Taras" :items="['do wykończenia własnego']" />
                    </div>
                    <div class="col-12 col-md-6 col-xl-4">
                        <x-standard-item title="Brama i furtka" :items="[
                            'brama od drogi publicznej, otwierana pilotem',
                            'zamykane, bezpieczne osiedle w standardzie',
                        ]" />
                        <x-standard-item title="Miejsce parkingowe" :items="[
                            'indywidualne, przypisane do lokalu',
                            '1 miejsce zadaszone + 1 miejsce parkingowe na dom',
                            'możliwość zabudowy wiaty do formy garażu',
                        ]" />
                        <x-standard-item title="Ogród" :items="['do wykonania własnego']" />
                        <x-standard-item title="Instalacje w drodze" :items="[
                            'sieć wodociągowa, własność wspólnoty',
                            'odwodnienie terenu, własność wspólnotowa',
                        ]" />
                        <x-standard-item title="Przyłącza i instalacje do budynków" :items="[
                            'przyłącze i instalacja elektryczna na terenie, licznik w granicy z drogą wewnętrzną',
                            'przyłącze i instalacja wodociągowa na terenie, licznik w budynku',
                            'instalacja kanalizacyjna na terenie do szczelnego zbiornika bezodpływowego',
                            'instalacja kanalizacji deszczowej na terenie – do studni chłonnych',
                            'przyłącze światłowodowe',
                        ]" />
                    </div>
                </div>
            </div>
        </section>

        <section id="budynek" class="standard-section">
            <div class="container">
                <div class="row standard-section-header">
                    <div class="col-12 col-lg-7 d-flex">
                        <span class="standard-number">02</span>
                        <div>
                            <h2>Budynek</h2>
                            <p class="standard-subtitle">Sprawdzona technologia i solidne wykonanie</p>
                        </div>
                    </div>
                    <div class="col-12 col-lg-5">
                        <p class="standard-lead">Domy projektujemy z myślą o trwałości, energooszczędności i komforcie codziennego życia.</p>
                    </div>
                </div>
                <div class="row standard-section-body">
                    <div class="col-12 col-xl-3">
                        <div class="standard-photo">
                            <img src="{{ asset('images/standard/budynek.jpg') }}" alt="Dom w osiedlu Przystań Natura" width="960" height="720" loading="lazy">
                            <span>Solidne <br>fundamenty <br>na lata</span>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-xl-4 offset-xl-1">
                        <x-standard-item title="Forma własności" :items="[
                            'własność budynku',
                            'własność działki',
                        ]" />
                        <x-standard-item title="Roboty ziemne" :items="[
                            'wykopy',
                            'niwelacja terenu',
                            'zasypanie fundamentów zagęszczonym piaskiem',
                        ]" />
                        <x-standard-item title="Fundament" :items="[
                            'ławy fundamentowe',
                            'izolacja termiczna pionowa ścian fundamentowych',
                        ]" />
                        <x-standard-item title="Ściany konstrukcyjne" :items="[
                            'ściany o grubości 36 cm: jednowarstwowe z pustaka ceramicznego',
                            'ocieplenie: styropian 20 cm i wełna 15 cm',
                        ]" />
                        <x-standard-item title="Ściany działowe" :items="['ściany o grubości 12 cm: pustak ceramiczny']" />
                        <x-standard-item title="Stropy" :items="['lekki strop drewniany zintegrowany z więźbą']" />
                        <x-standard-item title="Schody" :items="['schody stałe żelbetowe prowadzące na piętro – nie tymczasowe']" />
                        <x-standard-item title="Taras" :items="[
                            'podbudowa betonowa od strony ogrodu pod posadzkę tarasu, ok. 20 m<sup>2</sup>',
                            'wykończenie płytami tarasowymi 8 cm lub 2 cm we własnym zakresie',
                            'pod wiatą podbudowa oraz kliniec',
                        ]" />
                    </div>
                    <div class="col-12 col-md-6 col-xl-4">
                        <x-standard-item title="Dach" :items="[
                            'więźba drewniana, impregnowana przeciwogniowo, owado- i grzybobójczo',
                            'pokrycie blachą na rąbek z obróbkami z blachy powlekanej pod kolor dachu',
                            'ocieplenie 30 cm wełną mineralną',
                            'paroizolacja',
                        ]" />
                        <x-standard-item title="Kominy" :items="[
                            'wentylacyjne (grawitacyjne)',
                            'z wywiewkami dachowymi',
                            'wywiewki kanalizacyjne',
                        ]" />
                        <x-standard-item title="Elewacja" :items="[
                            'system lekki-mokry',
                            'tynk cienkowarstwowy silikonowy, silikatowy lub silikatowo-silikonowy',
                            'ocieplenie w ramach bloczka konstrukcyjnego',
                            'parapety zewnętrzne stalowe',
                            'obróbki blacharskie, rynny i rury spustowe w kolorze pokrycia dachu',
                        ]" />
                        <x-standard-item title="Stolarka okienna i drzwiowa" :items="[
                            'okna i drzwi balkonowe – PVC, grafitowa okleina',
                            'współczynnik U: okna ≤ 0,9 W/m<sup>2</sup>K, drzwi ≤ 1,3 W/m<sup>2</sup>K',
                            'stolarka 3-szybowa, rozwierno-uchylna, uchylno-przesuwna',
                        ]" />
                        <x-standard-item title="Drzwi wejściowe" :items="[
                            'ościeżnica metalowa, próg ze stali nierdzewnej',
                            'odporność na włamanie – min. 2 klasa ENV',
                        ]" />
                    </div>
                </div>
            </div>
        </section>

        <section id="wykonczenie-wewnetrzne" class="standard-section">
            <div class="container">
                <div class="row standard-section-header">
                    <div class="col-12 col-lg-7 d-flex">
                        <span class="standard-number">03</span>
                        <div>
                            <h2>Wykończenie wewnętrzne</h2>
                            <p class="standard-subtitle">Przestrzeń gotowa na Twoje pomysły</p>
                        </div>
                    </div>
                    <div class="col-12 col-lg-5">
                        <p class="standard-lead">Wnętrza oddajemy w stanie deweloperskim – z wykonanymi najważniejszymi pracami, abyś mógł urządzić je po swojemu.</p>
                    </div>
                </div>
                <div class="row standard-section-body">
                    <div class="col-12 col-xl-3">
                        <div class="standard-photo">
                            <img src="{{ asset('images/standard/wnetrze-salon.jpg') }}" alt="Salon w domu Przystań Natura" width="1000" height="667" loading="lazy">
                            <span>Przestrzeń <br>dla Twoich <br>planów</span>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-xl-4 offset-xl-1">
                        <x-standard-item title="Ściany wewnętrzne" :items="[
                            'ściany działowe 12 cm: pustak ceramiczny',
                            'tynki gipsowe',
                        ]" />
                        <x-standard-item title="Posadzki" :items="[
                            'podkład z zagęszczonego kruszywa',
                            'podkład betonowy (chudziak)',
                            'izolacja: styropian 10 cm (EPS100)',
                            'izolacja przeciwwilgociowa',
                            'wylewka betonowa',
                        ]" />
                        <x-standard-item title="Sufity" :items="[
                            'tynki gipsowe malowane jednokrotnie farbą emulsyjną',
                            'płyty G/K na ruszcie aluminiowym malowane jednokrotnie farbą emulsyjną',
                        ]" />
                        <x-standard-item title="Wentylacja" :items="['grawitacyjna']" />
                        <x-standard-item title="Ogrzewanie" :items="[
                            'pompa ciepła (jednostka zewnętrzna i wewnętrzna) z instalacją freonową',
                            'indywidualna kotłownia / pomieszczenie gospodarcze',
                            'wodne ogrzewanie podłogowe, dwa rozdzielacze',
                            'grzejnik drabinkowy w łazience (bez montażu grzejnika)',
                        ]" />
                        <x-standard-item title="Instalacja fotowoltaiczna" :items="['opcjonalnie']" />
                    </div>
                    <div class="col-12 col-md-6 col-xl-4">
                        <x-standard-item title="Instalacja elektryczna" :items="[
                            'gniazda 230 V zabezpieczone wyłącznikami różnicowoprądowymi',
                            'punkty oświetleniowe zakończone kostką',
                            'w kuchni dodatkowo puszka do kuchenki 400 V',
                            'tablice elektryczne i teletechniczne, podtynkowe lub natynkowe',
                            'w łazienkach i toaletach – instalacja niezakuwana w ściany',
                        ]" />
                        <x-standard-item title="Instalacje sanitarne" :items="[
                            'kanalizacja z rur z tworzyw sztucznych',
                            'w kuchni podejścia pod zlewozmywak lub zmywarkę',
                            'w łazience i toalecie podejścia pod wannę lub prysznic, WC, pralkę i umywalkę',
                            'woda zimna i ciepła – podejścia zakończone gwintem i zaślepką',
                            'podejścia wodno-kanalizacyjne niezakuwane w ściany',
                            'indywidualny licznik w kotłowni',
                        ]" />
                        <x-standard-item title="TV / internet" :items="[
                            '1 gniazdo TV i 1 gniazdo RJ45 w pomieszczeniach dziennych',
                            '1 gniazdo TV w pokojach mieszkalnych',
                        ]" />
                        <x-standard-item title="Domofon" :items="[
                            'aparat naścienny typu domofon',
                            'możliwość montażu wideodomofonu we własnym zakresie',
                        ]" />
                    </div>
                </div>
            </div>
        </section>

        <section id="wiata" class="standard-section">
            <div class="container">
                <div class="row standard-section-header">
                    <div class="col-12 d-flex">
                        <span class="standard-number">04</span>
                        <div>
                            <h2>Wiata zintegrowana z bryłą budynku</h2>
                            <p class="standard-subtitle">Wygoda w standardzie</p>
                        </div>
                    </div>
                </div>
                <div class="row standard-section-body">
                    <div class="col-12 col-xl-3">
                        <div class="standard-photo">
                            <img src="{{ asset('images/standard/wiata.jpg') }}" alt="Domy z wiatami zintegrowanymi z bryłą budynku" width="960" height="720" loading="lazy">
                            <span>Funkcjonalne <br>rozwiązania <br>na co dzień</span>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-xl-4 offset-xl-1">
                        <x-standard-item title="Roboty ziemne" :items="[
                            'wykopy',
                            'niwelacja terenu',
                            'zasypanie fundamentów zagęszczonym piaskiem',
                            'odwodnienie fundamentów',
                        ]" />
                        <x-standard-item title="Fundament" :items="[
                            'ławy fundamentowe',
                            'izolacja termiczna pionowa ścian fundamentowych',
                        ]" />
                        <x-standard-item title="Ściany konstrukcyjne" :items="['ściany o grubości 12 i 18 cm: bloczki silikatowe (SILKA) lub konstrukcja szkieletowa drewniana']" />
                    </div>
                    <div class="col-12 col-md-6 col-xl-4">
                        <x-standard-item title="Stropodach" :items="[
                            'belki drewniane 16×26 cm, impregnowane przeciwogniowo, owado- i grzybobójczo',
                            'izolacja przeciwwilgociowa',
                            'izolacja termiczna – styropian 15 cm',
                            'pokrycie dachu papą',
                        ]" />
                        <x-standard-item title="Elewacja" :items="[
                            'system lekki-mokry',
                            'ocieplenie wełną mineralną gr. 5, 10 oraz 14 cm',
                            'tynk cienkowarstwowy silikonowy, silikatowy lub silikatowo-silikonowy',
                            'obróbki blacharskie, rynny i rury spustowe w kolorze pokrycia dachu budynku',
                        ]" />
                    </div>
                </div>
            </div>
        </section>

        @include('front.contact.page-contact', [
            'page_name' => 'Standard wykończenia',
            'back' => true,
            'hide_photo' => true
        ])
    </main>
@endsection
@push('scripts')
    <script type="text/javascript">
        (function () {
            const links = document.querySelectorAll('.standard-tabs a');
            const sections = Array.from(links).map(link => document.querySelector(link.getAttribute('href')));

            const observer = new IntersectionObserver(entries => {
                entries.forEach(entry => {
                    if (!entry.isIntersecting) return;
                    links.forEach(link => link.classList.toggle('active', link.getAttribute('href') === '#' + entry.target.id));
                });
            }, { rootMargin: '-40% 0px -55% 0px' });

            sections.forEach(section => section && observer.observe(section));

            const photoObserver = new IntersectionObserver(entries => {
                entries.forEach(entry => {
                    if (!entry.isIntersecting) return;
                    entry.target.classList.add('is-visible');
                    photoObserver.unobserve(entry.target);
                });
            }, { rootMargin: '0px 0px -15% 0px' });

            document.querySelectorAll('.standard-photo').forEach(photo => {
                photo.classList.add('reveal');
                photoObserver.observe(photo);
            });
        })();
    </script>
@endpush

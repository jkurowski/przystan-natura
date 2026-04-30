@extends('layouts.homepage')

@section('content')

    <div id="hero" class="position-relative">
        <img src="{{ asset('images/hero.png') }}" alt="" class="w-100">
        <div class="container-fluid container-xl align-items-end align-items-xl-center d-flex">
            <div class="row w-100 m-0">
                <div class="col-12 col-lg-7">
                    <x-section-header title="Naturalnie <br><i>dobry adres</i>" subtitle="DOMKI W STYLU SKANDYNAWSKIM" />
                </div>
                <div class="col-12 col-lg-5">
                    <p>Gotowe domy wolnostojące w stylu skandynawskim, z własnymi działkami i nowoczesnym standardem. Dla osób, które chcą żyć spokojniej, bliżej natury i bez blokowego ścisku, ale nie chcą rezygnować z codziennej wygody.</p>
                    <a href="{{ route('front.developro.plan') }}" class="bttn bttn-icon mt-0 mt-xl-5">
                        POZNAJ OSIEDLE
                        <svg class="icon" viewBox="0 0 26 26">
                            <path d="M17.3375 10.1985L8.01328 19.5228L6.48145 17.9909L15.8046 8.66667H7.58753V6.5H19.5042V18.4167H17.3375V10.1985Z" fill="currentColor"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <main class="pt-0">
    <section id="mainFeatures" class="py-5">
        <div class="container">
            <div class="row">
                <x-feature-box
                    icon="real-estate.svg"
                    title="Gotowy etap inwestycji"
                    text="12 wybudowanych domów to gwarancja bezpieczeństwa. Obejrzyj realną inwestycję na żywo, zamiast kupować wyłącznie na podstawie wizualizacji."
                />
                <x-feature-box
                    icon="fences.svg"
                    title="Domy 70 / 90 / 120 m²"
                    text="Wolnostojące, skandynawskie domy dopasowane do Twoich potrzeb. Ciesz się pełną prywatnością i zapomnij o sąsiadach za ścianą."
                />
                <x-feature-box
                    icon="blueprint.svg"
                    title="Działki ok. 500–1000 m²"
                    text="Duża, własna działka to idealne miejsce na wymarzony ogród. Zyskaj prywatną przestrzeń i ciszę, która należy tylko do Ciebie."
                />
                <x-feature-box
                    icon="car-parking.svg"
                    title="Miejsca postojowe"
                    text="Zapewniamy maksymalną wygodę na co dzień. Do każdego domu przynależą dwa własne miejsca postojowe oraz przygotowany podjazd."
                />
            </div>
        </div>
    </section>

    <section class="bg-logo p-0">
        <div class="container">
            <div class="row flex-wrap flex-xl-nowrap">
                <div class="col-12 col-xl-6">
                    <x-section-header title="Nowy standard <i>każdego dnia</i>" subtitle="PRZYSTAŃ NATURA W LICZBACH">
                        <a href="{{ route('front.developro.plan') }}" class="bttn bttn-icon mt-0 mt-xl-5">
                            Sprawdź domy
                            <svg class="icon" viewBox="0 0 26 26">
                                <path d="M17.3375 10.1985L8.01328 19.5228L6.48145 17.9909L15.8046 8.66667H7.58753V6.5H19.5042V18.4167H17.3375V10.1985Z" fill="currentColor"/>
                            </svg>
                        </a>
                    </x-section-header>
                </div>
                <div class="col-12 col-xl-6 mt-5 mt-xl-0">
                    <ul id="bignumbers" class="mb-0 list-unstyled">
                        <li>
                            <strong>12</strong>
                            <div>
                                <h3>GOTOWYCH DOMÓW W I ETAPIE</h3>
                                <p>12 gotowych wolnostojących domków w stylu skandynawskim czeka na Ciebie!</p>
                            </div>
                        </li>
                        <li>
                            <strong>3</strong>
                            <div>
                                <h3>WARIANTY METRAŻOWE</h3>
                                <p>Wybierz metraż najlepiej dopasowany <br>do Twoich potrzeb - 70, 90 lub 120 m²</p>
                            </div>
                        </li>
                        <li>
                            <strong>2</strong>
                            <div>
                                <h3>WARIANTY MIEJSC POSTOJOWYCH</h3>
                                <p>Większość domów oferuje 2 miejsca postojowe, <br>a wybrany dom 90 m² – 1 miejsce postojowe</p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <x-visual-section
        imageTop="wizualizacja-inwestycji-1.jpg"
        imageBottom="horse.jpg"
        title="W bezpośrednim <br>sąsiedztwie ze <i>stadniną <br>koni i szkółką</i>"
    />

    <section class="">
        <div class="container">
            <div class="row flex-wrap flex-xl-nowrap">
                <div class="col-12 col-xl-6 d-flex align-items-center">
                    <x-section-header title="W rytmie <i>natury</i>" subtitle="O INWESTYCJI">
                        <p>Przystań Natura powstała w Dłutówku pod Łodzią, w powiecie pabianickim - w miejscu otoczonym lasami, pięknym krajobrazem i spokojem, który czuć od pierwszej chwili. W najbliższym otoczeniu znajdują się tereny sprzyjające spacerom, rowerowym przejażdżkom i codziennemu odpoczynkowi od miejskiego tempa, a bezpośrednie sąsiedztwo stadniny koni dodatkowo podkreśla wyjątkowy, naturalny charakter tej lokalizacji. To miejsce stworzone dla osób, które chcą mieszkać bliżej natury, ale nadal korzystać z wygody codziennego życia.</p>
                        <a href="{{ route('front.developro.plan') }}" class="bttn bttn-icon mt-4 mt-sm-5">
                            Sprawdź domy
                            <svg class="icon" viewBox="0 0 26 26">
                                <path d="M17.3375 10.1985L8.01328 19.5228L6.48145 17.9909L15.8046 8.66667H7.58753V6.5H19.5042V18.4167H17.3375V10.1985Z" fill="currentColor"/>
                            </svg>
                        </a>
                    </x-section-header>
                </div>
                <div class="col-12 col-xl-6 vw-50 pe-3 pe-xl-0 mt-4 mt-sm-5 mt-xl-0">
                    <img src="{{ asset('images/family-house.jpg') }}" alt="" class="w-100" width="1160" height="787">
                </div>
            </div>
        </div>
    </section>

    <section class="houses-gradient">
        <!-- Gradient z lewej dzwinie wyglada -->
        <div class="container">
            <div class="row flex-wrap flex-lg-nowrap">
                <div class="col-12 col-lg-3 col-xl-5"></div>
                <div class="col-12 col-lg-9 col-xl-7">
                    <x-section-header title="Naturalna <i>wygoda</i>" subtitle="UDOGODNIENIA" class="ps-0 ps-lg-5 pe-0">
                        <ul id="twocolums" class="mb-0 list-unstyled">
                            <li><img src="{{ asset('/images/icons/air-source-heat-pump.svg') }}" alt=""> Pompa ciepła</li>
                            <li><img src="{{ asset('/images/icons/underfloor-heating.svg') }}" alt=""> Ogrzewanie <br>podłogowe</li>
                            <li><img src="{{ asset('/images/icons/wifi.svg') }}" alt=""> Światłowód</li>
                            <li><img src="{{ asset('/images/icons/garden.svg') }}" alt=""> Własny <br>ogródek</li>
                            <li><img src="{{ asset('/images/icons/parking.svg') }}" alt=""> 1 lub 2 miejsca postojowe</li>
                            <li><img src="{{ asset('/images/icons/fence.svg') }}" alt=""> Ogrodzenie <br>posesji</li>
                            <li><img src="{{ asset('/images/icons/tile.svg') }}" alt=""> Drogi dojazdowe <br>z kostki</li>
                            <li><img src="{{ asset('/images/icons/gate.svg') }}" alt=""> 2 bramy <br>wjazdowe</li>
                        </ul>
                    </x-section-header>
                </div>
            </div>
        </div>
    </section>

    <section class="pb-0">
        <div class="container">
            <div class="row flex-wrap flex-xl-nowrap flex-row-reverse">
                <div class="col-12 col-xl-5">
                    <x-section-header title="Między miastem <br><i>a spokojem</i>" subtitle="REGION" class="ps-0"></x-section-header>
                    <div class="row location-points mt-100 distance-points">
                        <div class="col-6">
                            <x-distance-point time="5 min." title="Dłutów" />
                        </div>
                        <div class="col-6">
                            <x-distance-point time="14 min." title="Pabianice" />
                        </div>
                    </div>
                    <div class="row location-points distance-points">
                        <div class="col-6">
                            <x-distance-point time="25 min." title="Bełchatów" />
                        </div>
                        <div class="col-6">
                            <x-distance-point time="32 min." title="Łódź" />
                        </div>
                    </div>
                    <div class="row location-points distance-points">
                        <div class="col-12">
                            <x-distance-point time="33 min." title="Piotrków Trybunalski" />
                        </div>
                    </div>
                </div>
                <div class="col-12 col-xl-7 vw-50 p-0 d-flex align-items-start">
                    <img src="{{ asset('images/mapa-odleglosci.jpg') }}" alt="" class="w-100" width="1040" height="918">
                </div>
            </div>
        </div>
    </section>

    <section class="location-map">
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
                    <img src="{{ asset('images/location-map.jpg') }}" alt="" class="d-none d-xl-block w-100" width="1160" height="787">
                    <img src="{{ asset('images/location-map-mobile.jpg') }}" alt="" class="d-block d-xl-none w-100" width="960" height="661">
                </div>
            </div>
        </div>
    </section>

    <section class="pb-0">
        <div class="container">
            <div class="row flex-wrap-nowrap">
                <div class="col-12 col-lg-7">
                    <x-section-header title="Wybierz odpowiedni <br><i>metraż dla siebie</i>" subtitle="WARIANTY METRAŻOWE" class="pe-0" />
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-4">
                    <a href="{{ route('front.developro.plan') }}">
                        <div class="house-model-item">
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
                                <h2>Dom 70 m² <i>+ wiata garażowa</i></h2>
                                <span href="" class="bttn bttn-icon mt-2 mt-xl-5 mb-2">
                                Wybierz dom
                                <svg class="icon" viewBox="0 0 26 26">
                                    <path d="M17.3375 10.1985L8.01328 19.5228L6.48145 17.9909L15.8046 8.66667H7.58753V6.5H19.5042V18.4167H17.3375V10.1985Z" fill="currentColor"/>
                                </svg>
                            </span>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-12 col-lg-4">
                    <a href="{{ route('front.developro.plan') }}">
                        <div class="house-model-item">
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
                                <h2>Dom 90 m² <i>+ wiata garażowa</i></h2>
                                <span href="" class="bttn bttn-icon mt-2 mt-xl-5 mb-2">
                                Wybierz dom
                                <svg class="icon" viewBox="0 0 26 26">
                                    <path d="M17.3375 10.1985L8.01328 19.5228L6.48145 17.9909L15.8046 8.66667H7.58753V6.5H19.5042V18.4167H17.3375V10.1985Z" fill="currentColor"/>
                                </svg>
                            </span>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-12 col-lg-4">
                    <a href="{{ route('front.developro.plan') }}">
                        <div class="house-model-item">
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
                                <h2>Dom 120 m² <i>+ wiata garażowa</i></h2>
                                <span href="" class="bttn bttn-icon mt-2 mt-xl-5 mb-2">
                                Wybierz dom
                                <svg class="icon" viewBox="0 0 26 26">
                                    <path d="M17.3375 10.1985L8.01328 19.5228L6.48145 17.9909L15.8046 8.66667H7.58753V6.5H19.5042V18.4167H17.3375V10.1985Z" fill="currentColor"/>
                                </svg>
                            </span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section id="plan" class="d-none d-md-block">
        <!-- Troszke rozmyty plan -->
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <x-section-header title="Wybierz dom <i>dla siebie</i>" subtitle="DOSTĘPNOŚĆ" class="text-center" />
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12 pe-4 ps-4">
                    @if($investment->plan)
                        <div id="plan-holder">
                            <img src="{{ asset('/investment/plan/'.$investment->plan->file) }}" alt="{{$investment->name}}" id="invesmentplan" usemap="#invesmentplan" class="w-100 h-100 object-fit-cover rounded">
                            @if($investment->type == 3)
                                <map name="invesmentplan">
                                    @if($investment->properties)
                                        @foreach($investment->properties as $house)
                                            <area
                                                shape="poly"
                                                href="{{route('front.developro.house', [$investment->slug, $house, Str::slug($house->name), round(floatval($house->area), 2).'-m2'])}}"
                                                title="{{$house->name}}<br>Powierzchnia: <b class=fr>{{$house->area}} m<sup>2</sup></b><br /><b>{{ roomStatus($house->status) }}</b>"
                                                alt="{{$house->slug}}"
                                                data-roomnumber="{{$house->number}}"
                                                data-roomtype="{{$house->typ}}"
                                                data-roomstatus="{{$house->status}}"
                                                coords="{{ $house->html ? (cords($house->html) ?? '') : '' }}"
                                                class="inline status-{{$house->status}}">
                                        @endforeach
                                    @endif
                                </map>
                            @endif
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <div class="container mieszkania-list mt-5">
            <div class="row">
                @if($properties->count() === 0)
                    <p class="text-center text-lg py-3">
                        Brak wyników wyszukiwania, zmień parametry i spróbuj ponownie.
                    </p>
                @else
                    @foreach($properties as $p)

                        <x-list-property-card
                            number="{{ $p->number }}"
                            title="{{ $p->name }}"
                            subtitle="+ wiata garażowa"
                            area="{{ $p->plot_area }} m²"
                            rooms="{{ $p->rooms }}"
                            status="{{ $p->status }}"
                            floors="-"
                            price="{{$p->price_brutto}}"
                            condition="{{ $property->loggia_area }}"
                            pdfUrl="{{ asset('/investment/property/pdf/'.$p->file_pdf) }}"
                            historyUrl="{{ route('front.developro.house', [
                                            $p,
                                            Str::slug($p->name),
                                            round(floatval($p->area), 2).'-m2'
                                        ]) }}"
                            statusClass="status-{{ $p->status }}"
                        />
                    @endforeach
                @endif
            </div>
        </div>
    </section>

    <section id="mainGallery" class="pt-0">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-7">
                    <x-section-header title="Sprawdź <i>osiedle z bliska</i>" subtitle="GALERIA" class="mb-0" />
                </div>
                <div class="col-12 col-md-5 text-end d-flex justify-content-start justify-content-md-end align-items-center">
                    <div class="pb-3 d-block d-sm-flex gap-2 gap-lg-4">
                        <a href="/galeria" class="bttn bttn-icon">
                            OSIEDLE
                            <svg class="icon" viewBox="0 0 26 26">
                                <path d="M17.3375 10.1985L8.01328 19.5228L6.48145 17.9909L15.8046 8.66667H7.58753V6.5H19.5042V18.4167H17.3375V10.1985Z" fill="currentColor"/>
                            </svg>
                        </a>
                        <a href="/galeria/2,wnetrza" class="bttn bttn-icon mt-4 mt-sm-0">
                            WNĘTRZA
                            <svg class="icon" viewBox="0 0 26 26">
                                <path d="M17.3375 10.1985L8.01328 19.5228L6.48145 17.9909L15.8046 8.66667H7.58753V6.5H19.5042V18.4167H17.3375V10.1985Z" fill="currentColor"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="gallery-wrap mt-100" id="gallery">

            <div class="item active">
                <a href="">
                    <img src="{{ asset('images/gallery-1.jpg') }}" alt="">
                    <div class="gallery-item-info">
                        <h2>Dom 90 m² + wiata garażowa</h2>
                        <span>
                        <svg class="icon" viewBox="0 0 26 26">
                            <path d="M17.3375 10.1985L8.01328 19.5228L6.48145 17.9909L15.8046 8.66667H7.58753V6.5H19.5042V18.4167H17.3375V10.1985Z" fill="currentColor"/>
                        </svg>
                    </span>
                    </div>
                </a>
            </div>

            <div class="item">
                <a href="">
                    <img src="{{ asset('images/gallery-2.jpg') }}" alt="">
                    <div class="gallery-item-info">
                        <h2>Dom 90 m² + wiata garażowa</h2>
                        <span>
                        <svg class="icon" viewBox="0 0 26 26">
                            <path d="M17.3375 10.1985L8.01328 19.5228L6.48145 17.9909L15.8046 8.66667H7.58753V6.5H19.5042V18.4167H17.3375V10.1985Z" fill="currentColor"/>
                        </svg>
                    </span>
                    </div>
                </a>
            </div>

            <div class="item">
                <a href="">
                    <img src="{{ asset('images/gallery-3.jpg') }}" alt="">
                    <div class="gallery-item-info">
                        <h2>Dom 90 m² + wiata garażowa</h2>
                        <span>
                        <svg class="icon" viewBox="0 0 26 26">
                            <path d="M17.3375 10.1985L8.01328 19.5228L6.48145 17.9909L15.8046 8.66667H7.58753V6.5H19.5042V18.4167H17.3375V10.1985Z" fill="currentColor"/>
                        </svg>
                    </span>
                    </div>
                </a>
            </div>

            <div class="item">
                <a href="">
                    <img src="{{ asset('images/gallery-4.jpg') }}" alt="">
                    <div class="gallery-item-info">
                        <h2>Dom 90 m² + wiata garażowa</h2>
                        <span>
                        <svg class="icon" viewBox="0 0 26 26">
                            <path d="M17.3375 10.1985L8.01328 19.5228L6.48145 17.9909L15.8046 8.66667H7.58753V6.5H19.5042V18.4167H17.3375V10.1985Z" fill="currentColor"/>
                        </svg>
                    </span>
                    </div>
                </a>
            </div>

        </div>
        <script>
            document.addEventListener("DOMContentLoaded", () => {
                const items = document.querySelectorAll("#gallery .item");

                items.forEach(item => {
                    item.addEventListener("mouseenter", () => {
                        items.forEach(i => i.classList.remove("active"));
                        item.classList.add("active");
                    });

                    // 🔥 mobile support
                    item.addEventListener("click", () => {
                        items.forEach(i => i.classList.remove("active"));
                        item.classList.add("active");
                    });
                });

                // 🔥 fallback – zawsze pierwszy aktywny
                const gallery = document.getElementById("gallery");
                gallery.addEventListener("mouseleave", () => {
                    items.forEach(i => i.classList.remove("active"));
                    items[0].classList.add("active");
                });
            });
        </script>
    </section>

    @include('front.contact.page-contact', ['page_name' => 'Strona główna'])
    </main>
@endsection
@push('scripts')
    <script src="{{ asset('/js/plan/imagemapster.js') }}" charset="utf-8"></script>
    <script src="{{ asset('/js/plan/tip.js') }}" charset="utf-8"></script>
    <script src="{{ asset('/js/plan/floor.js') }}" charset="utf-8"></script>
    <script>
        document.querySelectorAll('.dropdown').forEach(dropdown => {
            const button = dropdown.querySelector('.dropdown-toggle');
            const input = dropdown.parentElement.querySelector('input[type="hidden"]');

            dropdown.querySelectorAll('.dropdown-item').forEach(item => {
                item.addEventListener('click', e => {
                    e.preventDefault();
                    button.textContent = item.textContent;
                    input.value = item.dataset.value || '';
                    dropdown.querySelectorAll('.dropdown-item').forEach(i => i.classList.remove('active'));
                    item.classList.add('active');
                });
            });
        });
    </script>
@endpush

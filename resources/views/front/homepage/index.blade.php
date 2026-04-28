@extends('layouts.homepage')

@section('content')
    <section id="mainFeatures" class="py-5">
        <div class="container">
            <div class="row">
                <!-- ITEM -->
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="feature-box">
                        <img src="{{ asset('/images/icons/real-estate.svg') }}" alt="" class="icon">
                        <h2 class="fw-bold">Gotowy etap inwestycji</h2>
                        <p>12 wybudowanych domów to gwarancja bezpieczeństwa. Obejrzyj realną inwestycję na żywo, zamiast kupować wyłącznie na podstawie wizualizacji.</p>
                    </div>
                </div>
                <!-- ITEM -->
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="feature-box">
                        <img src="{{ asset('/images/icons/fences.svg') }}" alt="" class="icon">
                        <h2 class="fw-bold">Domy 70 / 90 / 120 m²</h2>
                        <p>Wolnostojące, skandynawskie domy dopasowane do Twoich potrzeb. Ciesz się pełną prywatnością i zapomnij o sąsiadach za ścianą.</p>
                    </div>
                </div>
                <!-- ITEM -->
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="feature-box">
                        <img src="{{ asset('/images/icons/blueprint.svg') }}" alt="" class="icon">
                        <h2 class="fw-bold">Działki ok. 500–1000 m²</h2>
                        <p>Duża, własna działka to idealne miejsce na wymarzony ogród. Zyskaj prywatną przestrzeń i ciszę, która należy tylko do Ciebie.</p>
                    </div>
                </div>
                <!-- ITEM -->
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="feature-box">
                        <img src="{{ asset('/images/icons/car-parking.svg') }}" alt="" class="icon">
                        <h2 class="fw-bold">Miejsca postojowe</h2>
                        <p>Zapewniamy maksymalną wygodę na co dzień. Do każdego domu przynależą dwa własne miejsca postojowe oraz przygotowany podjazd.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-logo p-0">
        <div class="container">
            <div class="row flex-wrap-nowrap">
                <div class="col-6">
                    <div class="section-text">
                        <span>PRZYSTAŃ NATURA W LICZBACH</span>
                        <h2>Nowy standard <i>każdego dnia</i></h2>
                        <a href="" class="bttn bttn-icon mt-5">
                            Sprawdź domy
                            <svg class="icon" viewBox="0 0 26 26">
                                <path d="M17.3375 10.1985L8.01328 19.5228L6.48145 17.9909L15.8046 8.66667H7.58753V6.5H19.5042V18.4167H17.3375V10.1985Z" fill="currentColor"/>
                            </svg>
                        </a>
                    </div>
                </div>
                <div class="col-6">
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

    <section class="pt-0 pb-0">
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

    <section class="">
        <div class="container">
            <div class="row flex-wrap-nowrap">
                <div class="col-6 d-flex align-items-center">
                    <div class="section-text">
                        <span>O INWESTYCJI</span>
                        <h2>W rytmie <i>natury</i></h2>
                        <p>Przystań Natura powstaje w Dłutówku pod Łodzią, w powiecie pabianickim - w miejscu otoczonym lasami, pięknym krajobrazem i spokojem, który czuć od pierwszej chwili. W najbliższym otoczeniu znajdują się tereny sprzyjające spacerom, rowerowym przejażdżkom i codziennemu odpoczynkowi od miejskiego tempa, a bezpośrednie sąsiedztwo stadniny koni dodatkowo podkreśla wyjątkowy, naturalny charakter tej lokalizacji. To miejsce stworzone dla osób, które chcą mieszkać bliżej natury, ale nadal korzystać z wygody codziennego życia.</p>
                        <a href="" class="bttn bttn-icon mt-5">
                            Sprawdź domy
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

    <section class="houses-gradient">
        <!-- Gradient z lewej dzwinie wyglada -->
        <div class="container">
            <div class="row flex-wrap-nowrap">
                <div class="col-5"></div>
                <div class="col-7">
                    <div class="section-text ps-5 pe-0">
                        <span>UDOGODNIENIA</span>
                        <h2>Naturalna <i>wygoda</i></h2>
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
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="">
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
            <div class="row flex-wrap-nowrap">
                <div class="col-7">
                    <div class="section-text pe-0">
                        <span>WARIANTY METRAŻOWE</span>
                        <h2>Wybierz odpowiedni <br><i>metraż dla siebie</i></h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-4">
                    <a href="">
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
                                <span href="" class="bttn bttn-icon mt-5 mb-2">
                                Wybierz dom
                                <svg class="icon" viewBox="0 0 26 26">
                                    <path d="M17.3375 10.1985L8.01328 19.5228L6.48145 17.9909L15.8046 8.66667H7.58753V6.5H19.5042V18.4167H17.3375V10.1985Z" fill="currentColor"/>
                                </svg>
                            </span>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-4">
                    <a href="">
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
                                <h2>Dom 70 m² <i>+ wiata garażowa</i></h2>
                                <span href="" class="bttn bttn-icon mt-5 mb-2">
                                Wybierz dom
                                <svg class="icon" viewBox="0 0 26 26">
                                    <path d="M17.3375 10.1985L8.01328 19.5228L6.48145 17.9909L15.8046 8.66667H7.58753V6.5H19.5042V18.4167H17.3375V10.1985Z" fill="currentColor"/>
                                </svg>
                            </span>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-4">
                    <a href="">
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
                                <h2>Dom 70 m² <i>+ wiata garażowa</i></h2>
                                <span href="" class="bttn bttn-icon mt-5 mb-2">
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

    <section id="plan" class="">
        <!-- Troszke rozmyty plan -->
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-text text-center">
                        <span>DOSTĘPNOŚĆ</span>
                        <h2>Wybierz dom <i>dla siebie</i></h2>
                    </div>
                </div>
                <div class="col-12 mt-5">
                    <img src="{{ asset('images/plan.jpg') }}" alt="" class="w-100 big-borders" width="1620" height="827">
                </div>
            </div>
        </div>

        <div id="houses" class="container">
            <div class="row">
                <div class="col-4">
                    <div class="house-item">
                        <div class="house-item-header">
                            <strong>
                                01
                            </strong>
                            <div>
                                <h2>Dom 88,46 m²<span>+ wiata garażowa</span></h2>
                            </div>
                        </div>
                        <ul class="mb-0 list-unstyled">
                            <li class="w-50 border-right">Działka <span>518 m²</span></li>
                            <li class="w-50">Pokoje <span>5</span></li>
                            <li>Status <span class="status-1"><strong>DOSTĘPNY</strong></span></li>
                            <li>Kondygnacje <span>2</span></li>
                            <li>Cena <span>1.299.000 zł</span></li>
                            <li>Stan <span>urządzony "pod klucz"</span></li>
                        </ul>
                        <div class="house-item-footer row">
                            <div class="col-6">
                                <a href="" class="bttn bttn-icon">
                                    Pobierz pdf
                                    <svg class="icon" viewBox="0 0 26 26">
                                        <path d="M17.3375 10.1985L8.01328 19.5228L6.48145 17.9909L15.8046 8.66667H7.58753V6.5H19.5042V18.4167H17.3375V10.1985Z" fill="currentColor"/>
                                    </svg>
                                </a>
                            </div>
                            <div class="col-6">
                                <a href="" class="bttn bttn-icon">
                                    Pokaż historię
                                    <svg class="icon" viewBox="0 0 26 26">
                                        <path d="M17.3375 10.1985L8.01328 19.5228L6.48145 17.9909L15.8046 8.66667H7.58753V6.5H19.5042V18.4167H17.3375V10.1985Z" fill="currentColor"/>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="house-item">
                        <div class="house-item-header">
                            <strong>
                                01
                            </strong>
                            <div>
                                <h2>Dom 88,46 m²<span>+ wiata garażowa</span></h2>
                            </div>
                        </div>
                        <ul class="mb-0 list-unstyled">
                            <li class="w-50 border-right">Działka <span>518 m²</span></li>
                            <li class="w-50">Pokoje <span>5</span></li>
                            <li>Status <span class="status-1"><strong>DOSTĘPNY</strong></span></li>
                            <li>Kondygnacje <span>2</span></li>
                            <li>Cena <span>1.299.000 zł</span></li>
                            <li>Stan <span>urządzony "pod klucz"</span></li>
                        </ul>
                        <div class="house-item-footer row">
                            <div class="col-6">
                                <a href="" class="bttn bttn-icon">
                                    Pobierz pdf
                                    <svg class="icon" viewBox="0 0 26 26">
                                        <path d="M17.3375 10.1985L8.01328 19.5228L6.48145 17.9909L15.8046 8.66667H7.58753V6.5H19.5042V18.4167H17.3375V10.1985Z" fill="currentColor"/>
                                    </svg>
                                </a>
                            </div>
                            <div class="col-6">
                                <a href="" class="bttn bttn-icon">
                                    Pokaż historię
                                    <svg class="icon" viewBox="0 0 26 26">
                                        <path d="M17.3375 10.1985L8.01328 19.5228L6.48145 17.9909L15.8046 8.66667H7.58753V6.5H19.5042V18.4167H17.3375V10.1985Z" fill="currentColor"/>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="house-item">
                        <div class="house-item-header">
                            <strong>
                                01
                            </strong>
                            <div>
                                <h2>Dom 88,46 m²<span>+ wiata garażowa</span></h2>
                            </div>
                        </div>
                        <ul class="mb-0 list-unstyled">
                            <li class="w-50 border-right">Działka <span>518 m²</span></li>
                            <li class="w-50">Pokoje <span>5</span></li>
                            <li>Status <span class="status-1"><strong>DOSTĘPNY</strong></span></li>
                            <li>Kondygnacje <span>2</span></li>
                            <li>Cena <span>1.299.000 zł</span></li>
                            <li>Stan <span>urządzony "pod klucz"</span></li>
                        </ul>
                        <div class="house-item-footer row">
                            <div class="col-6">
                                <a href="" class="bttn bttn-icon">
                                    Pobierz pdf
                                    <svg class="icon" viewBox="0 0 26 26">
                                        <path d="M17.3375 10.1985L8.01328 19.5228L6.48145 17.9909L15.8046 8.66667H7.58753V6.5H19.5042V18.4167H17.3375V10.1985Z" fill="currentColor"/>
                                    </svg>
                                </a>
                            </div>
                            <div class="col-6">
                                <a href="" class="bttn bttn-icon">
                                    Pokaż historię
                                    <svg class="icon" viewBox="0 0 26 26">
                                        <path d="M17.3375 10.1985L8.01328 19.5228L6.48145 17.9909L15.8046 8.66667H7.58753V6.5H19.5042V18.4167H17.3375V10.1985Z" fill="currentColor"/>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="house-item">
                        <div class="house-item-header">
                            <strong>
                                01
                            </strong>
                            <div>
                                <h2>Dom 88,46 m²<span>+ wiata garażowa</span></h2>
                            </div>
                        </div>
                        <ul class="mb-0 list-unstyled">
                            <li class="w-50 border-right">Działka <span>518 m²</span></li>
                            <li class="w-50">Pokoje <span>5</span></li>
                            <li>Status <span class="status-1"><strong>DOSTĘPNY</strong></span></li>
                            <li>Kondygnacje <span>2</span></li>
                            <li>Cena <span>1.299.000 zł</span></li>
                            <li>Stan <span>urządzony "pod klucz"</span></li>
                        </ul>
                        <div class="house-item-footer row">
                            <div class="col-6">
                                <a href="" class="bttn bttn-icon">
                                    Pobierz pdf
                                    <svg class="icon" viewBox="0 0 26 26">
                                        <path d="M17.3375 10.1985L8.01328 19.5228L6.48145 17.9909L15.8046 8.66667H7.58753V6.5H19.5042V18.4167H17.3375V10.1985Z" fill="currentColor"/>
                                    </svg>
                                </a>
                            </div>
                            <div class="col-6">
                                <a href="" class="bttn bttn-icon">
                                    Pokaż historię
                                    <svg class="icon" viewBox="0 0 26 26">
                                        <path d="M17.3375 10.1985L8.01328 19.5228L6.48145 17.9909L15.8046 8.66667H7.58753V6.5H19.5042V18.4167H17.3375V10.1985Z" fill="currentColor"/>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="mainGallery" class="pt-0">
        <div class="container">
            <div class="row">
                <div class="col-7">
                    <div class="section-text">
                        <span>GALERIA</span>
                        <h2 class="mb-0">Sprawdź <i>osiedle z bliska</i></h2>
                    </div>
                </div>
                <div class="col-5 text-end d-flex justify-content-end align-items-end">
                    <div class="pb-3 d-flex gap-4">
                        <a href="" class="bttn bttn-icon">
                            WIZUALIZACJE
                            <svg class="icon" viewBox="0 0 26 26">
                                <path d="M17.3375 10.1985L8.01328 19.5228L6.48145 17.9909L15.8046 8.66667H7.58753V6.5H19.5042V18.4167H17.3375V10.1985Z" fill="currentColor"/>
                            </svg>
                        </a>
                        <a href="" class="bttn bttn-icon">
                            POSTĘP BUDOWY
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

    @include('front.contact.page-contact')

@endsection
@push('scripts')
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

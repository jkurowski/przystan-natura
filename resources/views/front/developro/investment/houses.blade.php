@extends('layouts.page', ['body_class' => 'position-relative', 'body_id' => 'page-mieszkania'])

@section('meta_title', $page->title ?? 'Domy')
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
                    <a href="/">Strona główna</a> / Domy
                </div>
            </div>
        </div>
        <!-- PAGE ENTRY -->
        <div class="container-fluid page-entry-center px-0 position-relative">
            <div class="container ">
                <div class="row">
                    <div class="col-12 col-lg-10 col-xl-8 col-xxl-6 offset-0 offset-lg-1 offset-xl-2 offset-xxl-3  d-flex flex-column align-items-center justify-content-center order-2 order-xl-1">
                        <h1 class="text-uppercase text-center scroll-anim-top">Domy</h1>

                    </div>
                </div>
            </div>
        </div>

        @include('front.developro.search.houses-search-form')

        <div class="container-fluid items-list px-0 position-relative">
            <div class="items-list__decor">
                <svg xmlns="http://www.w3.org/2000/svg" width="29" height="483.288" viewBox="0 0 29 483.288">
                    <path id="single-slider-decor" d="M1919.5,1171.283h-29V770.4a213.737,213.737,0,0,0,9.558-19.68c3.258-7.556,6.474-15.887,9.3-24.092,5.148-14.956,8.75-28.674,10.144-38.628Z" transform="translate(-1890.5 -687.995)" fill="#5a5a5a"/>
                </svg>
            </div>
            <div class="container">
                <div class="row">
                    @foreach($investments as $investment)
                        <div class="col-12 col-md-6 col-xl-4 mb-15 mb-sm-30 scroll-anim-bottom">
                            <div class="items-list__item position-relative">
                                <a href="{{ route('front.developro.show', $investment->slug) }}" class="items-list__streched-link z-2"></a>
                                <div class="d-flex position-relative">
                                    <div class="items-list__cats d-flex flex-row flex-wrap gap-10 d-none">
                                        <a href="#" class="items-list__cat-item z-3 position-relative">
                                            ostatnie mieszkania
                                        </a>
                                        <a href="#" class="items-list__cat-item z-3 position-relative">
                                            Psie pole
                                        </a>
                                    </div>
                                    @if($investment->file_thumb)
                                        <img src="{{ asset('investment/thumbs/' . $investment->file_thumb) }}" alt="Miniaturka inwestycji {{ $investment->name }}" class="items-list__img w-100">
                                    @endif
                                </div>
                                <div class="d-flex flex-column align-items-start justify-content-start p-20">
                                    <h3 class="text-uppercase mb-10">{{ $investment->name }}</h3>
                                    <span class="mb-15">{{ $investment->inv_street }}, {{ $investment->inv_city }}</span>
                                    @if($investment->date_start)
                                        <span class="mb-15">Termin rozpoczęcia sprzedaży: {{ $investment->date_start }}</span>
                                    @endif
                                    @if($investment->date_end)
                                        <span class="mb-15">Termin zakończenia: {{ $investment->date_end }}</span>
                                    @endif
                                    <div class="d-flex flex-row align-items-center justify-content-start gap-2 mb-15">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="19.496" height="19.496" viewBox="0 0 19.496 19.496"><g transform="translate(-1.5 -1.5)"><path d="M25,9.09V2H36.406V14.022H33.015V20.5H30.241" transform="translate(-15.91)" fill="none" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="1"/><path d="M13.406,26.256l-1.85,1.85H2V13H9.09" transform="translate(0 -7.609)" fill="none" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="1"/><path d="M25,34v4.007" transform="translate(-15.91 -22.135)" fill="none" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="1"/><path d="M25,56v1.85" transform="translate(-15.91 -37.354)" fill="none" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="1"/><path d="M9.09,41H2" transform="translate(0 -26.978)" fill="none" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="1"/></g></svg>
                                        <span>Ilość pokoi: </span>
                                        <div class="items-list__pokoj d-flex align-items-center justify-content-center">3</div>
                                    </div>
                                    @if($investment->inv_phone)
                                        <span class="mb-10">Biuro sprzedaży </span>
                                        <a href="tel:{{ $investment->inv_phone }}" class="items-list__tel mb-20 z-2">{{ $investment->inv_phone }}</a>
                                    @endif
                                    <a href="#" class="custom-button z-2">Sprawdź</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="row mt-40 mt-lg-60 mt-xl-80 d-none">
                    <div class="col-12">
                        <div class="pagination d-flex align-items-center justify-content-center gap-20 gap-md-50">
                            <a href="#" class="pagination__btn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="8.685" height="15.588" viewBox="0 0 8.685 15.588"><path id="arrow-left" d="M285.484-836.722l.891-.891-6.9-6.9,6.9-6.9-.891-.891-7.794,7.794Z" transform="translate(-277.69 852.31)" fill="#fff"></path></svg>
                            </a>
                            <span class="pagination__current">
                                1
                            </span>
                            <a href="#" class="pagination__link">2</a>
                            <a href="#" class="pagination__link">3</a>
                            <a href="#" class="pagination__btn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="8.685" height="15.588" viewBox="0 0 8.685 15.588"><path id="arrow-next" d="M278.581-836.722l-.891-.891,6.9-6.9-6.9-6.9.891-.891,7.794,7.794Z" transform="translate(-277.69 852.31)" fill="#fff"></path></svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- CTA -->
        <div class="container-flud cta position-relative px-0 scroll-anim-blur z-2">
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
                                <h2 class="mb-15 text-start text-uppercase">Umów się</br>na spotkanie</h2>
                                <p class="text-start">Własne mieszkanie zaczyna się od dobrego planu. Umów się z nami na spotkanie i bądź bliżej swojego nowego adresu</p>
                                <span class="cta__subtitle">Główne biuro handlowe</span>
                                <a href="tel:+48609997998" class="inwestycje-kontakt__link d-flex align-items-center justify-content-start gap-2 mt-20">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="31" height="31" viewBox="0 0 31 31">
                                        <g id="phone" transform="translate(-546.5 -3478.5)">
                                            <path id="Subtraction_13" data-name="Subtraction 13" d="M-7725,3461.5a15.4,15.4,0,0,1-10.959-4.54A15.4,15.4,0,0,1-7740.5,3446a15.4,15.4,0,0,1,4.541-10.96A15.4,15.4,0,0,1-7725,3430.5a15.4,15.4,0,0,1,10.96,4.54,15.4,15.4,0,0,1,4.54,10.96,15.4,15.4,0,0,1-4.54,10.96A15.4,15.4,0,0,1-7725,3461.5Zm0-30a14.405,14.405,0,0,0-10.252,4.247A14.405,14.405,0,0,0-7739.5,3446a14.405,14.405,0,0,0,4.248,10.253A14.4,14.4,0,0,0-7725,3460.5a14.4,14.4,0,0,0,10.253-4.247A14.406,14.406,0,0,0-7710.5,3446a14.406,14.406,0,0,0-4.247-10.253A14.406,14.406,0,0,0-7725,3431.5Zm6.336,22.5a13.851,13.851,0,0,1-13.835-13.835,1.665,1.665,0,0,1,1.664-1.664h2.663a1.665,1.665,0,0,1,1.662,1.664,7.716,7.716,0,0,0,.391,2.432l0,.009a1.677,1.677,0,0,1-.387,1.662l-.982,1.3a8.411,8.411,0,0,0,3.414,3.413l1.347-1.015a1.638,1.638,0,0,1,1.121-.42,1.6,1.6,0,0,1,.518.083,7.687,7.687,0,0,0,2.422.385,1.665,1.665,0,0,1,1.664,1.664v2.656A1.665,1.665,0,0,1-7718.664,3454Zm-12.172-14.5a.664.664,0,0,0-.664.664A12.85,12.85,0,0,0-7718.664,3453a.664.664,0,0,0,.664-.663v-2.656a.664.664,0,0,0-.664-.664,8.691,8.691,0,0,1-2.741-.437.611.611,0,0,0-.2-.031.644.644,0,0,0-.435.148l-.027.028-.031.023-1.886,1.421-.282-.15a9.486,9.486,0,0,1-4.257-4.257l-.149-.281,1.407-1.869.025-.025a.679.679,0,0,0,.167-.681,8.71,8.71,0,0,1-.44-2.742.663.663,0,0,0-.662-.664Z" transform="translate(8287 48)"></path>
                                        </g>
                                    </svg>
                                    609 997 998
                                </a>
                                <a href="tel:713941000" class="inwestycje-kontakt__link d-flex align-items-center justify-content-start gap-2 mt-20">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="31" height="31" viewBox="0 0 31 31">
                                        <g id="phone" transform="translate(-546.5 -3478.5)">
                                            <path id="Subtraction_13" data-name="Subtraction 13" d="M-7725,3461.5a15.4,15.4,0,0,1-10.959-4.54A15.4,15.4,0,0,1-7740.5,3446a15.4,15.4,0,0,1,4.541-10.96A15.4,15.4,0,0,1-7725,3430.5a15.4,15.4,0,0,1,10.96,4.54,15.4,15.4,0,0,1,4.54,10.96,15.4,15.4,0,0,1-4.54,10.96A15.4,15.4,0,0,1-7725,3461.5Zm0-30a14.405,14.405,0,0,0-10.252,4.247A14.405,14.405,0,0,0-7739.5,3446a14.405,14.405,0,0,0,4.248,10.253A14.4,14.4,0,0,0-7725,3460.5a14.4,14.4,0,0,0,10.253-4.247A14.406,14.406,0,0,0-7710.5,3446a14.406,14.406,0,0,0-4.247-10.253A14.406,14.406,0,0,0-7725,3431.5Zm6.336,22.5a13.851,13.851,0,0,1-13.835-13.835,1.665,1.665,0,0,1,1.664-1.664h2.663a1.665,1.665,0,0,1,1.662,1.664,7.716,7.716,0,0,0,.391,2.432l0,.009a1.677,1.677,0,0,1-.387,1.662l-.982,1.3a8.411,8.411,0,0,0,3.414,3.413l1.347-1.015a1.638,1.638,0,0,1,1.121-.42,1.6,1.6,0,0,1,.518.083,7.687,7.687,0,0,0,2.422.385,1.665,1.665,0,0,1,1.664,1.664v2.656A1.665,1.665,0,0,1-7718.664,3454Zm-12.172-14.5a.664.664,0,0,0-.664.664A12.85,12.85,0,0,0-7718.664,3453a.664.664,0,0,0,.664-.663v-2.656a.664.664,0,0,0-.664-.664,8.691,8.691,0,0,1-2.741-.437.611.611,0,0,0-.2-.031.644.644,0,0,0-.435.148l-.027.028-.031.023-1.886,1.421-.282-.15a9.486,9.486,0,0,1-4.257-4.257l-.149-.281,1.407-1.869.025-.025a.679.679,0,0,0,.167-.681,8.71,8.71,0,0,1-.44-2.742.663.663,0,0,0-.662-.664Z" transform="translate(8287 48)"></path>
                                        </g>
                                    </svg>
                                    71 394 10 00
                                </a>
                                <a href="mailto:biuro@triadadom.pl" class="inwestycje-kontakt__link d-flex align-items-center justify-content-start gap-2 mt-20">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="31" height="31" viewBox="0 0 31 31">
                                        <g id="mail" transform="translate(-546.5 -3528.5)">
                                            <path id="Subtraction_2" data-name="Subtraction 2" d="M-1975,30.5a15.4,15.4,0,0,1-10.96-4.54A15.4,15.4,0,0,1-1990.5,15a15.4,15.4,0,0,1,4.54-10.96A15.4,15.4,0,0,1-1975-.5a15.4,15.4,0,0,1,10.96,4.54A15.4,15.4,0,0,1-1959.5,15a15.4,15.4,0,0,1-4.54,10.96A15.4,15.4,0,0,1-1975,30.5Zm0-30a14.406,14.406,0,0,0-10.253,4.247A14.406,14.406,0,0,0-1989.5,15a14.4,14.4,0,0,0,4.247,10.252A14.406,14.406,0,0,0-1975,29.5a14.4,14.4,0,0,0,10.253-4.247A14.4,14.4,0,0,0-1960.5,15a14.406,14.406,0,0,0-4.247-10.253A14.4,14.4,0,0,0-1975,.5Zm5.958,21.727h-11.916a3,3,0,0,1-2.995-2.995V11.894l8.7,5.314a.45.45,0,0,0,.239.066.449.449,0,0,0,.233-.063l.006,0,8.724-5.313v7.337A3,3,0,0,1-1969.042,22.227Zm-13.911-8.55v5.556a2,2,0,0,0,1.995,1.995h11.916a2,2,0,0,0,1.995-1.995V13.675l-7.2,4.386a1.455,1.455,0,0,1-.761.214,1.445,1.445,0,0,1-.764-.215Zm7.963,3.248-8.946-5.454.074-.347a2.986,2.986,0,0,1,2.9-2.351h11.916a2.986,2.986,0,0,1,2.9,2.351l.074.347ZM-1982.781,11l7.791,4.75,7.772-4.749a1.982,1.982,0,0,0-1.824-1.231h-11.916A1.982,1.982,0,0,0-1982.781,11Z" transform="translate(2537 3529)"></path>
                                        </g>
                                    </svg>
                                    biuro@triadadom.pl
                                </a>
                                <a href="{{ route('front.menu.show', ['uri' => 'kontakt']) }}" class="custom-button mt-35">Kontakt</a>
                            </div>
                            <div class="cta__right d-none d-lg-flex">
                                <img class="cta__img" src="{{ asset("img/temp/cta-person.png") }}" width="489" height="564" alt="Zdjęcie w tle">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- FORM -->
        <div class="container-fluid contact-form position-relative">
            <div class="contact-form__decor">
                <svg xmlns="http://www.w3.org/2000/svg" width="1043.203" height="31" viewBox="0 0 1043.203 31">
                    <path id="contact-form-decor-01" d="M.5,1532.5v-31H1043.7a200.41,200.41,0,0,1-18.655,10.048c-7.312,3.506-15.37,6.965-23.3,10-14.646,5.607-28.024,9.489-37.6,10.949Z" transform="translate(-0.5 -1501.5)" fill="#fff"/>
                </svg>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-10 col-xl-8 col-xxl-6 offset-0 offset-lg-1 offset-xl-2 offset-xxl-3 d-flex align-items-center justify-content-center flex-column ">
                        <h2 class="mb-15 text-center  text-uppercase square-under-second text-white">Zapytaj</br>o ofertę</h2>
                        <p class="text-center text-white mb-20 mb-lg-60">Interesuje Cię nasze mieszkanie lub dom? Zrób pierwszy krok i zapytaj nas o szczegóły.</p>
                        <form method="" class="contact-form__form">

                            <div class="input-wrapper box-anim input-wrapper-50 d-flex align-items-start justify-content-start">
                                <label class="form-label lab-anim" for="your-name">Imię i Nazwisko</label>
                                <input size="40" maxlength="400" class="form-control d form-input" id="your-name" value="" type="text" name="your-name">
                            </div>

                            <div class="input-wrapper input-wrapper-50 box-anim d-flex align-items-start justify-content-start">
                                <label class="form-label lab-anim" for="cf-typ">Typ inwestycji</label>
                                <select name="cf-typ" id="cf-typ">
                                    <option value=""></option>
                                    <option value="Typ 1">Typ 1</option>
                                    <option value="Typ 2">Typ 2</option>
                                    <option value="Typ 3">Typ 3</option>
                                </select>
                            </div>



                            <div class="input-wrapper input-wrapper-50 box-anim w-50 d-flex align-items-start justify-content-start">
                                <label class="form-label lab-anim" for="your-email">E-mail*</label>
                                <input size="40" maxlength="400" class="form-control form-input" id="your-email" value="" type="email" name="your-email">
                            </div>
                            <div class="input-wrapper input-wrapper-50 box-anim w-50 d-flex align-items-start justify-content-start">
                                <label class="form-label lab-anim" for="phone">Telefon</label>
                                <input size="40" maxlength="400" class="form-control form-input" id="phone" value="" type="tel" name="phone">
                            </div>





                            <div class="input-wrapper box-anim w-100 d-flex align-items-start justify-content-start">
                                <label class="form-label lab-anim" for="your-message">Wiadomość</label>
                                <textarea cols="10" rows="3" maxlength="2000" class="form-control form-input" id="your-message" aria-invalid="false" name="your-message"></textarea>
                            </div>




                            <div class="input-wrapper w-100 d-flex align-items-start justify-content-start contact-form__check">
                                <label class="d-flex flex-row align-items-start justify-content-start gap-1">
                                    <input type="checkbox" class="form-check-input" name="acceptance-67" value="1" aria-invalid="false">
                                    <span class="text-white">
                        Wyrażam zgodę na przetwarzanie przez ....... moich danych osobowych w postaci adresu poczty elektronicznej w celu przesyłania mi informacji marketingowych dotyczących produktów i usług oferowanych przez ....... za pomocą środków komunikacji elektronicznej, stosownie do treści przepisu art. 10 ust. 1 i 2 ustawy o świadczeniu usług drogą elektroniczną.
                      </span>
                                </label>
                            </div>
                            <div class="input-wrapper w-100 d-flex align-items-start justify-content-start contact-form__check">
                                <label class="d-flex flex-row align-items-start justify-content-start gap-1">
                                    <input type="checkbox" class="form-check-input" name="acceptance-67" value="1" aria-invalid="false">
                                    <span class="text-white">
                        Wyrażam zgodę na przetwarzanie moich danych osobowych w postaci podanego przeze mnie numeru telefonu przez ....... w celu prowadzenia działań marketingowych przy użyciu telekomunikacyjnych urządzeń końcowych oraz automatycznych systemów wywołujących w rozumieniu ustawy Prawo telekomunikacyjne.
                      </span>
                                </label>
                            </div>
                            <div class="input-wrapper w-100 d-flex align-items-start justify-content-start contact-form__check">
                                <label class="d-flex flex-row align-items-start justify-content-start gap-1">
                                    <input type="checkbox" class="form-check-input" name="acceptance-67" value="1" aria-invalid="false">
                                    <span class="text-white">
                        Wyrażam zgodę na profilowanie
                      </span>
                                </label>
                            </div>
                            <button class="custom-button position-relative">
                                Wyślij
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </main>
    <!-- END -> MAIN SECTION -->
@endsection

@php
    $type = (int)request('type');

    $investmentType = match ($type) {
        1 => [1, 2],
        2 => [3],
        default => [1, 2, 3],
    };

    $tabs = $type == 2 ? 2 : 1;
@endphp

@props([
    'tabs' => $tabs,
    'investmentType' => $investmentType,
])
@if($tabs)
    <div class="container-fluid position-relative mt-3 home-search p-0">
        <div class="container ">
            <div class="row">
                <div class="col-12 d-flex flex-column align-items-center justify-content-center">
                    <div class="home-search__wrapper w-100">

                        <ul class="nav nav-pills bg-white" id="pills-tab" role="tablist">
                            @if(searchFormActive(request('type')))
                                <li class="nav-item mb-0" role="presentation">
                                    <button class="nav-link {{ (request('type') == 1) ? 'active' : '' }} text-uppercase" id="mieszkania-tab" data-bs-toggle="pill" data-bs-target="#mieszkania" type="button" role="tab" aria-controls="mieszkania" aria-selected="{{ (request('type') == 1) ? 'true' : 'false' }}">mieszkania</button>
                                </li>
                            @endif

                            @if(searchFormActive(request('type')))
                                <li class="nav-item mb-0" role="presentation">
                                    <button class="nav-link {{ (request('type') == 2) ? 'active' : '' }} text-uppercase" id="domy-tab" data-bs-toggle="pill" data-bs-target="#domy" type="button" role="tab" aria-controls="domy" aria-selected="{{ (request('type') == 2) ? 'true' : 'false' }}">domy</button>
                                </li>
                            @endif
                        </ul>
@endif

                        <div class="tab-content" id="myTabContent">
                            @if(searchFormActive(1))
                                <div class="tab-pane fade show active" id="mieszkania" role="tabpanel" aria-labelledby="mieszkania-tab">
                                    @include('front.developro.search.flat-search-form', [
                                        'tabs' => 0,
                                        'area' => $flatArea,
                                        'price' => $flatPrice,
                                        'rooms' => $flatRooms,
                                        'investmentType' => [1,2],
                                        'searchType' => 1
                                        ]
                                    )
                                </div>
                            @endif

                            @if(searchFormActive(2))
                                <div class="tab-pane fade" id="domy" role="tabpanel" aria-labelledby="domy-tab">
                                    @include('front.developro.search.houses-search-form', [
                                        'tabs' => 0,
                                        'area' => $houseArea,
                                        'price' => $housePrice,
                                        'rooms' => $houseRooms,
                                        'investmentType' => [3],
                                        'searchType' => 2
                                        ]
                                    )
                                </div>
                            @endif

                            <div class="tab-pane fade" id="apart-inwest" role="tabpanel" aria-labelledby="apart-inwest-tab">
                                <form action="" class="home-search__form d-flex flex-row flex-wrap align-items-start justify-content-between gap-30 ">
                                    <div class="d-flex flex-wrap gap-30 home-search__form-inputs">
                                        <div class="input-wrapper box-anim d-flex align-items-start justify-content-start">
                                            <label class="form-label lab-anim" for="apart-inwest-inwestycja">Inwestycja</label>
                                            <select name="apart-inwest-inwestycja" id="apart-inwest-inwestycja">
                                                <option value=""></option>
                                                <option value="inwestycja 1">inwestycja 1</option>
                                                <option value="inwestycja 2">inwestycja 2</option>
                                                <option value="inwestycja 3">inwestycja 3</option>
                                            </select>
                                        </div>
                                        <div class="input-wrapper box-anim d-flex align-items-start justify-content-start">
                                            <label class="form-label lab-anim" for="apart-inwest-powierzchnia">Powierzchnia</label>
                                            <select name="apart-inwest-powierzchnia" id="apart-inwest-powierzchnia">
                                                <option value=""></option>
                                                <option value="50m2">50m2</option>
                                                <option value="100m2">100m2</option>
                                                <option value="150m2">150m2</option>
                                            </select>
                                        </div>
                                        <div class="input-wrapper box-anim d-flex align-items-start justify-content-start">
                                            <label class="form-label lab-anim" for="apart-inwest-pokoje">Liczba pokoi</label>
                                            <select name="apart-inwest-pokoje" id="apart-inwest-pokoje">
                                                <option value=""></option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                        </div>
                                        <div class="input-wrapper box-anim d-flex align-items-start justify-content-start">
                                            <label class="form-label lab-anim" for="apart-inwest-pietro">Piętro</label>
                                            <select name="apart-inwest-pietro" id="apart-inwest-pietro">
                                                <option value=""></option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                            </select>
                                        </div>
                                        <div class="input-wrapper box-anim d-flex align-items-start justify-content-start home-search__input--hidden">
                                            <label class="form-label lab-anim" for="apart-inwest-cechy">Cechy dodatkowe</label>
                                            <select name="apart-inwest-cechy" id="apart-inwest-cechy">
                                                <option value=""></option>
                                                <option value="Cecha 1">Cecha 1</option>
                                                <option value="Cecha 2">Cecha 2</option>
                                                <option value="Cecha 3">Cecha 3</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="home-search__btns">
                                        <button type="submit" class="custom-button">
                                            Szukaj
                                        </button>
                                    </div>
                                    <div class="w-100">
                          <span class="home-search__more d-flex align-items-center justify-content-start gap-10">
                            filtry dodatkowe
                            <svg xmlns="http://www.w3.org/2000/svg" width="10.069" height="5.61" viewBox="0 0 10.069 5.61">
                              <path id="arrow_select" data-name="arrow select" d="M.575,10.069,0,9.494,4.459,5.035,0,.575.575,0,5.61,5.035Z" transform="translate(10.069) rotate(90)"/>
                            </svg></span>
                                    </div>
                                </form>
                            </div>

                            <div class="tab-pane fade" id="lokale" role="tabpanel" aria-labelledby="lokale-tab">
                                <form action="" class="home-search__form d-flex flex-row flex-wrap align-items-start justify-content-between gap-30 ">
                                    <div class="d-flex flex-wrap gap-30 home-search__form-inputs">
                                        <div class="input-wrapper box-anim d-flex align-items-start justify-content-start">
                                            <label class="form-label lab-anim" for="lokale-inwestycja">Inwestycja</label>
                                            <select name="lokale-inwestycja" id="lokale-inwestycja">
                                                <option value=""></option>
                                                <option value="inwestycja 1">inwestycja 1</option>
                                                <option value="inwestycja 2">inwestycja 2</option>
                                                <option value="inwestycja 3">inwestycja 3</option>
                                            </select>
                                        </div>
                                        <div class="input-wrapper box-anim d-flex align-items-start justify-content-start">
                                            <label class="form-label lab-anim" for="lokale-powierzchnia">Powierzchnia</label>
                                            <select name="lokale-powierzchnia" id="lokale-powierzchnia">
                                                <option value=""></option>
                                                <option value="50m2">50m2</option>
                                                <option value="100m2">100m2</option>
                                                <option value="150m2">150m2</option>
                                            </select>
                                        </div>
                                        <div class="input-wrapper box-anim d-flex align-items-start justify-content-start">
                                            <label class="form-label lab-anim" for="lokale-pokoje">Liczba pokoi</label>
                                            <select name="lokale-pokoje" id="lokale-pokoje">
                                                <option value=""></option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                        </div>
                                        <div class="input-wrapper box-anim d-flex align-items-start justify-content-start">
                                            <label class="form-label lab-anim" for="lokale-pietro">Piętro</label>
                                            <select name="lokale-pietro" id="lokale-pietro">
                                                <option value=""></option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                            </select>
                                        </div>
                                        <div class="input-wrapper box-anim d-flex align-items-start justify-content-start home-search__input--hidden">
                                            <label class="form-label lab-anim" for="lokale-cechy">Cechy dodatkowe</label>
                                            <select name="lokale-cechy" id="lokale-cechy">
                                                <option value=""></option>
                                                <option value="Cecha 1">Cecha 1</option>
                                                <option value="Cecha 2">Cecha 2</option>
                                                <option value="Cecha 3">Cecha 3</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="home-search__btns">
                                        <button type="submit" class="custom-button">
                                            Szukaj
                                        </button>
                                    </div>
                                    <div class="w-100">
                          <span class="home-search__more d-flex align-items-center justify-content-start gap-10">
                            filtry dodatkowe
                            <svg xmlns="http://www.w3.org/2000/svg" width="10.069" height="5.61" viewBox="0 0 10.069 5.61">
                              <path id="arrow_select" data-name="arrow select" d="M.575,10.069,0,9.494,4.459,5.035,0,.575.575,0,5.61,5.035Z" transform="translate(10.069) rotate(90)"/>
                            </svg></span>
                                    </div>
                                </form>
                            </div>

                            <div class="tab-pane fade" id="dzialki" role="tabpanel" aria-labelledby="dzialki-tab">
                                <form action="" class="home-search__form d-flex flex-row flex-wrap align-items-start justify-content-between gap-30 ">
                                    <div class="d-flex flex-wrap gap-30 home-search__form-inputs">
                                        <div class="input-wrapper box-anim d-flex align-items-start justify-content-start">
                                            <label class="form-label lab-anim" for="dzialki-inwestycja">Inwestycja</label>
                                            <select name="dzialki-inwestycja" id="dzialki-inwestycja">
                                                <option value=""></option>
                                                <option value="inwestycja 1">inwestycja 1</option>
                                                <option value="inwestycja 2">inwestycja 2</option>
                                                <option value="inwestycja 3">inwestycja 3</option>
                                            </select>
                                        </div>
                                        <div class="input-wrapper box-anim d-flex align-items-start justify-content-start">
                                            <label class="form-label lab-anim" for="dzialki-powierzchnia">Powierzchnia</label>
                                            <select name="dzialki-powierzchnia" id="dzialki-powierzchnia">
                                                <option value=""></option>
                                                <option value="50m2">50m2</option>
                                                <option value="100m2">100m2</option>
                                                <option value="150m2">150m2</option>
                                            </select>
                                        </div>
                                        <div class="input-wrapper box-anim d-flex align-items-start justify-content-start">
                                            <label class="form-label lab-anim" for="dzialki-pokoje">Liczba pokoi</label>
                                            <select name="dzialki-pokoje" id="dzialki-pokoje">
                                                <option value=""></option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                        </div>
                                        <div class="input-wrapper box-anim d-flex align-items-start justify-content-start">
                                            <label class="form-label lab-anim" for="dzialki-pietro">Piętro</label>
                                            <select name="dzialki-pietro" id="dzialki-pietro">
                                                <option value=""></option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                            </select>
                                        </div>
                                        <div class="input-wrapper box-anim d-flex align-items-start justify-content-start home-search__input--hidden">
                                            <label class="form-label lab-anim" for="dzialki-cechy">Cechy dodatkowe</label>
                                            <select name="dzialki-cechy" id="dzialki-cechy">
                                                <option value=""></option>
                                                <option value="Cecha 1">Cecha 1</option>
                                                <option value="Cecha 2">Cecha 2</option>
                                                <option value="Cecha 3">Cecha 3</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="home-search__btns">
                                        <button type="submit" class="custom-button">
                                            Szukaj
                                        </button>
                                    </div>
                                    <div class="w-100">
                          <span class="home-search__more d-flex align-items-center justify-content-start gap-10">
                            filtry dodatkowe
                            <svg xmlns="http://www.w3.org/2000/svg" width="10.069" height="5.61" viewBox="0 0 10.069 5.61">
                              <path id="arrow_select" data-name="arrow select" d="M.575,10.069,0,9.494,4.459,5.035,0,.575.575,0,5.61,5.035Z" transform="translate(10.069) rotate(90)"/>
                            </svg></span>
                                    </div>
                                </form>
                            </div>

                            <div class="tab-pane fade" id="promocje" role="tabpanel" aria-labelledby="promocje-tab">
                                <form action="" class="home-search__form d-flex flex-row flex-wrap align-items-start justify-content-between gap-30 ">
                                    <div class="d-flex flex-wrap gap-30 home-search__form-inputs">
                                        <div class="input-wrapper box-anim d-flex align-items-start justify-content-start">
                                            <label class="form-label lab-anim" for="promocje-inwestycja">Inwestycja</label>
                                            <select name="promocje-inwestycja" id="promocje-inwestycja">
                                                <option value=""></option>
                                                <option value="inwestycja 1">inwestycja 1</option>
                                                <option value="inwestycja 2">inwestycja 2</option>
                                                <option value="inwestycja 3">inwestycja 3</option>
                                            </select>
                                        </div>
                                        <div class="input-wrapper box-anim d-flex align-items-start justify-content-start">
                                            <label class="form-label lab-anim" for="promocje-powierzchnia">Powierzchnia</label>
                                            <select name="promocje-powierzchnia" id="promocje-powierzchnia">
                                                <option value=""></option>
                                                <option value="50m2">50m2</option>
                                                <option value="100m2">100m2</option>
                                                <option value="150m2">150m2</option>
                                            </select>
                                        </div>
                                        <div class="input-wrapper box-anim d-flex align-items-start justify-content-start">
                                            <label class="form-label lab-anim" for="promocje-pokoje">Liczba pokoi</label>
                                            <select name="promocje-pokoje" id="promocje-pokoje">
                                                <option value=""></option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                        </div>
                                        <div class="input-wrapper box-anim d-flex align-items-start justify-content-start">
                                            <label class="form-label lab-anim" for="promocje-pietro">Piętro</label>
                                            <select name="promocje-pietro" id="promocje-pietro">
                                                <option value=""></option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                            </select>
                                        </div>
                                        <div class="input-wrapper box-anim d-flex align-items-start justify-content-start home-search__input--hidden">
                                            <label class="form-label lab-anim" for="promocje-cechy">Cechy dodatkowe</label>
                                            <select name="promocje-cechy" id="promocje-cechy">
                                                <option value=""></option>
                                                <option value="Cecha 1">Cecha 1</option>
                                                <option value="Cecha 2">Cecha 2</option>
                                                <option value="Cecha 3">Cecha 3</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="home-search__btns">
                                        <button type="submit" class="custom-button">
                                            Szukaj
                                        </button>
                                    </div>
                                    <div class="w-100 home-search__more-wrapper">
                          <span class="home-search__more d-flex align-items-center justify-content-start gap-10">
                            filtry dodatkowe
                            <svg xmlns="http://www.w3.org/2000/svg" width="10.069" height="5.61" viewBox="0 0 10.069 5.61">
                              <path id="arrow_select" data-name="arrow select" d="M.575,10.069,0,9.494,4.459,5.035,0,.575.575,0,5.61,5.035Z" transform="translate(10.069) rotate(90)"/>
                            </svg></span>
                                    </div>
                                </form>
                            </div>
                        </div>
                        @if($tabs)
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif

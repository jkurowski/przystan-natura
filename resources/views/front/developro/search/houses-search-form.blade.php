@props([
    'tabs' => 1,
    'investmentType' => [1,2,3],
    'searchType' => 1,
    'slug' => 1
])
@if($tabs)
    <div class="container-fluid position-relative px-0 page-search scroll-anim-blur">
        <div class="container ">
            <div class="row">
                <div class="col-12 d-flex flex-column align-items-center justify-content-center">
                    <h2 class="text-uppercase">Wyszukiwarka</h2>
                    <div class="page-search__wrapper w-100 mt-15 mt-md-25">
                        @endif
                        <form action="" class="page-search__form container-fluid">
                            <div class="row">
                                <div class="col-12 col-sm-4 col-lg">
                                    <label class="form-label mb-0" for="mieszkania-inwestycja">Inwestycja</label>
                                    <select name="investment" id="mieszkania-inwestycja">
                                        <option value="">Wszystkie</option>
                                        @foreach($investments as $i)
                                            @if(in_array($i->type, $investmentType))
                                                <option value="{{ ($slug) ? $i->slug : $i->id }}" @if(request()->input('investment') == $i->id) selected @endif>{{ $i->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-6 col-sm-4 col-lg mt-3 mt-sm-0">
                                    <label class="form-label mb-0" for="domy-powierzchnia">Powierzchnia</label>
                                    <select name="area" id="domy-powierzchnia">
                                        <option value="">Wszystkie</option>
                                        @foreach($area as $a)
                                            <option value="{{ $a->value }}" @if(request()->input('area') == $a->value) selected @endif>{{ $a->label }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-6 col-sm-4 col-lg mt-3 mt-sm-0">
                                    <label class="form-label mb-0" for="mieszkania-pokoje">Liczba pokoi</label>
                                    <select name="rooms" id="mieszkania-pokoje">
                                        <option value="">Wszystkie</option>
                                        @foreach($rooms as $r)
                                            <option value="{{ $r->value }}" @if(request()->input('area') == $r->value) selected @endif>{{ $r->label }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-6 col-sm-4 col-lg mt-3 mt-lg-0">
                                    <label class="form-label mb-0" for="mieszkania-ceny">Cena</label>
                                    <select name="price" id="mieszkania-ceny">
                                        <option value="">Wszystkie</option>
                                        @foreach($price as $p)
                                            <option value="{{ $p->value }}" @if(request()->input('area') == $p->value) selected @endif>{{ $p->label }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-6 col-sm-4 col-lg mt-3 mt-lg-0">
                                    <label class="form-label mb-0" for="mieszkania-pietro">Promocja</label>
                                    <select name="highlighted" id="mieszkania-pietro">
                                        <option value="">Wszystkie</option>
                                        <option value=0>Nie</option>
                                        <option value=1>Tak</option>
                                    </select>
                                </div>

                                <div class="col-12 col-sm-4 col-lg mt-0 mt-sm-3 mt-lg-0">
                                    <label class="form-label mb-1" for="">&nbsp;</label>
                                    <button type="submit" class="custom-button w-100">
                                        Szukaj
                                    </button>
                                </div>
                            </div>
                            <input type="hidden" name="type" value="{{ $searchType }}">
                        </form>
                        @if($tabs)
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif

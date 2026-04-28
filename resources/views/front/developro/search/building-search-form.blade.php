<!-- WYSZUKIWARKA -->
<div class="container-fluid p-0">
    <div class="row no-gutters">
        <div class="col-12 d-flex flex-column align-items-center justify-content-center">
            <div class="page-search__wrapper w-100">
                <form action="" class="page-search__form container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <h2>Wyszukiwarka</h2>
                        </div>
                        @isset($building)
                            @if($building->area_range)
                                <div class="col">
                                    <label class="form-label mb-0" for="domy-powierzchnia">Powierzchnia</label>
                                    <select name="area" id="domy-powierzchnia">
                                        <option value="">Wszystkie</option>
                                        {!! area2Select($building->area_range) !!}
                                    </select>
                                </div>
                            @endif
                        @endisset

                        @if($uniqueRooms)
                            <div class="col">
                                <label class="form-label mb-0" for="mieszkania-pokoje">Liczba pokoi</label>
                                <select name="rooms" id="mieszkania-pokoje">
                                    <option value="">Wszystkie</option>
                                    @foreach($uniqueRooms as $room)
                                        <option value="{{ $room }}" @if(request()->input('rooms') == $room) selected @endif>{{ $room }}</option>
                                    @endforeach
                                </select>
                            </div>
                        @endif

                        @isset($building)
                            @if($building->price_range)
                                <div class="col">
                                    <label class="form-label mb-0" for="mieszkania-ceny">Cena</label>
                                    <select name="price" id="mieszkania-ceny">
                                        <option value="">Wszystkie</option>
                                        {!! price2Select($building->price_range) !!}
                                    </select>
                                </div>
                            @endif
                        @endisset

                        <div class="col">
                            <label class="form-label mb-0" for="mieszkania-pietro">Promocja</label>
                            <select name="highlighted" id="mieszkania-pietro">
                                <option value="">Wszystkie</option>
                                <option value=0 @if(request()->input('highlighted') == 0) selected @endif>Nie</option>
                                <option value=1 @if(request()->input('highlighted') == 1) selected @endif>Tak</option>
                            </select>
                        </div>

                        <div class="col">
                            <label class="form-label mb-1" for="">&nbsp;</label>
                            <button type="submit" class="bttn bttn-icon w-100">
                                Szukaj <span><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none"><g clip-path="url(#sendIcon)"><path d="M4.9776 4.25018L4.97086 6.26437L9.35486 6.26437L3.55046 12.0688L4.96731 13.4856L10.7717 7.68122L10.7717 12.0652L12.7859 12.0585L12.777 4.25905L4.9776 4.25018Z"></path></g><defs><clipPath id="sendIcon"><rect width="12.0465" height="12.0465" transform="translate(0 8.51855) rotate(-45)"></rect></clipPath></defs></svg></span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

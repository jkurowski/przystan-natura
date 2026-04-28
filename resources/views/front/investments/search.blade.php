<section class="oferta-search search section-search">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-10 offset-lg-1">
                <form action="{{ route('developro.search.index') }}"
                    class="bg-secondary text-white rounded d-flex row-gap-0 flex-wrap flex-sm-nowrap search-form"
                    autocomplete="off">
                    <div class="row row-gap-3 align-items-end px-30 py-3 pb-30">
                        <div class="col-12">
                            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 row-cols-xxl-5 align-items-end">
                                <div class="col">
                                    <select name="city" id="city-select" class="form-select">
                                        <option value="">Miasto</option>
                                        @foreach($cities as $c)
                                            <option value="{{ $c->id }}" {{ request('city') == $c->id ? 'selected' : '' }}>{{ $c->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col">
                                    <select name="rooms" id="rooms" class="form-select">
                                        <option value="">Pokoje</option>
                                        <option value="1" {{ request('rooms') == 1 ? 'selected' : '' }}>1</option>
                                        <option value="2" {{ request('rooms') == 2 ? 'selected' : '' }}>2</option>
                                        <option value="3" {{ request('rooms') == 3 ? 'selected' : '' }}>3</option>
                                        <option value="4" {{ request('rooms') == 4 ? 'selected' : '' }}>4</option>
                                        <option value="5" {{ request('rooms') == 5 ? 'selected' : '' }}>5</option>
                                    </select>
                                </div>
                                <div class="col">
                                    <select name="area" id="area" class="form-select">
                                        <option value="">Powierzchnia</option>
                                        <option value="30-50" {{ request('area') == '30-50' ? 'selected' : '' }}>30-50 m²</option>
                                        <option value="51-70" {{ request('area') == '51-70' ? 'selected' : '' }}>51-70 m²</option>
                                        <option value="71-90" {{ request('area') == '71-90' ? 'selected' : '' }}>71-90 m²</option>
                                        <option value="91-110" {{ request('area') == '91-110' ? 'selected' : '' }}>91-110 m²</option>
                                        <option value="111-300" {{ request('area') == '111-300' ? 'selected' : '' }}>> 110 m²</option>
                                    </select>
                                </div>
                                <div class="col">
                                    <select name="advanced" id="advanced" class="form-select">
                                        <option value="">Zaawansowanie</option>
                                        <option value="1" {{ request('advanced') == 1 ? 'selected' : '' }}>Przedsprzedaż</option>
                                        <option value="2" {{ request('advanced') == 2 ? 'selected' : '' }}>Realizacja 20%</option>
                                        <option value="3" {{ request('advanced') == 3 ? 'selected' : '' }}>Realizacja 40%</option>
                                        <option value="4" {{ request('advanced') == 4 ? 'selected' : '' }}>Realizacja 60%</option>
                                        <option value="5" {{ request('advanced') == 5 ? 'selected' : '' }}>Realizacja 80%</option>
                                        <option value="6" {{ request('advanced') == 6 ? 'selected' : '' }}>Realizacja 100%</option>
                                        <option value="7" {{ request('advanced') == 7 ? 'selected' : '' }}>Gotowe do odbioru</option>
                                    </select>
                                </div>
                                <div class="col">
                                    <select name="invest" id="invest-select" class="form-select">
                                        <option value="">Inwestycja</option>
                                        @foreach($current_investment as $p)
                                            <option value="{{ $p->id }}" {{ request('invest') == $p->id ? 'selected' : '' }} data-city="{{ $p->city ? $p->city->id : '' }}">{{ $p->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col">
                                    <select name="status" id="status" class="form-select">
                                        <option value="" selected>Status</option>
                                        <option value="1" {{ request('status') == 1 ? 'selected' : '' }}>Dostępny</option>
                                        <option value="2" {{ request('status') == 2 ? 'selected' : '' }}>Rezerwacja</option>
                                        <option value="3" {{ request('status') == 3 ? 'selected' : '' }}>Sprzedane</option>
                                    </select>
                                </div>
                                <div class="col">
                                    <select name="kitchen" id="kitchen" class="form-select">
                                        <option value="" selected>Kuchnia/Aneks</option>
                                        <option value="1" {{ request('kitchen') == 1 ? 'selected' : '' }}>Kuchnia</option>
                                        <option value="2" {{ request('kitchen') == 2 ? 'selected' : '' }}>Aneks</option>
                                    </select>
                                </div>
                                <div class="col">
                                    <select name="garden" id="garden" class="form-select">
                                        <option value="" selected>Ogródek</option>
                                        <option value="1" {{ request('garden') == 1 ? 'selected' : '' }}>Tak</option>
                                        <option value="2" {{ request('garden') == 2 ? 'selected' : '' }}>Nie</option>
                                    </select>
                                </div>
                                <div class="col">
                                    <select name="price" id="price" class="form-select">
                                        <option value="" selected>Przedział cenowy</option>
                                        <option value="300000-450000" {{ request('price') == '300000-450000' ? 'selected' : '' }}>300-450 tyś. PLN</option>
                                        <option value="450000-600000" {{ request('price') == '450000-600000' ? 'selected' : '' }}>450-600 tyś. PLN</option>
                                        <option value="600000-800000" {{ request('price') == '600000-800000' ? 'selected' : '' }}>600-800 tyś. PLN</option>
                                        <option value="800000-999000" {{ request('price') == '800000-999000' ? 'selected' : '' }}>800-999 tyś. PLN</option>
                                        <option value="1000000-4000000" {{ request('price') == '1000000-4000000' ? 'selected' : '' }}>powyżej 1,0 mln PLN</option>
                                    </select>
                                </div>
                                <div class="col">
                                    <select name="type" id="apartment" class="form-select">
                                        <option value="1" {{ request('type') == 1 ? 'selected' : '' }}>Lokal mieszkalny</option>
                                        <option value="5" {{ request('type') == 5 ? 'selected' : '' }}>Lokal usługowy</option>
                                        <option value="2" {{ request('type') == 2 ? 'selected' : '' }}>Komórka lokatorska</option>
                                        <option value="3" {{ request('type') == 3 ? 'selected' : '' }}>Miejsce parkingowe</option>
                                        <option value="6" {{ request('type') == 6 ? 'selected' : '' }}>Miejsce park. + KL</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="flex-fill">
                        <button type="submit"
                            class="btn btn-primary w-100 h-100 fs-14 text-uppercase px-sm-4 d-flex align-items-center justify-content-center flex-sm-column gap-2 gap-sm-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="21.631" height="21.636"
                                viewBox="0 0 21.631 21.636">
                                <path id="Icon_ionic-ios-search" data-name="Icon ionic-ios-search"
                                    d="M25.877,24.563l-6.016-6.072a8.573,8.573,0,1,0-1.3,1.318l5.977,6.033a.926.926,0,0,0,1.307.034A.932.932,0,0,0,25.877,24.563ZM13.124,19.882A6.77,6.77,0,1,1,17.912,17.9,6.728,6.728,0,0,1,13.124,19.882Z"
                                    transform="translate(-4.5 -4.493)" fill="#fff" />
                            </svg>
                            <span>
                                Szukaj
                            </span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const citySelect = document.getElementById('city-select');
        const investSelect = document.getElementById('invest-select');

        //citySelect.value = "";
        //investSelect.value = "";

        citySelect.addEventListener('change', function() {

            console.log("citySelect.addEventListener.change");

            const selectedCity = citySelect.value;
            Array.from(investSelect.options).forEach(option => {
                if (selectedCity === '' || option.getAttribute('data-city') === selectedCity) {
                    option.style.display = 'block';
                } else {
                    option.style.display = 'none';
                }
            });
            if (selectedCity === '') {
                investSelect.value = '';
            }
        });
    });
</script>

<section class="single-investment-search search section-search">
  <div class="container">
      <div class="row justify-content-center">
          @if(isset($full))
          <div class="col-12 col-lg-10">
          @else
          <div class="col-12 col-lg-10 col-xl-8">
          @endif
              <form
                      action="{{ Route::is(['developro.plan', 'developro.page', 'developro.mockup', 'developro.investment.news', 'developro.investment.news.show', 'developro.show']) ? route('developro.plan', $investment->slug) . '#properties' : '#properties' }}"
                      class="bg-secondary text-white rounded d-flex row-gap-0 flex-wrap flex-sm-nowrap search-form"
                      autocomplete="off"
                      method="get"
              >
                <div class="row row-cols-1 row-cols-md-2 @if(!isset($is_floor)) row-cols-lg-4 @else  row-cols-lg-3 @endif row-gap-3 align-items-end px-30 py-3 w-md-100 pb-md-40 pb-20">
                    <p class="col-12 w-100 text-uppercase mb-0 d-none">Wyszukiwarka</p>
                    @if($investment->room_range)
                        @php $rooms = explode(',', $investment->room_range) @endphp
                    <div class="col">
                        <select name="rooms" id="rooms" class="form-select">
                            <option value="">Pokoje</option>
                            @foreach($rooms as $room)
                                <option value="{{ $room }}" @if(request()->input('rooms') == $room) selected @endif>{{ $room }}</option>
                            @endforeach
                        </select>
                    </div>
                    @endif

                    @if($investment->area_range)
                    <div class="col">
                        <select name="area" id="area" class="form-select">
                            <option value="">Powierzchnia</option>
                            {!! area2Select($investment->area_range) !!}
                        </select>
                    </div>
                    @endif

                    @if(!isset($is_floor))
                    <div class="col">
                        <select name="floor" id="floor" class="form-select">
                            <option value="">Piętro</option>
                            {!! floorToSelect($investment->floors) !!}
                        </select>
                    </div>
                    @endif

                    <div class="col">
                        <select name="status" id="status" class="form-select">
                            <option value="">Status</option>
                            <option value="1" @if(request()->input('status') == 1) selected @endif>Na sprzedaż</option>
                            <option value="2" @if(request()->input('status') == 2) selected @endif>Rezerwacja</option>
                            <option value="3" @if(request()->input('status') == 3) selected @endif>Sprzedane</option>
                        </select>
                    </div>
                </div>
                  <div class="flex-fill">
                      <button type="submit" class="btn btn-primary w-100 h-100 fs-14 text-uppercase px-sm-4 d-flex align-items-center justify-content-center flex-sm-column gap-2 gap-sm-1">
                          <svg xmlns="http://www.w3.org/2000/svg" width="21.631" height="21.636" viewBox="0 0 21.631 21.636">
                              <path id="Icon_ionic-ios-search" data-name="Icon ionic-ios-search" d="M25.877,24.563l-6.016-6.072a8.573,8.573,0,1,0-1.3,1.318l5.977,6.033a.926.926,0,0,0,1.307.034A.932.932,0,0,0,25.877,24.563ZM13.124,19.882A6.77,6.77,0,1,1,17.912,17.9,6.728,6.728,0,0,1,13.124,19.882Z" transform="translate(-4.5 -4.493)" fill="#fff" />
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
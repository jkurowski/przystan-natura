@props(['property'])

<div class="col-12 col-md-6 col-xl-4">
    <div class="mieszkania-list-item position-relative">
        @if($property->type == 1)
            @if($property->investment->type == 1 && $property->status <> 3)
                <a class="mieszkania-list-link z-2" href="{{ route('front.developro.building.floor.property', [
                    $property->investment->slug,
                    $property->building,
                    Str::slug($property->building->name),
                    $property->floor,
                    Str::slug($property->floor->name),
                    $property,
                    Str::slug($property->name),
                    number2RoomsName($property->rooms, true),
                    round(floatval($property->area), 2).'-m2'
                ]) }}"></a>
            @endif

            @if($property->investment->type == 2 && $property->status <> 3)
                <a class="mieszkania-list-link z-2" href="{{ route('front.developro.property', [
                    $property->investment->slug,
                    $property->floor,
                    Str::slug($property->floor->name),
                    $property,
                    Str::slug($property->name),
                    number2RoomsName($property->rooms, true),
                    round(floatval($property->area), 2).'-m2'
                ]) }}"></a>
            @endif

            @if($property->investment->type == 3 && $property->status <> 3)
                <a class="mieszkania-list-link z-2" href="{{ route('front.developro.house', [
                    $property->investment->slug,
                    $property,
                    Str::slug($property->name),
                    round(floatval($property->area), 2).'-m2'
                ]) }}"></a>
            @endif
        @endif

        <div class="mieszkania-list-flex d-flex flex-column align-items-center align-items-lg-start justify-content-start">
            @if($property->file)
                <picture class="m-auto mb-3">
                    @if($property->file_webp)
                        <source type="image/webp" srcset="{{ asset('/investment/property/list/webp/'.$property->file_webp) }}">
                    @endif
                    <source type="image/jpeg" srcset="{{ asset('/investment/property/list/'.$property->file) }}">
                    <img src="{{ asset('/investment/property/list/'.$property->file) }}" alt="{{$property->name}}" loading="lazy" decoding="async" class="mieszkania-list-img">
                </picture>
            @endif

            <h3 class="text-uppercase">{{ $property->name }}</h3>

            <div class="mieszkania-list-icn d-flex flex-column flex-lg-row align-items-center align-items-lg-start justify-content-center flex-wrap">

                {{-- Powierzchnia --}}
                <div class="mieszkania-list-icn-item">
                    <svg xmlns="http://www.w3.org/2000/svg" id="karta-01" width="28.924" height="28.924" viewBox="0 0 28.924 28.924"> <path id="Path_23" data-name="Path 23" d="M12.52,14.711a.724.724,0,0,0-1.022,0L6.946,19.262V15.223a.723.723,0,1,0-1.446,0v5.785a.7.7,0,0,0,.056.276.723.723,0,0,0,.392.392.745.745,0,0,0,.275.055h5.785a.723.723,0,1,0,0-1.446H7.969l4.55-4.55A.724.724,0,0,0,12.52,14.711Z" transform="translate(-1.161 2.854)"/> <path id="Path_24" data-name="Path 24" d="M21.284,5.555a.758.758,0,0,0-.276-.055H15.223a.723.723,0,0,0,0,1.446h4.039l-4.55,4.55a.724.724,0,0,0,0,1.022.716.716,0,0,0,.511.213.726.726,0,0,0,.512-.211l4.55-4.551v4.039a.723.723,0,0,0,1.446,0V6.223a.7.7,0,0,0-.056-.276A.725.725,0,0,0,21.284,5.555Z" transform="translate(2.854 -1.161)"/> <path id="Path_25" data-name="Path 25" d="M27.808,2.5H6.115A3.62,3.62,0,0,0,2.5,6.115V27.808a3.62,3.62,0,0,0,3.615,3.615H27.808a3.62,3.62,0,0,0,3.615-3.615V6.115A3.62,3.62,0,0,0,27.808,2.5Zm2.169,25.308a2.172,2.172,0,0,1-2.169,2.169H6.115a2.172,2.172,0,0,1-2.169-2.169V6.115A2.172,2.172,0,0,1,6.115,3.946H27.808a2.172,2.172,0,0,1,2.169,2.169Z" transform="translate(-2.5 -2.5)"/> </svg>
                    <span>{{ $property->area }} m<sup>2</sup></span>
                </div>

                @if($property->type == 1)
                <div class="mieszkania-list-icn-item">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30.74" height="30.739" viewBox="0 0 30.74 30.739"> <g id="karta-02" transform="translate(0.75 0.75)"> <path id="Path_28" data-name="Path 28" d="M25,13.208V2H43.031V21.005H37.67V31.239H33.284" transform="translate(-13.792 -2)" fill="none" stroke="#ff9500" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"/> <path id="Path_29" data-name="Path 29" d="M20.031,33.954l-2.924,2.924H2V13H13.208" transform="translate(-2 -7.64)" fill="none" stroke="#ff9500" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"/> <path id="Path_30" data-name="Path 30" d="M25,34v6.335" transform="translate(-13.792 -18.406)" fill="none" stroke="#ff9500" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"/> <path id="Path_31" data-name="Path 31" d="M25,56v2.924" transform="translate(-13.792 -29.685)" fill="none" stroke="#ff9500" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"/> <path id="Path_32" data-name="Path 32" d="M13.208,41H2" transform="translate(-2 -21.995)" fill="none" stroke="#ff9500" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"/> </g> </svg>
                    <span class="d-flex flex-row align-items-center justify-content-start gap-10">
                        Pokoje: <div class="mieszkania-list-box">{{ $property->rooms }}</div>
                    </span>
                </div>
                @endif

                @if($property->investment->type <> 3)
                <div class="mieszkania-list-icn-item">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32.611" height="29.366" viewBox="0 0 32.611 29.366"> <g id="karta-03" transform="translate(0.063 0.05)"> <path id="Path_26" data-name="Path 26" d="M31.74,54.112l-4.354-2.861a.517.517,0,1,0-.568.865l3.6,2.365-15.092,5.36L4.56,52.719l6.154-2.239a.517.517,0,0,0-.354-.972L3.233,52.1a.516.516,0,0,0-.316.638v3.075a.512.512,0,0,0,.031.171.516.516,0,0,0,.231.42l11.788,7.8a.507.507,0,0,0,.573-.006L31.78,58.433a.838.838,0,0,0,.384-.636V54.62A.518.518,0,0,0,31.74,54.112ZM3.953,53.558l10.784,7.135v2.118L3.953,55.675ZM15.772,60.78l15.357-5.454v2.239L15.772,63.019Z" transform="translate(-2.894 -35.024)" stroke="#000" stroke-width="0.1"/> <path id="Path_27" data-name="Path 27" d="M41.529,15.9a.517.517,0,0,0-.423-.508L29.435,7.667c-.009-.006-.02-.01-.029-.015a.493.493,0,0,0-.048-.025c-.016-.007-.032-.012-.048-.018a.447.447,0,0,0-.047-.013c-.017,0-.034-.006-.052-.008s-.031,0-.047,0-.036,0-.053,0l-.047,0a.5.5,0,0,0-.054.013l-.032.008L12.6,13.374a.517.517,0,0,0-.32.645V17.09a.5.5,0,0,0,.03.167.517.517,0,0,0,.231.425l11.786,7.8a.507.507,0,0,0,.574-.006l16.238-5.763a.845.845,0,0,0,.385-.637ZM29.078,8.672,39.785,15.76l-15.1,5.359L13.937,14Zm-15.76,6.162L24.1,21.97v2.118L13.318,16.951Zm11.816,7.224,15.359-5.451v2.239L25.134,24.3Z" transform="translate(-9.029 -7.583)" stroke="#000" stroke-width="0.1"/> </g> </svg>
                    <span class="d-flex flex-row align-items-center justify-content-start gap-10">
                        Piętro: <div class="mieszkania-list-box">{{ $property->floor->number ?? '-' }}</div>
                    </span>
                </div>
                @endif

                @if($property->status == 1)
                    {{-- Cena --}}
                    @if($property->price_brutto && !$property->highlighted)
                        <div class="mieszkania-list-icn-item">
                            <svg xmlns="http://www.w3.org/2000/svg" width="28.244" height="28.234" viewBox="0 0 28.244 28.234"> <g id="karta-04" transform="translate(0.1 0.1)"> <path id="path828" d="M28.937,1.584a.668.668,0,0,0-.461.2L25.612,4.652l-.863-.863a2.359,2.359,0,0,0-1.576-.76,5.917,5.917,0,0,0-.99.089l-4.671.649a6.153,6.153,0,0,0-3.7,2.008L2.324,16.482l-.014.013a2.567,2.567,0,0,0-.719,1.821,2.326,2.326,0,0,0,.755,1.831l-.038-.036L11.1,28.9l-.036-.038a2.326,2.326,0,0,0,1.831.755,2.567,2.567,0,0,0,1.821-.719l.013-.014.789-.847,3.143,1.171a2.53,2.53,0,0,0,1.979-.074,2.566,2.566,0,0,0,1.357-1.41l3.449-10.341a6.138,6.138,0,0,0,2-3.688l.649-4.671a5.918,5.918,0,0,0,.089-.99,2.359,2.359,0,0,0-.76-1.576L26.556,5.6,29.421,2.73a.667.667,0,0,0-.485-1.146Zm-5.8,2.779c.261.007.314.014.669.369l.863.863L23.137,7.129a1.972,1.972,0,0,0-.86-.2,2,2,0,1,0,2,2,1.973,1.973,0,0,0-.2-.86l1.533-1.533.863.863c.354.354.362.407.369.669a5.6,5.6,0,0,1-.076.77l-.649,4.671a4.512,4.512,0,0,1-1.662,2.973L13.762,27.961a1.358,1.358,0,0,1-.885.321,1.073,1.073,0,0,1-.8-.287q-.017-.02-.036-.038l-8.79-8.79-.038-.036a1.073,1.073,0,0,1-.287-.8,1.358,1.358,0,0,1,.321-.885h0L14.723,6.751A4.512,4.512,0,0,1,17.7,5.088l4.671-.649a5.606,5.606,0,0,1,.77-.076Zm-.861,3.9a.668.668,0,1,1-.667.668A.658.658,0,0,1,22.277,8.264ZM10.925,15.6a.667.667,0,0,0-.465,1.145l4,4.005a.668.668,0,1,0,.944-.946l-4.005-4a.667.667,0,0,0-.478-.2Zm-2,2a.667.667,0,0,0-.465,1.148l4.005,4a.667.667,0,1,0,.943-.944l-4-4a.667.667,0,0,0-.48-.2Zm14.331,2.135-2.512,7.532a1.359,1.359,0,0,1-.672.661,1.143,1.143,0,0,1-.848.072L16.5,26.981Z" transform="translate(-1.59 -1.584)" stroke="#707070" stroke-width="0.2"/></g></svg>
                            <span>
                                <b>@money($property->price_brutto)</b><br>
                                <i>
                                @money($property->price_brutto / (float) str_replace(',', '.', $property->area))
                                 zł/m<sup>2</sup>
                                </i>
                            </span>
                        </div>
                    @endif

                    {{-- Cena --}}
                    @if($property->promotion_price && $property->highlighted)
                        <div class="mieszkania-list-icn-item">
                            <svg xmlns="http://www.w3.org/2000/svg" width="28.244" height="28.234" viewBox="0 0 28.244 28.234" style="fill: #FF0000"> <g id="karta-04" transform="translate(0.1 0.1)"> <path id="path828" d="M28.937,1.584a.668.668,0,0,0-.461.2L25.612,4.652l-.863-.863a2.359,2.359,0,0,0-1.576-.76,5.917,5.917,0,0,0-.99.089l-4.671.649a6.153,6.153,0,0,0-3.7,2.008L2.324,16.482l-.014.013a2.567,2.567,0,0,0-.719,1.821,2.326,2.326,0,0,0,.755,1.831l-.038-.036L11.1,28.9l-.036-.038a2.326,2.326,0,0,0,1.831.755,2.567,2.567,0,0,0,1.821-.719l.013-.014.789-.847,3.143,1.171a2.53,2.53,0,0,0,1.979-.074,2.566,2.566,0,0,0,1.357-1.41l3.449-10.341a6.138,6.138,0,0,0,2-3.688l.649-4.671a5.918,5.918,0,0,0,.089-.99,2.359,2.359,0,0,0-.76-1.576L26.556,5.6,29.421,2.73a.667.667,0,0,0-.485-1.146Zm-5.8,2.779c.261.007.314.014.669.369l.863.863L23.137,7.129a1.972,1.972,0,0,0-.86-.2,2,2,0,1,0,2,2,1.973,1.973,0,0,0-.2-.86l1.533-1.533.863.863c.354.354.362.407.369.669a5.6,5.6,0,0,1-.076.77l-.649,4.671a4.512,4.512,0,0,1-1.662,2.973L13.762,27.961a1.358,1.358,0,0,1-.885.321,1.073,1.073,0,0,1-.8-.287q-.017-.02-.036-.038l-8.79-8.79-.038-.036a1.073,1.073,0,0,1-.287-.8,1.358,1.358,0,0,1,.321-.885h0L14.723,6.751A4.512,4.512,0,0,1,17.7,5.088l4.671-.649a5.606,5.606,0,0,1,.77-.076Zm-.861,3.9a.668.668,0,1,1-.667.668A.658.658,0,0,1,22.277,8.264ZM10.925,15.6a.667.667,0,0,0-.465,1.145l4,4.005a.668.668,0,1,0,.944-.946l-4.005-4a.667.667,0,0,0-.478-.2Zm-2,2a.667.667,0,0,0-.465,1.148l4.005,4a.667.667,0,1,0,.943-.944l-4-4a.667.667,0,0,0-.48-.2Zm14.331,2.135-2.512,7.532a1.359,1.359,0,0,1-.672.661,1.143,1.143,0,0,1-.848.072L16.5,26.981Z" transform="translate(-1.59 -1.584)" stroke="#FF0000" stroke-width="0.2"/></g></svg>
                            <span style="color: #FF0000">
                                <b>@money($property->promotion_price)</b><br>
                                <i>@money($property->promotion_price / $property->area) zł/m<sup>2</sup></i>
                            </span>
                        </div>
                    @endif
                @endif
            </div>

            {{-- Przyciski --}}
            <div class="mieszkania-list-btn">
                @if($property->type == 1)
                    @if($property->investment->type == 1 && $property->status <> 3)
                        <a class="custom-button z-2" href="{{ route('front.developro.building.floor.property', [
                            $property->investment->slug,
                            $property->building,
                            Str::slug($property->building->name),
                            $property->floor,
                            Str::slug($property->floor->name),
                            $property,
                            Str::slug($property->name),
                            number2RoomsName($property->rooms, true),
                            round(floatval($property->area), 2).'-m2'
                        ]) }}">Sprawdź</a>
                    @endif

                    @if($property->investment->type == 2 && $property->status <> 3)
                        <a class="custom-button z-2" href="{{ route('front.developro.property', [
                            $property->investment->slug,
                            $property->floor,
                            Str::slug($property->floor->name),
                            $property,
                            Str::slug($property->name),
                            number2RoomsName($property->rooms, true),
                            round(floatval($property->area), 2).'-m2'
                        ]) }}">Sprawdź</a>
                    @endif
                @endif

                {!! roomStatusBadge($property->status) !!}
            </div>
        </div>
    </div>
</div>

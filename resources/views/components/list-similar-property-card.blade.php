@props(['property'])

@php
    // link do mieszkania
    $url = null;
    if ($property->investment->type == 1) {
        $url = route('front.developro.building.floor.property', [
            $property->investment->slug,
            $property->building,
            Str::slug($property->building->name),
            $property->floor,
            Str::slug($property->floor->name),
            $property,
            Str::slug($property->name),
            number2RoomsName($property->rooms, true),
            round(floatval($property->area), 2).'-m2'
        ]);
    }
    if ($property->investment->type == 2) {
        $url = route('front.developro.property', [
            $property->investment->slug,
            $property->floor,
            Str::slug($property->floor->name),
            $property,
            Str::slug($property->name),
            number2RoomsName($property->rooms, true),
            round(floatval($property->area), 2).'-m2'
        ]);
    }
@endphp

<div class="karta-slider__item position-relative">
    <a href="{{ $url }}" class="karta-slider__streched-link z-2"></a>

    <div class="d-flex flex-column align-items-center align-items-lg-start justify-content-start p-15">
        @if($property->file)
            <picture class="m-auto mb-3">
                @if($property->file_webp)
                    <source type="image/webp" srcset="{{ asset('/investment/property/list/webp/'.$property->file_webp) }}">
                @endif
                <source type="image/jpeg" srcset="{{ asset('/investment/property/list/'.$property->file) }}">
                <img src="{{ asset('/investment/property/list/'.$property->file) }}" alt="{{$property->name}}" loading="lazy" decoding="async" class="mieszkania-list__img" style="max-width: 300px;max-height: 300px;">
            </picture>
        @endif
        <h3 class="text-uppercase mb-20 mt-15">{{ $property->name }}</h3>

        <div class="karta-slider__icn-items d-flex flex-column flex-lg-row align-items-center align-items-lg-start justify-content-center justify-content-lg-start flex-wrap">

            {{-- Powierzchnia --}}
            <div class="karta-slider__icn-item">
                <x-icons.icon-area />
                <span>{{ $property->area }} m<sup>2</sup></span>
            </div>

            {{-- Pokoje --}}
            <div class="karta-slider__icn-item">
                <x-icons.icon-room />
                <span class="d-flex flex-row align-items-center justify-content-start gap-10">
                    Pokoje: <div class="karta-slider__box">{{ $property->rooms }}</div>
                </span>
            </div>

            {{-- Piętro --}}
            <div class="karta-slider__icn-item">
                <x-icons.icon-floor />
                <span class="d-flex flex-row align-items-center justify-content-start gap-10">
                    Piętro: <div class="karta-slider__box">{{ $property->floor->number ?? '-' }}</div>
                </span>
            </div>

            {{-- Cena --}}
            @if($property->price_brutto)
                <div class="mieszkania-list__icn-item">
                    <x-icons.icon-price />
                    <span>
                        <b>@money($property->price_brutto)</b><br>
                        <i>@money($property->price_brutto / $property->area) zł/m<sup>2</sup></i>
                    </span>
                </div>
            @endif
        </div>

        <div class="d-flex flex-row align-items-center justify-content-start gap-10 gap-lg-40 mt-15 mt-lg-35">
            <a href="{{ $url }}" class="custom-button z-2">Sprawdź</a>
            @if($property->status == 1)
                <span class="karta-slider__status karta-slider__status--dostepne text-uppercase">Dostępne</span>
            @endif
            @if($property->status == 2)
                <span class="karta-slider__status karta-slider__status--rezerwacja text-uppercase">Rezerwacja</span>
            @endif
            @if($property->status == 3)
                <span class="karta-slider__status karta-slider__status--niedostepne text-uppercase">Niedostępne</span>
            @endif
        </div>
    </div>
</div>

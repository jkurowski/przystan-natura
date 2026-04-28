@props([
    'title' => '',
    'address' => '',
    'end_date' => null,
    'rooms' => null,
    'phone' => null,
    'link' => '#',
    'image' => null,
    'city' => null,
    'entry_content' => null,
])
<div class="home-slider-02__item position-relative">
    <a href="{{ $link ?? '#' }}" class="home-slider-02__streched-link z-2"></a>
    <div class="d-flex position-relative">
        <div class="home-slider-02__cats d-flex flex-row flex-wrap gap-10">
        @if($entry_content)
            <span class="home-slider-02__cat-item z-3 position-relative">{{ $entry_content }}</span>
        @endif
        @if($city)
            <span class="home-slider-02__cat-item z-3 position-relative">{{ $city }}</span>
        @endif
        </div>
        <div class="home-slider-wrapper_image">
            <img src="{{ $image ?? asset('img/temp/inwestycja.png') }}"
                 width="758"
                 height="425"
                 alt="{{ $title ?? 'Zdjęcie inwestycji' }}">
        </div>
    </div>
    <div class="d-flex flex-column align-items-start justify-content-start p-20">
        <h3 class="text-uppercase">{{ $title ?? '' }}</h3>
        <span class="mb-15">{{ $address ?? '' }}</span>
        @if($end_date)<span class="mb-15">Termin zakończenia: {{ $end_date ?? '' }}</span>@endif
        <span class="">Biuro sprzedaży </span>
        @if($phone)
            <a href="tel:{{ $phone ?? '' }}" class="home-slider-02__tel mb-20 z-2">{{ formatPhone($phone) ?? '' }}</a>
        @else
            <div class="home-slider-02__tel mb-2 z-2">&nbsp;</div>
        @endif
        <a href="{{ $link ?? '#' }}" class="custom-button z-2">Sprawdź</a>
    </div>
</div>

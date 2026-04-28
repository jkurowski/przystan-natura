@props([
    'title' => '',
    'description' => '',
    'link' => '#',
    'image' => null,
])

<div class="home-slider-03__item position-relative">
    @if(1 == 2)
    <a href="{{ $link }}" class="home-slider-03__streched-link z-2"></a>
    @endif
    <div class="d-flex position-relative cut-image">
        <img class="home-slider-03__img"
             src="{{ $image ?? asset('img/temp/inwestycja.png') }}"
             width="758" height="425"
             alt="{{ $title ?: 'Zdjęcie inwestycji' }}">
    </div>
    <div class="d-flex flex-column align-items-start justify-content-start p-20">
        <h3 class="text-uppercase mb-10">{{ $title }}</h3>
        <span class="mb-15">{{ $description }}</span>
        @if(1 == 2)
        <a href="{{ $link }}" class="custom-button z-2">Sprawdź</a>
        @endif
    </div>
</div>


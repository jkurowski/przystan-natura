<div class="p-4">
    <div id="relatedProperty">
        <h2 class="mb-3">{{ $property->name }}</h2>
        <ul class="mb-0 list-unstyled">
            @if($property->price_brutto)
            <li class="d-flex">Cena: <span class="ms-auto"><strong>@money($property->price_brutto)</strong></span></li>
            <li class="d-flex">Cena za m2 <span class="ms-auto"><strong>@money(($property->price_brutto / $property->area))</strong></span></li>
            @endif
            @if($property->building)
            <li class="d-flex">Budynek: <span class="ms-auto"><strong>{{ $property->building->name }}</strong></span></li>
            @endif
            @if($property->floor)
            <li class="d-flex">Piętro: <span class="ms-auto"><strong>{{ $property->floor->name }}</strong></span></li>
            @endif
            <li class="d-flex">Powierzchnia: <span class="ms-auto"><strong>{{ $property->area }} m<sup>2</sup></strong></span></li>
        </ul>
        @if($property->file)
            <div id="main-image" class="d-block">
                <a href="{{ asset('/investment/property/'.$property->file) }}" class="glightbox">
                    <picture>
                        <source type="image/webp" srcset="{{ asset('/investment/property/thumbs/webp/'.$property->file_webp) }}">
                        <source type="image/jpeg" srcset="{{ asset('/investment/property/thumbs/'.$property->file) }}">
                        <img src="{{ asset('/investment/property/thumbs/'.$property->file) }}" alt="{{$property->name}}" loading="eager">
                    </picture>
                </a>
            </div>
        @endif
    </div>
</div>

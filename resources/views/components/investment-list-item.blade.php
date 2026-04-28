@props([
    'investment',
    'properties'
])
@if($properties->count() > 0)
<div class="col-12 mb-5">
    <div class="investment-list-item">
        <div class="position-relative @if(!$investment->file_header) investment-list-noimage @endif investment-header">
            @if($investment->file_header)
                <img src="{{ asset('investment/header/'.$investment->file_header) }}" alt="{{ $investment->name }}" loading="eager" decoding="async" class="w-100 position-absolute bottom-0">
            @endif
            <div class="investment-list-desc">
                <h2 style="background: #f1f1f1;padding: 24px;">{{ $investment->name }}</h2>
            </div>
        </div>

        <div class="row mt-20">
        @foreach ($properties as $property)
            @if($investment->type == 1)
                @if(optional($property->building)->active == 1)
                        <x-list-property-card :property="$property" />
                @endif
            @else
                <x-list-property-card :property="$property" />
            @endif
        @endforeach
        </div>
    </div>
</div>
@endif

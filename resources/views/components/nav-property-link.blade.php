@props([
    'property' => null,
    'label' => '',
    'direction' => ''
])

@php
    $url = null;

    if ($property) {
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
    }
@endphp

@if($url)
    <a href="{{ $url }}" class="next-prev__link d-flex align-items-center justify-content-center gap-2">
        {{-- Ikona strzałki --}}
        @if($direction == 'prev')
        <svg xmlns="http://www.w3.org/2000/svg" width="5.61" height="10.069" viewBox="0 0 5.61 10.069"><path id="arrow_forward_ios_24dp_E3E3E3_FILL0_wght200_GRAD0_opsz24" d="M278.265-842.241l-.575-.575,4.459-4.459-4.459-4.459.575-.575,5.035,5.035Z" transform="translate(283.3 -842.241) rotate(180)"/></svg>
        @endif
        {{ $label }}
        @if($direction == 'next')
        <svg xmlns="http://www.w3.org/2000/svg" width="5.61" height="10.069" viewBox="0 0 5.61 10.069"><path id="arrow_forward2" d="M.575,0,0,.575,4.459,5.035,0,9.494l.575.575L5.61,5.035Z"/></svg>
        @endif
    </a>
@endif




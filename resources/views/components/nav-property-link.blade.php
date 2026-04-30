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

        if ($property->investment->type == 3) {
            $url = route('front.developro.house', [
                $property,
                Str::slug($property->name),
                round(floatval($property->area), 2).'-m2'
            ]);
        }
    }
@endphp

@if($url)
    <a href="{{ $url }}" class="bttn bttn-active">
        {{ $label }}
    </a>
@endif




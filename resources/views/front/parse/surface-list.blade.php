@props([
    'list' => [],
    'type' => 0
])
@if($list->count())
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Nazwa</th>
            @if($type == 1)
                <th>Powierzchnia</th>
                <th class="text-center">Cena m<sup>2</sup></th>
            @endif
            <th class="text-center">Cena</th>
            <th>Poziom</th>
            <th class="text-center">Status</th>
        </tr>
        </thead>
        <tbody>
        @foreach($list as $property)
            <tr>
                <td>{{ $property->name }}</td>
                @if($type == 1)
                    @if($property->highlighted && $property->promotion_price)
                        <td>{{ $property->area }} m²</td>
                        <td class="text-center">
                            <span style="color:#ff0000;display: block">@money($property->promotion_price)</span>
                            <s class="small" style="color:#646464">@money($property->price_brutto)</s>
                        </td>
                    @else
                        <td>{{ $property->area }} m²</td>
                        <td class="text-center">@money(($property->price_brutto / (float) str_replace(',', '.', $property->area)))</td>
                    @endif
                @endif
                <td class="text-center">
                    @isset($property->price_brutto)
                        @if($property->highlighted && $property->promotion_price)
                            <span style="color:#ff0000;display: block">@money($property->promotion_price)</span>
                            <s class="small" style="color:#646464">@money($property->price_brutto)</s>
                        @else
                            @money($property->price_brutto)
                        @endif
                    @endisset
                </td>
                <td>{{ $property->floor->name }}</td>
                <td class="text-center">{!! roomStatusBadge($property->status) !!}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@else
    <p>Brak dostępnych powierzchni w tej inwestycji.</p>
@endif

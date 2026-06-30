@props([
    'property' => null,
    'number' => null,
    'title' => null,
    'subtitle' => null,
    'area' => null,
    'house_area' => null,
    'rooms' => null,
    'status' => null,
    'floors' => null,
    'highlighted' => null,
    'price' => null,
    'promotion_price' => null,
    'condition' => null,
    'pdfUrl' => '',
    'historyUrl' => '',
    'statusClass' => 'status-1'
])

<div class="col-12 col-md-6 col-xl-4">
    <div class="house-item position-relative @if($highlighted && $promotion_price) house-promo @endif">
        @if($highlighted && $promotion_price)
            <span class="house-item-promo">PROMOCJA</span>
        @endif
        <div class="house-item-header">
            @if($number)
                <strong>{{ $number }}</strong>
            @endif
            <div>
                <h2>{!! $title !!}@if($subtitle)<span>{!! $subtitle !!}</span>@endif</h2>
            </div>
        </div>
        <ul class="mb-0 list-unstyled">
            @if($area)<li class="w-50 border-right">Działka <span>{{ $area }}</span></li>@endif
            @if($rooms)<li class="w-50">Pokoje <span>{{ $rooms }}</span></li>@endif
            @if($status)<li>Status {!! roomStatusBadge($status) !!}</li>@endif
            @if($house_area)<li>Pow. domu <span>{{ $house_area }}</span></li>@endif

            @if($price && $status == 1)
                @if($highlighted && $promotion_price)
                    <li>Promocja <span class="text-end">@money($promotion_price) <br><s style="font-size:13px;color:#838383;">@money($price)</s></span></li>
                @else
                    <li>Cena <span>@money($price)</span></li>
                @endif
            @else
                 <li>Cena </li>
            @endif

            @if($condition)<li>Stan <span>{{ $condition }}</span></li>@endif
        </ul>
        <div class="house-item-footer row">
            @if($pdfUrl)
            <div class="col-12 col-xxl-6">
                <a href="{{ $pdfUrl }}" class="bttn bttn-icon" target="_blank">
                    Pobierz pdf
                    <svg class="icon" viewBox="0 0 26 26">
                        <path d="M17.3375 10.1985L8.01328 19.5228L6.48145 17.9909L15.8046 8.66667H7.58753V6.5H19.5042V18.4167H17.3375V10.1985Z" fill="currentColor"/>
                    </svg>
                </a>
            </div>
            @endif
            <div class="col-12 col-xxl-6 mt-3 mt-xxl-0">
                <a href="{{ $historyUrl }}" class="bttn bttn-icon">
                    Zobacz dom
                    <svg class="icon" viewBox="0 0 26 26">
                        <path d="M17.3375 10.1985L8.01328 19.5228L6.48145 17.9909L15.8046 8.66667H7.58753V6.5H19.5042V18.4167H17.3375V10.1985Z" fill="currentColor"/>
                    </svg>
                </a>
            </div>
        </div>
    </div>
</div>

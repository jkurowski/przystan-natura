@props([
    'property' => null,
    'number' => null,
    'title' => null,
    'subtitle' => null,
    'area' => null,
    'rooms' => null,
    'status' => null,
    'floors' => null,
    'price' => null,
    'condition' => null,
    'pdfUrl' => '',
    'historyUrl' => '',
    'statusClass' => 'status-1'
])

<div class="col-12 col-md-6 col-xl-4">
    <div class="house-item">
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
            @if($floors)<li>Kondygnacje <span>{{ $floors }}</span></li>@endif
            @if($price)<li>Cena <span>{{ $price }}</span></li>@endif
            @if($condition)<li>Stan <span>{{ $condition }}</span></li>@endif
        </ul>
        <div class="house-item-footer row">
            <div class="col-12 col-xxl-6">
                <a href="{{ $pdfUrl }}" class="bttn bttn-icon">
                    Pobierz pdf
                    <svg class="icon" viewBox="0 0 26 26">
                        <path d="M17.3375 10.1985L8.01328 19.5228L6.48145 17.9909L15.8046 8.66667H7.58753V6.5H19.5042V18.4167H17.3375V10.1985Z" fill="currentColor"/>
                    </svg>
                </a>
            </div>
            <div class="col-12 col-xxl-6 mt-3 mt-xxl-0">
                <a href="{{ $historyUrl }}" class="bttn bttn-icon">
                    Pokaż historię
                    <svg class="icon" viewBox="0 0 26 26">
                        <path d="M17.3375 10.1985L8.01328 19.5228L6.48145 17.9909L15.8046 8.66667H7.58753V6.5H19.5042V18.4167H17.3375V10.1985Z" fill="currentColor"/>
                    </svg>
                </a>
            </div>
        </div>
    </div>
</div>

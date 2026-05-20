@props(['icon', 'title', 'text'])

<div {{ $attributes->merge(['class' => 'col-12 col-md-6 col-xl-3']) }}>
    <div class="feature-box">
        <img src="{{ asset('/images/icons/' . $icon) }}" alt="" class="icon" width="87" height="87" aria-hidden="true" loading="lazy" decoding="async">
        <h2 class="fw-bold">{{ $title }}</h2>
        <p>{{ $text }}</p>
    </div>
</div>

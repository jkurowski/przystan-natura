@props(['icon', 'title', 'text'])

<div {{ $attributes->merge(['class' => 'col-12 col-md-6 col-lg-3']) }}>
    <div class="feature-box">
        <img src="{{ asset('/images/icons/' . $icon) }}" alt="" class="icon">
        <h2 class="fw-bold">{{ $title }}</h2>
        <p>{{ $text }}</p>
    </div>
</div>

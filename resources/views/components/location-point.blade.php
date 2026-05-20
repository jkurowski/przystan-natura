@props(['time', 'title', 'icon'])
<div class="location-point">
    <span class="circle">
        <img src="{{ asset('images/icons/' . $icon) }}" alt="" width="50" height="50" aria-hidden="true" loading="lazy" decoding="async">
    </span>
    <div>
        <h3>{{ $time }}</h3>
        <p>{{ $title }}</p>
    </div>
</div>

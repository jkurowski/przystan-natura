@props(['title', 'subtitle', 'class' => ''])
<div class="section-text {{ $class }}">
    <span>{{ $subtitle }}</span>
    <h2>{!! $title !!}</h2>
    {{ $slot }}
</div>

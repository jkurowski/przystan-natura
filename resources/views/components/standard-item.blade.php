@props(['title', 'items' => []])
<div class="standard-item">
    <h3>{{ $title }}</h3>
    <ul>
        @foreach($items as $item)
            <li>{!! $item !!}</li>
        @endforeach
    </ul>
</div>

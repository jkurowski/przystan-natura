<ul class="mb-0 list-unstyled">
    @foreach($investment->pages as $p)
        <li>
        @if($p->type == 2)
            <a href="{{ route('front.developro.page', [$investment->slug, $p->slug]) }}" class="custom-link @if(($investment_page->id ?? null) == $p->id) active @endif">{{ $p->title }}</a>
        @else
            @if($p->url_target === '_domain')
                <a href="{{ url('i/' . $investment->slug . '/' . $p->url) }}"
                   class="custom-link">
                    {{ $p->title }}
                </a>
            @elseif($p->url_target === '_blank')
                <a href="{{ $p->url }}"
                   class="custom-link"
                   target="_blank">
                    {{ $p->title }}
                </a>
            @else
                <a href="{{ $p->url }}" class="custom-link">
                    {{ $p->title }}
                </a>
            @endif
        @endif
        </li>
    @endforeach
</ul>

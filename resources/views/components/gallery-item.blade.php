<div class="col-12 col-sm-6 col-lg-4 mb-4">
    <a href="{{ asset('uploads/gallery/images/' . $image->file) }}" class="swipebox">
        <picture>
            <source srcset="{{ asset('uploads/gallery/images/thumbs/webp/' . $image->file_webp) }}" type="image/webp">
            <img src="{{ asset('uploads/gallery/images/thumbs/' . $image->file) }}" alt="{{ $image->name ?? '' }}">
        </picture>
    </a>
</div>

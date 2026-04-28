<div class="apartament-slider__slider-for scroll-anim-blur">
    @foreach($images as $image)
        <div class="apartament-slider__item-for">
            <a href="{{ asset('uploads/gallery/images/'.$image->file) }}" rel="swipebox">
                <img src="{{ asset('uploads/gallery/images/'.$image->file) }}" alt="" class="w-100">
            </a>
        </div>
    @endforeach
</div>

<div class="apartament-slider__slider-nav mt-15 mt-sm-30">
    @foreach($images as $image)
        <div class="apartament-slider__item-nav">
            <img src="{{ asset('uploads/gallery/images/thumbs/'.$image->file) }}" alt="">
        </div>
    @endforeach
</div>

<?php

use App\Models\Image;

if (! function_exists('carouselWithThumbs')) {
    function carouselWithThumbs(int $gallery)
    {
        $images = Image::where('gallery_id', $gallery)->get();
        return view('components.carousel-with-thumbs', compact('images'))->render();
    }
}

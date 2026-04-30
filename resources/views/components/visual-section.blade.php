@props(['imageTop', 'imageBottom', 'title'])
<section class="pb-0">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <img src="{{ asset('images/' . $imageTop) }}" alt="" class="w-100 big-borders" width="1620" height="825">
            </div>
        </div>
        <div class="row row-under">
            <div class="col-12 col-sm-5 d-flex justify-content-center offset-0 offset-sm-1">
                <div class="big-stroke">
                    <img src="{{ asset('images/' . $imageBottom) }}" alt="" class="big-borders" width="590" height="500">
                </div>
            </div>
            <div class="col-12 col-sm-6">
                <div class="d-flex justify-content-center justify-content-sm-end align-items-end h-100">
                    <h3>{!! $title !!}</h3>
                </div>
            </div>
        </div>
    </div>
</section>

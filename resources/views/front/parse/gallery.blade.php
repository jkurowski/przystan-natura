@if($list->count() > 0)
    <div id="photos-list" class="container">
        <div class="row justify-content-center">
            @foreach ($list as $p)
                <div class="col-6 col-md-4 col-xl-3 p-0">
                    <div class="col-gallery-thumb m-2">
                        <a href="{{asset('uploads/gallery/images/'.$p->file) }}" data-lightbox="roadtrip" rel="gallery-{{$p->gallery_id}}" title="">
                            <picture>
                                <source type="image/jpeg" srcset="{{asset('uploads/gallery/images/thumbs/'.$p->file) }}">
                                <img src="{{asset('uploads/gallery/images/thumbs/'.$p->file) }}" alt="{{ $p->name }}" class="img-fluid">
                            </picture>
                            <div></div>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endif

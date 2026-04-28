@extends('layouts.page')

@section('meta_title', $page->title)
@isset($page->meta_title) @section('seo_title', $page->meta_title) @endisset
@isset($page->meta_description) @section('seo_description', $page->meta_description) @endisset
@section('content')
    <main class="with-bigger-section-spacing">

        @include('layouts.partials.page-header', ['h1' => $page->title, 'desc' => $page->title_text, 'header' => 'img/kontakt_bg.webp'])
        <section id="clipboard" class="p-0">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div id="clipboardmessage"></div>
                    </div>
                </div>

                <div class="row mt-30">
                    <div class="col-12">
                        <div id="layout-container" class="list-layout">
                            @if($properties->count() > 0)
                                @foreach($properties as $p)
                                    <x-property-list-item :p="$p"></x-property-list-item>
                                @endforeach
                            @else
                                <p class="text-center pt-5 pb-5"><b>Twoja lista jest pusta</b></p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @if($properties->count() > 0)
        <div id="kontakt" class="mt-30">
            @include('layouts.partials.clipboard', ['pageTitle' => $page->title, 'back' => true])
        </div>
        @endif
    </main>
@endsection
@push('scripts')
    <script type="text/javascript">
        const buttons = document.querySelectorAll('#addToFav');
        buttons.forEach(function(button) {
            button.addEventListener('click', function() {
                removeProperty(button.getAttribute('data-id'))
            });
        });

        function removeProperty(property_id) {
            const xhr = new XMLHttpRequest();
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            xhr.open('DELETE', '/pl/clipboard');
            xhr.setRequestHeader('Content-Type', 'application/json;charset=UTF-8');
            xhr.setRequestHeader('X-CSRF-TOKEN', csrfToken);
            const data = { id: property_id };
            const jsonData = JSON.stringify(data);
            xhr.send(jsonData);

            xhr.addEventListener('load', function() {
                if (xhr.status === 200) {
                    const response = JSON.parse(xhr.responseText);
                    const message = response.message;
                    document.querySelector('#clipboardmessage').innerHTML = message;
                    const item = document.querySelector(`[data-room="${property_id}"]`);
                    if (!item) {
                        return;
                    }

                    item.animate(
                        [{ opacity: 1 }, { opacity: 0 }],
                        { duration: 500 }
                    ).onfinish = () => {
                        item.remove();

                        const layoutContainer = document.querySelector('#layout-container');
                        if (layoutContainer) {
                            const remainingItems = layoutContainer.querySelectorAll('.invest-card-list').length;
                            if (remainingItems === 0) {
                                const clipboardWidget = document.querySelector('#clipboardwidget');
                                if (clipboardWidget) {
                                    clipboardWidget.remove();
                                }
                            }
                        }
                    };
                }
            });
        }
    </script>
@endpush

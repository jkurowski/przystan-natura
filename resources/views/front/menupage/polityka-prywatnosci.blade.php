@extends('layouts.page', ['body_class' => 'position-relative', 'body_id' => 'page-pp'])

@section('meta_title', $page->title ?? 'Polityka prywatności')
@section('seo_title',$page->meta_title ?? '')
@section('seo_description', $page->meta_description ?? '')
@section('seo_robots', $page->meta_robots ?? '')


@section('pagehader')
    <x-page-header title="Polityka prywatności" :breadcrumbs="[['label' => 'Polityka prywatności', 'url' => '#']]" />
@endsection

@section('content')
    <main>

        <section class="pb-0">
            <!-- Brakuje mapy -->
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        {!! parse_text($page->content) !!}
                    </div>
                </div>
            </div>
        </section>

    </main>
@endsection
@push('scripts')
    <script type="text/javascript">

    </script>
@endpush

@extends('admin.layout')
@section('meta_title', '- '.$cardTitle)

@section('content')
    @if(Route::is('admin.charity.edit'))
        <form method="POST" action="{{route('admin.charity.update', $entry->id)}}" enctype="multipart/form-data">
            @method('PUT')
            @else
                <form method="POST" action="{{route('admin.charity.store')}}" enctype="multipart/form-data">
                    @endif
                    @csrf
                    <div class="container">
                        <div class="card-head container">
                            <div class="row">
                                <div class="col-12 pl-0">
                                    <h4 class="page-title"><i class="fe-book-open"></i><a href="{{route('admin.charity.index')}}" class="p-0">Blog</a><span class="d-inline-flex me-2 ms-2">/</span>{{ $cardTitle }}</h4>
                                </div>
                            </div>
                        </div>

                        <div class="card mt-3">
                            @include('form-elements.back-route-button')

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <div class="card-body control-col12">
                                <div class="row w-100 form-group">
                                    @include('form-elements.html-input-text', ['label' => 'Tytuł wpisu', 'name' => 'title', 'value' => $entry->title, 'required' => 1])
                                </div>
                                <div class="row w-100 form-group">
                                    @include('form-elements.html-input-text', ['label' => 'Krótki opis', 'name' => 'intro', 'value' => $entry->intro, 'required' => 0])
                                </div>
                                <div class="row w-100 form-group">
                                    @include('form-elements.html-input-text', ['label' => 'Atrybut ALT zdjęcia', 'name' => 'image_alt', 'value' => $entry->image_alt])
                                </div>
                                <div class="row w-100 form-group">
                                    @include('form-elements.html-input-file', [
                                        'label' => 'Zdjęcie',
                                        'sublabel' => '(wymiary: '.config('images.charity.big_width').'px / '.config('images.charity.big_height').'px)',
                                        'name' => 'image',
                                        'file' => $entry->image,
                                        'file_preview' => config('images.charity.preview_file_path')
                                    ])
                                </div>
                            </div>
                        </div>
                    </div>
                    @include('form-elements.submit', ['name' => 'submit', 'value' => 'Zapisz'])
                </form>
        @endsection

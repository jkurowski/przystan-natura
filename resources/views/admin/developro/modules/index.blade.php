@extends('admin.layout')

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-head container-fluid">
                <div class="row">
                    <div class="col-6 pl-0">
                        <h4 class="page-title"><i class="fe-home" aria-hidden="true"></i>Moduły</h4>
                    </div>
                </div>
            </div>
        </div>
        @include('admin.developro.investment_shared.main_menu')
        <div class="card mt-3">
            <div class="table-overflow">
                @livewire('developro-modules-list')
            </div>
        </div>
    </div>
@endsection

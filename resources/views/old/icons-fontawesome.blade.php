@extends('layouts.master')

@section('title') @lang('translation.Font_awesome') @endsection

@section('content')

    @component('common-components.breadcrumb')
        @slot('title') Font awesome @endslot
        @slot('li_1') Icons @endslot
        @slot('li_2') Font awesome @endslot
    @endcomponent

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Solid</h4>
                    <p class="card-title-desc mb-2">Use <code>&lt;i class="fas fa-ad"&gt;&lt;/i&gt;</code> <span
                            class="badge badge-success">v 5.13.0</span>.</p>
                    <div class="row icon-demo-content" id="solid">
                    </div>
                </div> <!-- end card-body -->
            </div> <!-- end card -->
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Regular</h4>
                    <p class="card-title-desc mb-2">Use <code>&lt;i class="far fa-address-book"&gt;&lt;/i&gt;</code> <span
                            class="badge badge-success">v 5.13.0</span>.</p>
                    <div class="row icon-demo-content" id="regular">
                    </div>
                </div> <!-- end card-body -->
            </div> <!-- end card -->
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Brands</h4>
                    <p class="card-title-desc mb-2">Use <code>&lt;i class="fab fa-500px"&gt;&lt;/i&gt;</code> <span
                            class="badge badge-success">v 5.13.0</span>.</p>
                    <div class="row icon-demo-content" id="brand">
                    </div>
                </div> <!-- end card-body -->
            </div> <!-- end card -->
        </div> <!-- end col -->
    </div> <!-- end row -->

@endsection

@section('script')

    <!-- form mask -->
    <script src="{{ URL::asset('assets/js/pages/fontawesome.init.js') }}"></script>

@endsection
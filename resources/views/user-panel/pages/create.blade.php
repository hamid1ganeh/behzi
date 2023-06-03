@extends('user-panel.master')

@section('css')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css">
    <link href="{{ asset('cp/assets/plugins/custom/cropper/cropper.bundle.rtl.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css">
    <link rel="stylesheet" href="{{ asset("css/select2.min.css") }}">
    <link href="{{ asset('cp/assets/plugins/custom/cropper/cropper.bundle.rtl.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('js')
    <script src="https://api.mapbox.com/mapbox-gl-js/v1.4.1/mapbox-gl.js"></script>
    <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"></script>
    <script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>
    <script src='https://api.mapbox.com/mapbox.js/plugins/leaflet-fullscreen/v1.0.1/Leaflet.fullscreen.min.js'></script>
    <script src="{{ asset('cp/assets/plugins/custom/cropper/cropper.bundle.js') }}"></script>
@endsection

@section('content')
    <div class="d-flex flex-column-fluid min-height" style="margin-top: -5px">
        <!--begin::Container-->

            <div class="col-12 px-0 row mx-0">
                <div class="col-12 px-lg-7">
                    <div class="row justify-content-center" style="margin-top: -28px">
                        <div class="col-lg-10 px-0">
                            <!--begin::Card-->
                            <div class="col-12 text-center row mx-0 px-0 px-md-3 pb-md-5 pb-3">
                                <stepper validate1-route="{{ route('userPanel.pages.step1Validate') }}"
                                         validate2-route="{{ route('userPanel.pages.step2Validate') }}"
                                         validate3-route="{{ route('userPanel.pages.step3Validate') }}"
                                         work-items="{{ $workItems->toJson() }}"
                                         search-work-items-route="{{ route('front.ajax.workItemSearch') }}"
                                         provinces="{{ $cities->toJson() }}"
                                         search-city-route="{{ route('front.ajax.citySearch') }}"
                                ></stepper>
                            </div>
                            <!--end::Card-->
                        </div>
                    </div>
                </div>
            </div>

        <!--end::Container-->
    </div>
@endsection

@extends('user-panel.master')

@section('css')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css">
    <link href="{{ asset('cp/assets/plugins/custom/cropper/cropper.bundle.rtl.css') }}" rel="stylesheet" type="text/css" />
    <style>
        .leaflet-container .leaflet-popup-content-wrapper .leaflet-popup-content{
            font-family: 'Vazir' !important;
        }
        .fa-chevron-down.chevron-1{
            font-size: 10px;
            margin-top: 3px;
            animation: chevron-flash 1s infinite;
        }
        #map{
            width: 90%; height: 200px; background: #eee; border: 2px solid #aaa;margin: 0 auto;
            border-radius: 8px;
        }
        [data-toggle]{
            cursor: pointer;
        }
        .fa-chevron-down.chevron-2{
            font-size: 15px;
            margin-top: -5px;
            animation: chevron-flash 1s infinite;
            animation-delay: 0.5s;
        }
        @keyframes chevron-flash {
            0%{
                color:lightgrey;
            }
            50%{
                color: #36b1fa;
            }
            100%{
                color:lightgrey;
            }
        }
    </style>
@endsection

@section('js')
    <script src="{{ asset('cp/assets/plugins/custom/cropper/cropper.bundle.js') }}"></script>
    <script src="https://api.mapbox.com/mapbox-gl-js/v1.4.1/mapbox-gl.js"></script>
    <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"></script>
    <script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>
{{--    <script src="{{ asset('cp/assets/js/page-edit.js') }}"></script>--}}
@endsection

@section('content')
    <div class="d-flex flex-column-fluid min-height">
        <!--begin::Container-->
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!--begin::Card-->
                    <div class="card card-custom gutter-b">
                        <div class="card-header">
                            <h3 class="card-title">بروزرسانی</h3>
                        </div>
                        <!--begin::Form-->
                            <div class="card-body" id="accordion">
                                <div class="row border rounded bg-light-o-85 mb-5">
                                    <div class="btn-light w-100 rounded p-4" id="headingOne" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        اطلاعات جامع
                                        <span class="float-right text-center mr-md-5">
                                            <i class="fa fa-chevron-down chevron-1"></i><br>
                                            <i class="fa fa-chevron-down chevron-2"></i>
                                        </span>
                                    </div>
                                    <basic-data name="{{ $page->name }}"
                                                work-items="{{ $workItems->toJson() }}"
                                                category="{{ $page->work_item_id }}"
                                                update-route="{{ route('userPanel.pages.basic_data_update',$page) }}"
                                                description="{{ $page->description }}"/>
                                </div>

                                <div class="row border rounded bg-light-o-85 mb-5">
                                    <div class="btn-light w-100 rounded p-4" id="heading2" data-toggle="collapse" data-target="#collapse2" aria-expanded="false" aria-controls="collapse2">
                                        تصویر صفحه
                                        <span class="float-right text-center mr-md-5">
                                            <i class="fa fa-chevron-down chevron-1"></i><br>
                                            <i class="fa fa-chevron-down chevron-2"></i>
                                        </span>
                                    </div>
                                    <image-data
                                            update-route="{{ route('userPanel.pages.image_data_update',$page) }}"
                                            image="{{  url('storage/images/' . ($page->image->name['original'] ?? '')) }}"/>
                                </div>
                                <div class="row border rounded bg-light-o-85 mb-5">
                                    <address-data lat="{{ $page->address->lat }}"
                                                  lng="{{ $page->address->lng }}"
                                                  city="{{ $page->address->city_id }}"
                                                  provinces="{{ $cities->toJson() }}"
                                                  update-route="{{ route('userPanel.pages.address_data_update',$page) }}"
                                                  address="{{ $page->address->address }}"/>
                                </div>
                            </div>
                        <div class="col-12 d-flex justify-content-center mb-5">
                            <a href="{{ route('userPanel.pages.show',$page->id) }}" class="col-12 col-md-3 btn btn-light border">بازگشت به صفحه قبل</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!--end::Container-->
    </div>
@endsection
@extends('admin-panel.master')


@section('content')

    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!--begin::Card-->
                    <div class="card card-custom gutter-b example example-compact">
                        <div class="card-header">
                            <h3 class="card-title">بروزرسانی</h3>
                            {{--                            <div class="card-toolbar">--}}
                            {{--                                <a href="{{ route('adminPanel.pages.workTimePage',$page->id) }}"--}}
                            {{--                                   class="btn-sm btn-primary font-size-sm m-1">مدیریت ساعت کاری</a>--}}
                            {{--                                <a href="{{ route('userPanel.pages.connections.create',$page->id) }}"--}}
                            {{--                                   class="btn-sm btn-dark font-size-sm">مدیریت راه های ارتباطی</a>--}}
                            {{--                            </div>--}}
                        </div>
                        <!--begin::Form-->
                        <form class="form" action="{{ route('adminPanel.pages.update',$page->id) }}" method="POST"
                              enctype="multipart/form-data">
                            {{ csrf_field() }}
                            {{ method_field('PATCH') }}
                            <div class="card-body">
                                <div class="form-group row">
                                    <div class="col-lg-6">
                                        <label for="name">نام صفحه :</label>
                                        <input name="name" type="text" class="form-control"
                                               value="{{ old('name') ?? $page->name }}"
                                               placeholder="لطفا نام صفحه را وارد کنید"/>
                                        <span class="form-text text-danger"> {{ $errors->first('name') }} </span>
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="work_item_id">دسته بندی</label>
                                        <div>
                                            <select class="form-control selectpicker" name="work_item_id"
                                                    id="work_item_id" data-size="7"
                                                    data-live-search="true">
                                                @foreach($workItems as $workItem)
                                                    <option value="{{ $workItem->id }}" {{ $workItem->id == ( old('work_item_id') ?? $page->work_item_id ) ? 'selected' : '' }}>{{ $workItem->name }}
                                                        ({{ $workItem->work_category->name }})
                                                    </option>
                                                @endforeach
                                            </select>
                                            <span class="form-text text-danger"> {{ $errors->first('work_item_id') }} </span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-lg-6">
                                        <label for="level">سطح</label>
                                        <div>
                                            <select class="form-control selectpicker" name="level" id="level"
                                                    data-size="7"
                                                    data-live-search="true">
                                                <option value="{{ \App\Enums\PageLevel::Simple }}" {{ \App\Enums\PageLevel::Simple == ( old('level') ?? $page->level ) ? 'selected' : '' }}>
                                                    {{ trans('statuses/page_level.' . \App\Enums\PageLevel::Simple) }}
                                                </option>
                                                <option value="{{ \App\Enums\PageLevel::VIP }}" {{ \App\Enums\PageLevel::VIP == ( old('level') ?? $page->level ) ? 'selected' : '' }}>
                                                    {{ trans('statuses/page_level.' . \App\Enums\PageLevel::VIP) }}
                                                </option>
                                            </select>
                                            <span class="form-text text-danger"> {{ $errors->first('level') }} </span>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <label for="status">وضعیت</label>
                                        <div>
                                            <select class="form-control selectpicker" name="status" id="status"
                                                    data-size="7"
                                                    data-live-search="true">
                                                <option value="">انتخاب ...</option>
                                                <option value="{{ \App\Enums\PageStatus::Active }}" {{ \App\Enums\PageStatus::Active == ( old('status') ?? $page->status ) ? 'selected' : '' }}>
                                                    {{ trans('statuses/page.' . \App\Enums\PageStatus::Active) }}
                                                </option>
                                                <option value="{{ \App\Enums\PageStatus::Inactive }}" {{ \App\Enums\PageStatus::Inactive == ( old('status') ?? $page->status ) ? 'selected' : '' }}>
                                                    {{ trans('statuses/page.' . \App\Enums\PageStatus::Inactive) }}
                                                </option>
                                                <option value="{{ \App\Enums\PageStatus::Pending }}" {{ \App\Enums\PageStatus::Pending == ( old('status') ?? $page->status ) ? 'selected' : '' }}>
                                                    {{ trans('statuses/page.' . \App\Enums\PageStatus::Pending) }}
                                                </option>
                                                <option value="{{ \App\Enums\PageStatus::Ban }}" {{ \App\Enums\PageStatus::Ban == ( old('status') ?? $page->status ) ? 'selected' : '' }}>
                                                    {{ trans('statuses/page.' . \App\Enums\PageStatus::Ban) }}
                                                </option>
                                            </select>
                                            <span class="form-text text-danger"> {{ $errors->first('status') }} </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-6">
                                        <label for="description">توضیحات</label>
                                        <textarea name="description" id="description" type="text" style="min-height: 150px"
                                                  class="form-control">{{ old('description') ?? $page->getDescription() }}</textarea>
                                        <span class="form-text text-danger">{{ $errors->first('description') }}</span>
                                    </div>
                                    <div class="col-lg-6 d-flex justify-content-center">
                                        <div class="float-right text-center">
                                            <span style="cursor:pointer" data-lity data-lity-target="{{ $page->getPageImage('original') }}">
                                                <i class="fa fa-expand mb-2 text-primary"></i><br>
                                                <small>بزرگنمایی</small>
                                            </span>
                                        </div>
                                        <div class="col-md-10">
                                            <cropper-single cropped-width="720" cropped-height="360" current-image="{{ $page->getPageImage() }}"></cropper-single>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-6">
                                        <label for="start_date">تاریخ شروع</label>
                                        <input id="start_date" type="text" class="form-control"
                                               value="{{ $page->start_date->format('Y-m-d') }}"/>
                                        <input type="hidden" name="start_date" id="start_date_alt">
                                        <span class="form-text text-danger">{{ $errors->first('start_date') }}</span>
                                    </div>

                                    <div class="col-lg-6">
                                        <label for="expire_date">تاریخ پایان</label>
                                        <input id="expire_date" type="text" class="form-control"
                                               value="{{ $page->expire_date->format('Y-m-d') }}"/>
                                        <input type="hidden" name="expire_date" id="expire_date_alt">
                                        <span class="form-text text-danger">{{ $errors->first('expire_date') }}</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-4">
                                        <label for="code">کد</label>
                                        <input name="code" id="code" type="text" class="form-control"
                                               value="{{ old('code') ?? $page->code }}"/>
                                        <span class="form-text text-danger">{{ $errors->first('code') }}</span>
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="city_id">استان و شهر</label>
                                        <div>
                                            <select class="form-control selectpicker" name="city_id" id="city_id"
                                                    data-size="7"
                                                    data-live-search="true">
                                                <option value="">انتخاب ...</option>
                                                @foreach($provinces as $province)
                                                    @foreach($province->cities as $city)
                                                        <option value="{{ $city->id }}" {{ $city->id == ( old('city_id') ?? $page->address->city_id ) ? 'selected' : '' }}>{{ $province->name }}
                                                            ({{ $city->name }})
                                                        </option>
                                                    @endforeach
                                                @endforeach
                                            </select>
                                            <span class="form-text text-danger"> {{ $errors->first('city_id') }} </span>
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <label for="user_id">ایجاد کننده</label>
                                        <div>
                                            <select class="form-control selectpicker" name="user_id" id="user_id"
                                                    data-size="7"
                                                    data-live-search="true">
                                                <option value="">انتخاب ...</option>
                                                @foreach($users as $user)
                                                    <option value="{{ $user->id }}" {{ $user->id == (old('user_id') ?? $page->getOwner()->id) ? 'selected' : '' }}>{{ $user->name }}
                                                        ({{ $user->mobile }})
                                                    </option>
                                                @endforeach
                                            </select>
                                            <span class="form-text text-danger"> {{ $errors->first('user_id') }} </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-12">
                                        <label for="address">آدرس</label>
                                        <input name="address" id="address" type="text" class="form-control"
                                               value="{{ old('address') ?? $page->address->address }}"
                                               placeholder="آدرس را وارد کنید."/>
                                        <span class="form-text text-danger">{{ $errors->first('address') }}</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-6">
                                        <label for="lat">عرض جغرافیایی</label>
                                        <input name="lat" id="lat" type="text" class="form-control"
                                               value="{{ old('lat') ?? $page->address->lat }}"
                                               placeholder="عرض جغرافیایی را وارد یا از نقشه انتخاب کنید."/>
                                        <span class="form-text text-danger">{{ $errors->first('lat') }}</span>
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="lng">طول جغرافیایی</label>
                                        <input name="lng" id="lng" type="text"
                                               value="{{ old('lng') ?? $page->address->lng }}" class="form-control"
                                               placeholder="طول جغرافیایی را وارد یا از نقشه انتخاب کنید."/>
                                        <span class="form-text text-danger">{{ $errors->first('lng') }}</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <div id="map"
                                             style="width: 90%; height: 400px; background: #eee; border: 2px solid #aaa;margin: 0 auto"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-lg-12 text-right">
                                        <button type="submit" class="btn btn-primary mr-2">ذخیره</button>
                                        <button type="reset" class="btn btn-secondary">انصراف</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!--end::Form-->
                    </div>
                    <!--end::Card-->
                    <!--end::Card-->
                </div>
            </div>
        </div>
        <!--end::Container-->
    </div>
@endsection


@section('css')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css">
    <link href="{{ asset('cp/assets/plugins/custom/cropper/cropper.bundle.rtl.css') }}" rel="stylesheet"
          type="text/css"/>
    <link rel="stylesheet" href="https://unpkg.com/persian-datepicker@1.2.0/dist/css/persian-datepicker.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lity/2.4.1/lity.min.css" integrity="sha512-UiVP2uTd2EwFRqPM4IzVXuSFAzw+Vo84jxICHVbOA1VZFUyr4a6giD9O3uvGPFIuB2p3iTnfDVLnkdY7D/SJJQ==" crossorigin="anonymous" />
@endsection

@section('script')
    <script src="https://unpkg.com/persian-date@1.1.0/dist/persian-date.min.js"></script>
    <script src="https://unpkg.com/persian-datepicker@1.2.0/dist/js/persian-datepicker.min.js"></script>
    <script src="{{ asset('cp/assets/plugins/custom/cropper/cropper.bundle.js') }}"></script>
    <script src="https://api.mapbox.com/mapbox-gl-js/v1.4.1/mapbox-gl.js"></script>
    <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"></script>
    <script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>
    <script>
        let lat = "{{ $page->address->lat }}";
        let lng = "{{ $page->address->lng }}";
        let myMap = L.map('map', {zoomControl: true}).setView([lat, lng], 14);
        myMap.setMaxBounds([[84.67351256610522, -174.0234375], [-58.995311187950925, 223.2421875]]);
        let osmLayer = new L.TileLayer('https://{s}.tile.osm.org/{z}/{x}/{y}.png').addTo(myMap);
        let marker = L.marker([lat, lng]).addTo(myMap);

        marker.bindPopup("موقعیت مکانی ثبت شده").openPopup();

        let popup = L.popup();


        function onMapClick(e) {
            myMap.removeLayer(marker);
            console.log(getFeaturesInView());
            if (getFeaturesInView() == 0) {
                let marker = L.marker(e.latlng, {
                    draggable: true,
                    title: "Resource location",
                    alt: "Resource Location",
                    riseOnHover: true
                }).addTo(myMap)
                // .bindPopup(e.latlng.toString()).openPopup();
                    .bindPopup("موقعیت مکانی جدید").openPopup();
                // Update marker on changing it's position
                marker.on("dragend", function (ev) {

                    let chagedPos = ev.target.getLatLng();
                    this.bindPopup(chagedPos.toString()).openPopup();
                    this.bindPopup("موقعیت مکانی جدید").openPopup();
                    getFeaturesInView();
                });
                getFeaturesInView();
            }
        }

        myMap.on('click', onMapClick);

        function getFeaturesInView() {
            let features = [];
            myMap.eachLayer(function (layer) {
                if (layer instanceof L.Marker) {
                    if (myMap.getBounds().contains(layer.getLatLng())) {
                        console.log(layer.getLatLng().lat);
                        setLatLngValue(layer.getLatLng().lat, layer.getLatLng().lng)
                        console.log(layer);
                        features.push(layer.feature);
                    }
                }
            });
            return features.length;
        }

        function setLatLngValue(lat, lng) {
            $("#lat").val(lat);
            $("#lng").val(lng);
        }

        $(document).ready(function () {
            $('#start_date').persianDatepicker({
                initialValueType: 'gregorian',
                observer: true,
                format: 'YYYY/MM/DD',
                altField: '#start_date_alt',
                formatPersian: false
            });
            $('#expire_date').persianDatepicker({
                initialValueType: 'gregorian',
                observer: true,
                format: 'YYYY/MM/DD',
                altField: '#expire_date_alt',
                formatPersian: false
            });
        });

    </script>
@endsection
@extends('admin-panel.master')

@section('content')
    <div class="col-12 mx-0 row">
        <div class="col-md-6 px-0 row mx-0">
            <div class="col-md-6">
                <!--begin::Stats Widget 30-->
                <div class="card card-custom bg-info card-stretch gutter-b">
                    <!--begin::Body-->
                    <div class="card-body">
                        <span class="svg-icon svg-icon-3x svg-icon-white">
                            <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Group.svg-->
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                    <path d="M18,14 C16.3431458,14 15,12.6568542 15,11 C15,9.34314575 16.3431458,8 18,8 C19.6568542,8 21,9.34314575 21,11 C21,12.6568542 19.6568542,14 18,14 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
                                    <path d="M17.6011961,15.0006174 C21.0077043,15.0378534 23.7891749,16.7601418 23.9984937,20.4 C24.0069246,20.5466056 23.9984937,21 23.4559499,21 L19.6,21 C19.6,18.7490654 18.8562935,16.6718327 17.6011961,15.0006174 Z M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" fill="#000000" fill-rule="nonzero"></path>
                                </g>
                            </svg>
                            <!--end::Svg Icon-->
                        </span>
                        <span class="card-title font-weight-bolder text-white font-size-h2 mb-0 mt-6 d-block">2,044</span>
                        <span class="font-weight-bold text-white font-size-sm">کاربر فعال</span>
                    </div>
                    <!--end::Body-->
                </div>
                <!--end::Stats Widget 30-->
            </div>
            <div class="col-md-6">
                <!--begin::Stats Widget 29-->
                <div class="card card-custom bgi-no-repeat card-stretch gutter-b" style="background-position: right top; background-size: 30% auto; background-image: url({{ asset('cp/assets/media/svg/shapes/abstract-1.svg') }})">
                    <!--begin::Body-->
                    <div class="card-body">
                        <span class="svg-icon svg-icon-3x svg-icon-info">
                            <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Mail-opened.svg-->
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24"></rect>
                                    <rect fill="#000000" x="4" y="4" width="7" height="7" rx="1.5"></rect>
                                    <path d="M5.5,13 L9.5,13 C10.3284271,13 11,13.6715729 11,14.5 L11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,14.5 C4,13.6715729 4.67157288,13 5.5,13 Z M14.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,9.5 C20,10.3284271 19.3284271,11 18.5,11 L14.5,11 C13.6715729,11 13,10.3284271 13,9.5 L13,5.5 C13,4.67157288 13.6715729,4 14.5,4 Z M14.5,13 L18.5,13 C19.3284271,13 20,13.6715729 20,14.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L14.5,20 C13.6715729,20 13,19.3284271 13,18.5 L13,14.5 C13,13.6715729 13.6715729,13 14.5,13 Z" fill="#000000" opacity="0.3"></path>
                                </g>
                            </svg>
                            <!--end::Svg Icon-->
                        </span>
                        <span class="card-title font-weight-bolder text-dark-75 font-size-h2 mb-0 mt-6 d-block">5,209</span>
                        <span class="font-weight-bold text-muted font-size-sm">صفحه ایجاد شده</span>
                    </div>
                    <!--end::Body-->
                </div>
                <!--end::Stats Widget 29-->
            </div>
        </div>
        <div class="col-md-6">
            <div class="card card-custom bgi-no-repeat gutter-b"
                 style="height: 170px; background-color: #1B283F; background-position: 0 calc(100% + 0.5rem); background-size: 80% auto; background-image: url({{ asset('cp/assets/media/svg/patterns/rhone-2.svg') }})">
                <!--begin::Body-->
                <div class="card-body">
                    <h2 class="text-white font-weight-bolder">سامانه مدیریتی بهزی</h2>
                    <p class="text-muted font-size-h5 mt-5 mb-10" style="text-shadow: 0 0 3px #1b283f">توسط <b class="text-white">5</b> ادمین در حال مدیریت</p>
                </div>
                <!--end::Body-->
            </div>
        </div>
        <div class="col-12 mx-0 row px-0">
            <div class="col-md-4">
                <!--begin::Stats Widget 15-->
                <a href="#" class="card card-custom bg-success bg-hover-state-success card-stretch gutter-b">
                    <!--begin::Body-->
                    <div class="card-body py-3">
                        <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                            <!--begin::Svg Icon | path:assets/media/svg/icons/Media/Equalizer.svg-->
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24"></rect>
                                    <rect fill="#000000" x="4" y="4" width="7" height="7" rx="1.5"></rect>
                                    <path d="M5.5,13 L9.5,13 C10.3284271,13 11,13.6715729 11,14.5 L11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,14.5 C4,13.6715729 4.67157288,13 5.5,13 Z M14.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,9.5 C20,10.3284271 19.3284271,11 18.5,11 L14.5,11 C13.6715729,11 13,10.3284271 13,9.5 L13,5.5 C13,4.67157288 13.6715729,4 14.5,4 Z M14.5,13 L18.5,13 C19.3284271,13 20,13.6715729 20,14.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L14.5,20 C13.6715729,20 13,19.3284271 13,18.5 L13,14.5 C13,13.6715729 13.6715729,13 14.5,13 Z" fill="#000000" opacity="0.3"></path>
                                </g>
                            </svg>
                            <!--end::Svg Icon-->
                        </span>
                        <div class="text-inverse-success font-weight-bolder font-size-h4 mb-2 mt-5">صفحه تایید نشده</div>
                        <div class="font-weight-bold text-inverse-success font-size-h6">652</div>
                    </div>
                    <!--end::Body-->
                </a>
                <!--end::Stats Widget 15-->
            </div>
            <div class="col-md-4">
                <!--begin::Stats Widget 14-->
                <a href="#" class="card card-custom bg-primary bg-hover-state-primary card-stretch gutter-b">
                    <!--begin::Body-->
                    <div class="card-body py-3">
                        <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                            <!--begin::Svg Icon | path:assets/media/svg/icons/Layout/Layout-4-blocks.svg-->
                            <svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <!-- Generator: Sketch 50.2 (55047) - http://www.bohemiancoding.com/sketch -->
                                <title>Stockholm-icons / Files / Pictures1</title>
                                <desc>Created with Sketch.</desc>
                                <defs></defs>
                                <g id="Stockholm-icons-/-Files-/-Pictures1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect id="bound" x="0" y="0" width="24" height="24"></rect>
                                    <path d="M3.5,21 L20.5,21 C21.3284271,21 22,20.3284271 22,19.5 L22,8.5 C22,7.67157288 21.3284271,7 20.5,7 L10,7 L7.43933983,4.43933983 C7.15803526,4.15803526 6.77650439,4 6.37867966,4 L3.5,4 C2.67157288,4 2,4.67157288 2,5.5 L2,19.5 C2,20.3284271 2.67157288,21 3.5,21 Z" id="Combined-Shape" fill="#000000" opacity="0.3"></path>
                                    <polygon id="Path" fill="#000000" opacity="0.3" points="4 19 10 11 16 19"></polygon>
                                    <polygon id="Path-Copy" fill="#000000" points="11 19 15 14 19 19"></polygon>
                                    <path d="M18,12 C18.8284271,12 19.5,11.3284271 19.5,10.5 C19.5,9.67157288 18.8284271,9 18,9 C17.1715729,9 16.5,9.67157288 16.5,10.5 C16.5,11.3284271 17.1715729,12 18,12 Z" id="Path" fill="#000000" opacity="0.3"></path>
                                </g>
                            </svg>
                            <!--end::Svg Icon-->
                        </span>
                        <div class="text-inverse-primary font-weight-bolder font-size-h5 mb-2 mt-5">گالری تایید نشده</div>
                        <div class="font-weight-bold text-inverse-primary font-size-h6">956</div>
                    </div>
                    <!--end::Body-->
                </a>
                <!--end::Stats Widget 14-->
            </div>
            <div class="col-md-4">
                <!--begin::Stats Widget 13-->
                <a href="#" class="card card-custom bg-warning bg-hover-state-warning card-stretch gutter-b">
                    <!--begin::Body-->
                    <div class="card-body py-3">
                        <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                            <!--begin::Svg Icon | path:assets/media/svg/icons/Shopping/Cart3.svg-->
                            <svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <!-- Generator: Sketch 50.2 (55047) - http://www.bohemiancoding.com/sketch -->
                                <title>Stockholm-icons / Home / Picture</title>
                                <desc>Created with Sketch.</desc>
                                <defs></defs>
                                <g id="Stockholm-icons-/-Home-/-Picture" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <polygon id="Shape" points="0 0 24 0 24 24 0 24"></polygon>
                                    <rect id="Rectangle-25" fill="#000000" opacity="0.3" x="2" y="4" width="20" height="16" rx="2"></rect>
                                    <polygon id="Path" fill="#000000" opacity="0.3" points="4 20 10.5 11 17 20"></polygon>
                                    <polygon id="Path-Copy" fill="#000000" points="11 20 15.5 14 20 20"></polygon>
                                    <circle id="Oval-76" fill="#000000" opacity="0.3" cx="18.5" cy="8.5" r="1.5"></circle>
                                </g>
                            </svg>
                            <!--end::Svg Icon-->
                        </span>
                        <div class="text-inverse-danger font-weight-bolder font-size-h5 mb-2 mt-5">تصاویر تایید نشده</div>
                        <div class="font-weight-bold text-inverse-danger font-size-h6">1203</div>
                    </div>
                    <!--end::Body-->
                </a>
                <!--end::Stats Widget 13-->
            </div>

        </div>
        <div class="col-12 mx-0 px-0 row">
            <div class="col-xl-3">
                <!--begin::Stats Widget 1-->
                <div class="card card-custom bgi-no-repeat card-stretch gutter-b" style="background-position: right top; background-size: 30% auto; background-image: url({{ asset('cp/assets/media/svg/shapes/abstract-4.svg') }})">
                    <!--begin::Body-->
                    <div class="card-body">
                        <a href="#" class="card-title font-weight-bold text-muted text-hover-primary font-size-h3">دسته‌بندی‌ها</a>
                        <div class="font-weight-bold font-size-h5 text-success mt-4">6 مورد</div>
                    </div>
                    <!--end::Body-->
                </div>
                <!--end::Stats Widget 1-->
            </div>
            <div class="col-xl-3">
                <!--begin::Stats Widget 2-->
                <div class="card card-custom bgi-no-repeat card-stretch gutter-b" style="background-position: right top; background-size: 30% auto; background-image: url({{ asset('cp/assets/media/svg/shapes/abstract-2.svg') }})">
                    <!--begin::Body-->
                    <div class="card-body">
                        <a href="#" class="card-title font-weight-bold text-muted text-hover-primary font-size-h3">دپارتمان‌ها</a>
                        <div class="font-weight-bold font-size-h5 text-success mt-4">8 مورد</div>
                    </div>
                    <!--end::Body-->
                </div>
                <!--end::Stats Widget 2-->
            </div>
            <div class="col-xl-3">
                <!--begin::Stats Widget 3-->
                <div class="card card-custom bgi-no-repeat card-stretch gutter-b" style="background-position: right top; background-size: 30% auto; background-image: url({{ asset('cp/assets/media/svg/shapes/abstract-1.svg') }})">
                    <!--begin::body-->
                    <div class="card-body">
                        <a href="#" class="card-title font-weight-bold text-muted text-hover-primary font-size-h3">گالری‌ها</a>
                        <div class="font-weight-bold font-size-h5 text-success mt-4">4012</div>
                    </div>
                    <!--end::Body-->
                </div>
                <!--end::Stats Widget 3-->
            </div>
            <div class="col-xl-3">
                <!--begin::Stats Widget 4-->
                <div class="card card-custom bgi-no-repeat card-stretch gutter-b" style="background-position: right top; background-size: 30% auto; background-image: url({{ asset('cp/assets/media/svg/shapes/abstract-3.svg') }})">
                    <!--begin::body-->
                    <div class="card-body">
                        <a href="#" class="card-title font-weight-bold text-muted text-hover-primary font-size-h3">تصاویر</a>
                        <div class="font-weight-bold font-size-h5 text-success mt-4">9541</div>
                    </div>
                    <!--end::Body-->
                </div>
                <!--end::Stats Widget 3-->
            </div>
        </div>
    </div>
@stop
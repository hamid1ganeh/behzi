@extends('user-panel.master')
@section('content')
    <!--Dear shahin it begins from here ::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            <!--begin::Profile Personal Information-->
            <div class="d-flex flex-row">

                <!--::Content-->
                <div class="flex-row-fluid">
                    <!--begin::Card-->
                    <div class="card card-custom card-stretch">
                        <!--begin::Header-->
                        <div class="card-header py-3">
                            <div class="card-title align-items-start flex-column">
                                <h3 class="card-label font-weight-bolder text-dark">صندوق پیام های دریافتی</h3>
                                <span class="text-muted font-weight-bold font-size-sm mt-1">پیام های مخطبین وب سایت آسانسور آریا</span>
                            </div>
                            <div class="card-toolbar">
                                <span class="svg-icon svg-icon-3x svg-icon-warning">
                                    <svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                        <!-- Generator: Sketch 50.2 (55047) - http://www.bohemiancoding.com/sketch -->
                                        <defs></defs>
                                        <g id="Stockholm-icons-/-Communication-/-Mail-opened" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect id="bound" x="0" y="0" width="24" height="24"></rect>
                                            <path d="M6,2 L18,2 C18.5522847,2 19,2.44771525 19,3 L19,12 C19,12.5522847 18.5522847,13 18,13 L6,13 C5.44771525,13 5,12.5522847 5,12 L5,3 C5,2.44771525 5.44771525,2 6,2 Z M7.5,5 C7.22385763,5 7,5.22385763 7,5.5 C7,5.77614237 7.22385763,6 7.5,6 L13.5,6 C13.7761424,6 14,5.77614237 14,5.5 C14,5.22385763 13.7761424,5 13.5,5 L7.5,5 Z M7.5,7 C7.22385763,7 7,7.22385763 7,7.5 C7,7.77614237 7.22385763,8 7.5,8 L10.5,8 C10.7761424,8 11,7.77614237 11,7.5 C11,7.22385763 10.7761424,7 10.5,7 L7.5,7 Z" id="Combined-Shape" fill="#000000" opacity="0.3"></path>
                                            <path d="M3.79274528,6.57253826 L12,12.5 L20.2072547,6.57253826 C20.4311176,6.4108595 20.7436609,6.46126971 20.9053396,6.68513259 C20.9668779,6.77033951 21,6.87277228 21,6.97787787 L21,17 C21,18.1045695 20.1045695,19 19,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,6.97787787 C3,6.70173549 3.22385763,6.47787787 3.5,6.47787787 C3.60510559,6.47787787 3.70753836,6.51099993 3.79274528,6.57253826 Z" id="Combined-Shape" fill="#000000"></path>
                                        </g>
                                    </svg>
                                </span>
{{--                                            <button type="reset" class="btn btn-success mr-2">ذخیره تغییرات</button>--}}
                            </div>
                        </div>
                        <!--end::Header-->
                        <div class="container">
                            <div class="col-12 row mx-0 mb-5">
                                @foreach($messages as $message)
                                    <a href="{{ route('userPanel.pages.messages.show',[$page,$message]) }}" class="w-100 mt-4">
                                        <div class="col-12 rounded row mx-0 p-3 bg-dark-o-40 bg-hover-dark-o-1 text-dark">
                                            <div class="col-lg-3 my-auto text-truncate" style="white-space: nowrap">
                                                <i class="fa fa-envelope text-dark mx-3"></i><span>{{ $message->email }}</span>
                                            </div>
                                            <div class="col-lg text-truncate text-dark-75 my-auto">
                                                <span>{{ $message->text }}</span>
                                            </div>
                                            <div class="col-lg-2 text-success text-right">
                                                <div>{{ $message->getJalaliCreatedAtDate() }}</div>
                                            </div>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                            <div class="d-flex flex-wrap py-2 mr-3 justify-content-center">
                                <a href="#" class="btn btn-icon btn-sm btn-light mr-2 my-1">
                                    <i class="ki ki-bold-double-arrow-next icon-xs"></i>
                                </a>
                                <a href="#" class="btn btn-icon btn-sm btn-light mr-2 my-1">
                                    <i class="ki ki-bold-arrow-next icon-xs"></i>
                                </a>
                                <a href="#" class="btn btn-icon btn-sm border-0 btn-light mr-2 my-1">1</a>
                                <a href="#" class="btn btn-icon btn-sm border-0 btn-light btn-hover-success active mr-2 my-1">2</a>
                                <a href="#" class="btn btn-icon btn-sm border-0 btn-light mr-2 my-1">3</a>
                                <a href="#" class="btn btn-icon btn-sm btn-light mr-2 my-1">
                                    <i class="ki ki-bold-arrow-back icon-xs"></i>
                                </a>
                                <a href="#" class="btn btn-icon btn-sm btn-light mr-2 my-1">
                                    <i class="ki ki-bold-double-arrow-back icon-xs"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end::Content-->
            </div>
            <!--end::Information-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->
@stop

@extends('user-panel.master')
@section('content')
    {{--<ul class="sticky-toolbar nav flex-column pl-2 pr-2 pt-3 pb-3 mt-4">

        <li class="nav-item mb-2" id="kt_demo_panel_toggle" data-toggle="tooltip" title="" data-placement="right" data-original-title="پروفایل">
            <a class="btn btn-icon btn-bg-light btn-text-success btn-hover-success" href="#">
                <i class="flaticon2-calendar-3 font-size-h2"></i>
            </a>
        </li>
        <li class="nav-item mb-2" data-toggle="tooltip" title="" data-placement="left" data-original-title="نظرات">
            <a class="btn btn-icon btn-bg-light btn-text-primary btn-hover-primary" href="">
                <i class="flaticon2-chat-1 font-size-h2"></i>
            </a>
        </li>
        <li class="nav-item mb-2" data-toggle="tooltip" title="" data-placement="right" data-original-title="صندوق پیام ها">
            <a class="btn btn-icon btn-bg-light btn-text-warning btn-hover-warning" href="">
                <i class="flaticon2-email font-size-h2"></i>
            </a>
        </li>
        <li class="nav-item" id="kt_sticky_toolbar_chat_toggler" data-toggle="tooltip" title="" data-placement="left" data-original-title="خروج">
            <a class="btn btn-icon btn-bg-light btn-text-danger btn-hover-danger" href="#" data-toggle="modal" data-target="#kt_chat_modal">
                <i class="fa fa-power-off font-size-h3"></i>
            </a>
        </li>

    </ul>--}}

    <div class="d-flex flex-column-fluid">
        <div class="container">
            <div class="d-flex flex-row">
                <div class="flex-row-fluid ml-lg-8">
                    <div class="card card-custom card-stretch">
                        <div class="card-header py-3">
                            <div class="card-title align-items-start flex-column">
                                <h3 class="card-label font-weight-bolder text-dark my-auto"><a href="mail:">
                                        <i class="fa fa-envelope mr-3"></i><span class="text-dark text-hover-primary">{{ $message->email }}</span>
                                    </a></h3>
                                <span class="text-muted font-weight-bold font-size-sm mt-1"><a href="tell:">
                                        <i class="fa fa-phone-square mr-3"></i><span>{{ $message->mobile }}</span>
                                    </a></span>
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
                            </div>
                        </div>
                        <div class="container">
                            <div class="col-12 row mx-0 mb-5 px-0 px-md-3">
                                <div class="col-12 mt-4 rounded row mx-0 p-3 bg-warning-o-30 text-dark small">
                                    <span><i class="fa fa-info-circle text-warning px-3"></i> مدیر محترم وب سایت ، شما می توانید از طریق لینک های بالا با مخاطب در ارتباط باشید</span>
                                </div>
                                <div class="col-12 my-4 rounded row mx-0 p-3 bg-dark-o-30 text-dark">
                                    <div class="col-12 my-auto">
                                        <div class="col-12 text-success mt-3 mb-2 px-0">
                                            <span class="bg-success-o-25 rounded small py-1 px-3">{{ $message->getJalaliCreatedAtDate() }}</span>
                                        </div>
                                    </div>
                                    <div class="col-12 text-dark" style="line-height:2.7">
                                        <span>
                                            {{ $message->text }}
                                        </span>
                                    </div>
                                </div>
                                <div class="col-12 text-center">
                                    <a href="#" class="btn btn-light border rounded px-15">بازگشت</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
